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




<!-- <div id="audio-container">
    <div class="controls">
        <button class="like"><img src="<?php //echo DATA . "general/like.png" 
                                        ?>" alt=""></button>
    </div>
    <div class="audiobar">
        <div class="topbar">
            <h3 class="titre">H2P Ep 1</h3>
            <p class="info">moi med <i> 2023-06-06</i></p>
        </div>
        <audio id="audio-player" controls>
            <source src="" type="audio/mpeg">
            Votre navigateur ne supporte pas l'élément audio.
        </audio>
    </div>
    <div class="extra">
        <button id="open-modal-button">
            <img src="<?php //echo DATA . "general/biblio.png" 
                        ?>" alt="">
            <span>Bibliothèque</span>
        </button>
    </div>
</div> -->
<div class="audio-container">
    <div class="controls">
        <button class="like"><img src="<?php echo DATA . "general/like.png" ?>" alt=""></button>
        <button class="next"><img src="<?php echo DATA . "general/next.png" ?>" style="transform: rotate(180deg)" alt=""></button>
        <button class="play" onclick="PlayEvent(this)"><img src="<?php echo DATA . "general/play.png" ?>" alt=""></button>
        <button class="next"><img src="<?php echo DATA . "general/next.png" ?>" alt=""></button>
    </div>
    <div class="audiobar">
        <div class="topbar">
            <h3 class="titre">H2P Ep 1</h3>
            <p class="info">moi med <i> 2023-06-06</i></p>
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
                <button type="button" id="button-mute" onclick="MuteEvent(this)"><img src="<?php echo DATA . "general/unmute.png" ?>" alt=""></button>
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
    // const audioPlayer = $("#audio-player")[0];
    // window.onload = function () {
    //     const WRGCLecteurResponse = JSON.parse(localStorage.getItem("WRGCLecteurInfo"));
    //     if (WRGCLecteurResponse.audioName != null && WRGCLecteurResponse.audioTime != null && WRGCLecteurResponse.audioPlaying != null) {
    //         setLecteurAudio(WRGCLecteurResponse.audioName, WRGCLecteurResponse.audioTime, WRGCLecteurResponse.audioPlaying);

    //         localStorage.removeItem("WRGCLecteurInfo");
    //     }
    // }

    // window.onbeforeunload = function () {
    //     var WRGCLecteurInfo = {
    //         audioName: audioPlayer.src,
    //         audioTime: audioPlayer.currentTime,
    //         audioPlaying: !audioPlayer.paused
    //     }
    //     localStorage.setItem("WRGCLecteurInfo", JSON.stringify(WRGCLecteurInfo));
    // }


    // // Cree un modal
    // const BODYLECTEUR = `
    //     <ul class="biblio">` + `
    //     <?php
            //     foreach ($head_emis as $head) {
            //         echo '
            //                 <ul>
            //                 <h3>' . $head['NOMLONG'] . '</h3>';
            //         foreach ($audio_ as $aud) {
            //             if ($head['ID'] == $aud['IDEMISSION']) {
            //                 echo '<li><button onclick="setAudio(\'' . DATA . "audio/" . $aud['AUDIO'] . '\')">' . $aud['NOM'] . ' <p>' . $aud['AUTEURS'] . ' <i>' . $aud['HEURE'] . ' / ' . $aud['DATE'] . '</i></p></button></li>';
            //             }
            //         }
            //         echo '</ul>';
            //     }
            //     
            ?>` + `
    //     </ul>`;

    // // Création du modal
    // const lecteurModal = new Modal("Bibliothèque", BODYLECTEUR);


    // // function en cas de click sur un bouton
    // function setAudio(url) {
    //     setLecteurAudio(url, 0, true);
    //     lecteurModal.closeModal();
    // }

    // $('#open-modal-button').on('click', function () {
    //     lecteurModal.render();
    // });


    // const drop = new DropContainer("Bibliothèque", BODYLECTEUR, "up", "#drop");
    // drop.render();
    const calculateTime = (sec) => {
        const minutes = Math.floor(sec / 60);
        const seconds = Math.floor(sec % 60);
        const returnedSeconds = seconds < 10 ? `0${seconds}` : `${seconds}`;
        return `${minutes}:${returnedSeconds}`;
    }

    const displayDuration = (duration) => {
        $("#duration").text(calculateTime(duration));
    }


    var volume = 100;
    const audio = document.getElementById("audio-src");
    audio.src = "<?php echo DATA . "audio/H2P/H2P Ep 1.wav" ?>";
    audio.volume = 1;

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

    function PlayEvent(element) {
        if (audio.paused) {
            audio.play();
            $("#button-play").text("Pause");
            element.children[0].src = "<?php echo DATA . "general/pause.png" ?>";
        } else {
            audio.pause();
            $("#button-play").text("Play");
            element.children[0].src = "<?php echo DATA . "general/play.png" ?>";
        }
    }

    function MuteEvent(element) {
        if (audio.volume === 0) {
            audio.volume = volume / 100;
            $("#volume-track").val(volume);
            element.children[0].src = "<?php echo DATA . "general/unmute.png" ?>";
        } else {
            audio.volume = 0;
            $("#volume-track").val(0);
            element.children[0].src = "<?php echo DATA . "general/mute.png" ?>";
        }
    }
</script>