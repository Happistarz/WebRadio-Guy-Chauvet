<!-- CONTENU DU LECTEUR AUDIO -->
<?php
require_once MODEL . "ModelEmission.php";
$emission = new ModelEmission();
$head_emis = $emission->Liste();

require_once MODEL . "ModelAudio.php";
$audio = new ModelAudio();
$audio_ = $audio->Liste();
?>

<!-- Le modal -->
<div class="audio-container">
    <div class="controls">
        <button class="like"><img src="<?php echo DATA . "general/like.png" ?>" alt=""></button>
        <button class="next"><img src="<?php echo DATA . "general/next.png" ?>" style="transform: rotate(180deg)"
                alt=""></button>
        <button class="play" onclick="PlayEvent(this)"><img src="<?php echo DATA . "general/play.png" ?>"
                alt=""></button>
        <button class="next"><img src="<?php echo DATA . "general/next.png" ?>" alt=""></button>
    </div>
    <div class="audiobar">
        <div class="topbar">
            <h3 class="titre">Aucun Podcast</h3>
            <p class="info">Auteurs</p>
            <i>
                <?php echo date('Y-m-d') ?>
            </i>
        </div>
        <div class="audioplayer">
            <audio src id="audio-src" preload="metadata" loop></audio>
            <div class="tracker">
                <span id="current-time">00:00</span>
                <div class="progress">
                    <input type="range" name="progress-track" id="progress-track" max="100" value="0">
                </div>
                <span id="duration">00:00</span>
            </div>
            <div class="volume">
                <button type="button" id="button-mute" onclick="MuteEvent(this)"><img
                        src="<?php echo DATA . "general/unmute.png" ?>" alt=""></button>
                <input type="range" name="volume-track" id="volume-track" max="100" value="100">
                <!-- <output id="volume-output">100%</output> -->
            </div>
        </div>
    </div>
    <div class="extra">
        <button id="open-modal-button" class="biblio">
            <img src="<?php echo DATA . "general/biblio.png" ?>" alt="">
            <span>Bibliothèque</span>
        </button>
    </div>
</div>

<script>
    const audioPlayer = $(".audioplayer")[0];
    window.onload = function () {
        const WRGCLecteurResponse = JSON.parse(localStorage.getItem("WRGCLecteurInfo"));
        if (WRGCLecteurResponse && WRGCLecteurResponse.audioName != null && WRGCLecteurResponse.audioTime != null && WRGCLecteurResponse.audioPlaying != null) {
            setLecteurAudio(WRGCLecteurResponse.audioName, WRGCLecteurResponse.audioTime, WRGCLecteurResponse.audioPlaying);

            localStorage.removeItem("WRGCLecteurInfo");
        }
    }

    // window.onbeforeunload = function () {
    //     var WRGCLecteurInfo = {
    //         audioName: audioPlayer.src,
    //         audioTime: audioPlayer.currentTime,
    //         audioPlaying: !audioPlayer.paused
    //     }
    //     localStorage.setItem("WRGCLecteurInfo", JSON.stringify(WRGCLecteurInfo));
    // }


    // // Cree un modal
    const BODYLECTEUR = `
        <ul class="biblio">` + `
        <?php
        foreach ($head_emis as $head) {
            echo '
                            <ul>
                            <h3>' . $head['NOMLONG'] . '</h3>';
            foreach ($audio_ as $aud) {
                if ($head['ID'] == $aud['IDEMISSION']) {
                    $aud['AUDIO'] = DATA . "audio/" . $aud['AUDIO'];
                    echo '<li><button onclick=\'setAudio(' . json_encode($aud) . ')\'>' . $aud['NOM'] . ' <p>' . $aud['AUTEURS'] . ' <i>' . $aud['HEURE'] . ' / ' . $aud['DATE'] . '</i></p></button></li>';
                }
            }
            echo '</ul>';
        }

        ?>` + `
        </ul>`;

    // Création du modal
    const lecteurModal = new Modal("Bibliothèque", BODYLECTEUR);


    // function en cas de click sur un bouton
    function setAudio(data) {
        setLecteurAudio(data.AUDIO, 0, 100, true, data);
        setButtonSrc("play");
        setButtonSrc("mute");
        lecteurModal.closeModal();
    }

    $('#open-modal-button').on('click', function () {
        lecteurModal.render();
    });


    // const drop = new DropContainer("Bibliothèque", BODYLECTEUR, "up", "#drop");
    // drop.render();

    const displayDuration = (duration) => {
        $("#duration").text(calculateTime(duration));
    }

    var volume = 100;
    const audio = document.getElementById("audio-src");
    audio.volume = volume / 100;

    if (audio.readyState > 0) {
        displayDuration(audio.duration);
    } else {
        audio.addEventListener("loadedmetadata", () => {
            displayDuration(audio.duration);
        });
    }

    audio.addEventListener("timeupdate", () => {
        const progressRatio = audio.currentTime / audio.duration;
        const progressPercent = Math.round(progressRatio * 100);
        $("#progress-track").val(progressPercent);
        $("#current-time").text(calculateTime(audio.currentTime));
    });

    $("#progress-track").on("input", (e) => {
        const progressRatio = e.target.value / 100;
        audio.currentTime = progressRatio * audio.duration;
    });

    $("#volume-track").on("input", (e) => {
        const volumeRatio = e.target.value / 100;
        audio.volume = volumeRatio;
        volume = e.target.value;
        // $("#volume-output").text(`${volume}%`);
    });

    function setButtonSrc(type) {
        switch (type) {
            case "play":
                document.querySelector('.controls .play').children[0].src = "<?php echo DATA . "general/pause.png" ?>";
                break;
            case "pause":
                document.querySelector('.controls .play').children[0].src = "<?php echo DATA . "general/play.png" ?>";
                break;
            case "mute":
                document.querySelector('#button-mute').children[0].src = "<?php echo DATA . "general/unmute.png" ?>";
                break;
            case "unmute":
                document.querySelector('#button-mute').children[0].src = "<?php echo DATA . "general/mute.png" ?>";
                break;
        }
    }

    function PlayEvent(element) {
        if (audio.paused) {
            // try {
            if (audio.readyState > 0) {
                audio.play();
                setButtonSrc("play");
            } else {
                setButtonSrc("pause");
            }
        } else {
            audio.pause();
            setButtonSrc("pause");
        }
    }

    function MuteEvent(element) {
        if (audio.volume === 0) {
            audio.volume = volume / 100;
            $("#volume-track").val(volume);
            setButtonSrc("mute");
        } else {
            audio.volume = 0;
            $("#volume-track").val(0);
            setButtonSrc("unmute");
        }
    }
</script>