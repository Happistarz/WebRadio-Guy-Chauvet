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
        <button class="play"><img src="<?php echo DATA . "general/play.png" ?>" alt=""></button>
        <button class="next"><img src="<?php echo DATA . "general/next.png" ?>" alt=""></button>
    </div>
    <div class="audiobar">
        <div class="topbar">
            <h3 class="audiotitre">Aucun Podcast</h3>
            <p class="info-topbar">Auteurs</p>
            <i style="font-size: 12px">
                <?php echo date('Y-m-d') ?>
            </i>
        </div>
        <div class="audioplayer">
            <audio class="audio-src" src="" preload="metadata" loop></audio>
            <div class="tracker">
                <span class="current-time">00:00</span>
                <div class="progress">
                    <input type="range" class="progress-track" name="progress-track" max="100" value="0">
                </div>
                <span class="duration">00:00</span>
            </div>
            <div class="volume">
                <button type="button" id="button-mute"><img src="<?php echo DATA . "general/unmute.png" ?>"
                        alt=""></button>
                <input type="range" class="volume-track" name="volume-track" max="100" value="100">
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
        <ul>` + `
        <?php
        foreach ($head_emis as $head) {
            echo '
                <ul>
                    <h3>' . $head['NOMLONG'] . '</h3>';
            foreach ($audio_ as $aud) {
                // check si l'audio est dans l'emission
                if ($head['ID'] == $aud['IDEMISSION']) {

                    $aud['AUDIO'] = DATA . "audio/" . $aud['AUDIO'];
                    echo '<li>
                            <button onclick=\'setAudio(' . json_encode($aud) . ')\'>' . $aud['NOM'] . '   
                                <p>' . $aud['AUTEURS'] . '
                                    <!--<i>' . $aud['HEURE'] . ' / ' . $aud['DATE'] . '
                                    </i>-->
                                </p>
                            </button>
                        </li>';
                }
            }
            echo '</ul>';
        }

        ?>` + `
        </ul>`;

    // Création du dropcontainer
    const Bibliotheque = new DropContainer("Bibliothèque", BODYLECTEUR, "up", "#open-modal-button");
    Bibliotheque.render();

    // function en cas de click sur un bouton
    function setAudio(data) {
        setLecteurAudio(data.AUDIO, 0, 100, true, data);
        setButtonSrc("play");
        setButtonSrc("mute");
        Bibliotheque.closeContainer();
    }

    // Pour display le temps en cours
    const displayDuration = (el, duration) => {
        $(el).closest(".topbar").find('.duration').text(calculateTime(duration));
    }

    $('audio').on('loadedmetadata', function () {
        // display la durée du son
        displayDuration(this, this.duration);
    });

    // Quand le son est en cours
    $("audio").on("timeupdate", () => {
        const progressRatio = this.currentTime / this.duration;
        const progressPercent = Math.round(progressRatio * 100);
        // mettre a jour le slider en fonction du temps du son
        $(this).closest('.tracker').find(".progress-track").val(progressPercent);
        // display le temps en cours du son
        $(this).closest('.tracker').find('.current-time').text(calculateTime(this.currentTime));
    });

    // Quand on change le temps avec le slider
    $(".progress-track").on("input", (e) => {
        const progressRatio = e.target.value / 100;
        // set le temps sur le son en cours
        $(this).closest('.audioplayer').find('.audio-src')[0].currentTime = progressRatio * $(this).closest('.audioplayer').find('.audio-src')[0].duration;
    });

    // Quand on change le volume avec le slider
    $(".volume-track").on("input", (e) => {
        const volumeRatio = e.target.value / 100;
        // set le volume sur le son en cours
        $(this).closest('.audioplayer').find('.audio-src').volume = volumeRatio;
        // volume = e.target.value;
        // changer l'image du bouton si le volume est a 0
        if (volumeRatio == 0) {
            setButtonSrc(this, "unmute");
        } else {
            setButtonSrc(this, "mute");
        }
    });

    // function pour changer les images des boutons play et mute
    function setButtonSrc(el, type) {
        switch (type) {
            case "play":
                $(el).closest('.controls').find('.play img').attr('src', "<?php echo DATA . "general/pause.png" ?>");
                break;
            case "pause":
                $(el).closest('.controls').find('.play img').attr('src', "<?php echo DATA . "general/play.png" ?>");
                break;
            case "mute":
                $(el).closest('.volume').find('#button-mute img').attr('src', "<?php echo DATA . "general/mute.png" ?>");
                break;
            case "unmute":
                $(el).closest('.volume').find('#button-mute img').attr('src', "<?php echo DATA . "general/unmute.png" ?>");
                break;
        }
    }

    // ----------------------
    // audio est pas reconnu
    // Uncaught TypeError: Cannot read properties of undefined (reading 'paused')
    // at PlayEvent (H2P:522:21)
    // at HTMLButtonElement.<anonymous> (H2P:511:9)
    // at HTMLButtonElement.dispatch (jquery.min.js:2:43184)
    // at y.handle (jquery.min.js:2:41168)
    // ----------------------


    $('.controls .play').on('click', function () {
        var audio = $(this).closest('.audioplayer').find('.audio-src')[0];
        PlayEvent(audio);
    });

    $('#button-mute').on('click', function () {
        var audio = $(this).closest('.audioplayer').find('.audio-src')[0];
        MuteEvent(audio);
    });

    // Quand on appui sur le bouton play
    function PlayEvent(element) {
        // check si le son est en pause
        if (element.paused) {
            // check si le son est deja chargé
            if (element.readyState > 0) {
                // play le son et change l'image du bouton
                element.play();
                setButtonSrc(element, "play");
            } else {
                // sinon erreur et fait rien
                setButtonSrc(element, "pause");
            }
        } else {
            // pause le son et change l'image du bouton
            element.pause();
            setButtonSrc(element, "pause");
        }
    }

    // Quand on appui sur le bouton mute
    function MuteEvent(element) {
        var audio = $(element).closest('.audioplayer').find('audio')[0];
        var volumeInput = $(element).closest('.volume').find("#volume-track");

        if (audio.volume === 0) {
            audio.volume = volumeInput.val() / 100;
            // changer l'image du bouton
            setButtonSrc(element, "mute");
        } else {
            volumeInput.val(0);
            audio.volume = 0;
            // changer l'image du bouton
            setButtonSrc(element, "unmute");
        }
    }

</script>