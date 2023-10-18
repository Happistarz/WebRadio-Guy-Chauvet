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
<div class="audio-container lecteur">
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
            <i style="font-size: 12px">
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

    // function pour set le lecteur audio avec les infos du localstorage
    window.onload = function () {
        const WRGCLecteurResponse = JSON.parse(localStorage.getItem("WRGCLecteurInfo"));

        // check si le localstorage existe
        if (WRGCLecteurResponse && WRGCLecteurResponse.audioName != null && WRGCLecteurResponse.audioTime != null && WRGCLecteurResponse.audioPlaying != null) {
            // set le lecteur audio avec les infos du localstorage
            setLecteurAudio(WRGCLecteurResponse.audioName, WRGCLecteurResponse.audioTime, WRGCLecteurResponse.audioPlaying);

            localStorage.removeItem("WRGCLecteurInfo");
        }
    }

    // function pour get les infos du lecteur audio et les set dans le localstorage
    window.onbeforeunload = function () {
        // var WRGCLecteurInfo = {
        //     audioName: audioPlayer.src,
        //     audioTime: audioPlayer.currentTime,
        //     audioPlaying: !audioPlayer.paused
        // }
        // localStorage.setItem("WRGCLecteurInfo", JSON.stringify(WRGCLecteurInfo));
    }


    // // Creation du dropcontainer
    const BODYLECTEUR = `
        <ul style="overflow:auto;height: 20vh">` + `
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

    // Création du dropcontainer
    const lecteurModal = new DropContainer("Bibliothèque", BODYLECTEUR, "up", "#open-modal-button");


    // function en cas de click sur un bouton
    function setAudio(data) {
        setLecteurAudio(data.AUDIO, 0, 100, true, data);
        setButtonSrc("play");
        setButtonSrc("mute");
        lecteurModal.closeModal();
    }

    // pour la biblio, mais a refaire car dropcontainer
    $('#open-modal-button').on('click', function () {
        lecteurModal.render();
    });

    // Pour display le temps en cours
    const displayDuration = (duration) => {
        $("#duration").text(calculateTime(duration));
    }

    var volume = 100;
    const audio = document.getElementById("audio-src");
    audio.volume = volume / 100;

    // changer la durée en secondes en format 00:00 de la durée du son
    if (audio.readyState > 0) {
        displayDuration(audio.duration);
    } else {
        audio.addEventListener("loadedmetadata", () => {
            displayDuration(audio.duration);
        });
    }

    // Quand le son est en cours
    audio.addEventListener("timeupdate", () => {
        const progressRatio = audio.currentTime / audio.duration;
        const progressPercent = Math.round(progressRatio * 100);
        // mettre a jour le slider en fonction du temps du son
        $("#progress-track").val(progressPercent);
        // display le temps en cours du son
        $("#current-time").text(calculateTime(audio.currentTime));
    });

    // Quand on change le temps avec le slider
    $("#progress-track").on("input", (e) => {
        const progressRatio = e.target.value / 100;
        // set le temps sur le son en cours
        audio.currentTime = progressRatio * audio.duration;
    });

    // Quand on change le volume avec le slider
    $("#volume-track").on("input", (e) => {
        const volumeRatio = e.target.value / 100;
        // set le volume sur le son en cours
        audio.volume = volumeRatio;
        volume = e.target.value;
    });

    // function pour changer les images des boutons play et mute
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

    // Quand on appui sur le bouton play
    function PlayEvent(element) {
        // check si le son est en pause
        if (audio.paused) {
            // check si le son est deja chargé
            if (audio.readyState > 0) {
                // play le son et change l'image du bouton
                audio.play();
                setButtonSrc("play");
            } else {
                // sinon erreur et fait rien
                setButtonSrc("pause");
            }
        } else {
            // pause le son et change l'image du bouton
            audio.pause();
            setButtonSrc("pause");
        }
    }

    // Quand on appui sur le bouton mute
    function MuteEvent(element) {
        // check si le volume est deja coupée
        if (audio.volume === 0) {
            audio.volume = volume / 100;
            // mettre le volume au niveau du slider
            $(element, "#volume-track").val(volume);
            // changer l'image du bouton
            setButtonSrc("mute");
        } else {
            audio.volume = 0;
            // mettre le volume au niveau du slider
            $(element,"#volume-track").val(0);
            // changer l'image du bouton
            setButtonSrc("unmute");
        }
    }
</script>