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




<div id="audio-container">
    <div class="controls">
        <button class="like"><img src="<?php echo DATA . "general/like.png" ?>" alt=""></button>
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
            <img src="<?php echo DATA . "general/biblio.png" ?>" alt="">
            <span>Bibliothèque</span>
        </button>
    </div>
</div>
<script>

    const audioPlayer = $("#audio-player")[0];
    window.onload = function () {
        const WRGCLecteurResponse = JSON.parse(localStorage.getItem("WRGCLecteurInfo"));
        if (WRGCLecteurResponse.audioName != null && WRGCLecteurResponse.audioTime != null && WRGCLecteurResponse.audioPlaying != null) {
            setLecteurAudio(WRGCLecteurResponse.audioName, WRGCLecteurResponse.audioTime, WRGCLecteurResponse.audioPlaying);

            localStorage.removeItem("WRGCLecteurInfo");
        }
    }

    window.onbeforeunload = function () {
        var WRGCLecteurInfo = {
            audioName: audioPlayer.src,
            audioTime: audioPlayer.currentTime,
            audioPlaying: !audioPlayer.paused
        }
        localStorage.setItem("WRGCLecteurInfo", JSON.stringify(WRGCLecteurInfo));
    }


    // Cree un modal
    const BODYLECTEUR = `
        <ul class="biblio">` + `
        <?php
        foreach ($head_emis as $head) {
            echo '
                    <ul>
                    <h3>' . $head['NOMLONG'] . '</h3>';
            foreach ($audio_ as $aud) {
                if ($head['ID'] == $aud['IDEMISSION']) {
                    echo '<li><button onclick="setAudio(\'' . DATA . "audio/" . $aud['AUDIO'] . '\')">' . $aud['NOM'] . ' <p>' . $aud['AUTEURS'] . ' <i>' . $aud['HEURE'] . ' / ' . $aud['DATE'] . '</i></p></button></li>';
                }
            }
            echo '</ul>';
        }
        ?>` + `
        </ul>`;

    // Création du modal
    const lecteurModal = new Modal("Bibliothèque", BODYLECTEUR);


    // function en cas de click sur un bouton
    function setAudio(url) {
        setLecteurAudio(url, 0, true);
        lecteurModal.closeModal();
    }

    $('#open-modal-button').on('click', function () {
        lecteurModal.render();
    });


    const drop = new DropContainer("Bibliothèque", BODYLECTEUR, "up", "#drop");
    drop.render();
</script>