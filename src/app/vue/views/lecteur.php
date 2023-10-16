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
    <audio id="audio-player" controls>
        <source src="" type="audio/mpeg">
        Votre navigateur ne supporte pas l'élément audio.
    </audio>
    <button id="open-modal-button">Ouvrir la liste de lecture</button>
    <div id="drop">test</div>
</div>
<script>
    // au chargement de la page: 
    // get le nom de l'audio dans le local storage
    // get le current time dans le local storage
    // si le nom et le current time sont différents de null: les mettre dans le lecteur
    // sinon: rien
    // quand on choisit un audio dans la biblio: 
    // set l'audio dans le lecteur
    // set le current time a 0 dans le lecteur
    // quand on quitte la page:
    // set le nom de l'audio dans le local storage
    // set le current time dans le local storage

    const audioPlayer = $("#audio-player")[0];
    window.onload = function() {
        const audioName = localStorage.getItem("audioName");
        const audioTime = localStorage.getItem("audioTime");
        if (audioName != null && audioTime != null) {
            audioPlayer.src = audioName;
            audioPlayer.currentTime = audioTime;
            audioPlayer.play();
        }
    }

    window.onbeforeunload = function() {
        localStorage.setItem("audioName", audioPlayer.src);
        localStorage.setItem("audioTime", audioPlayer.currentTime);
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
        audioPlayer.src = url;
        audioPlayer.play();
        lecteurModal.closeModal();
    }

    $('#open-modal-button').on('click', function() {
        lecteurModal.render();
    });


    const drop = new DropContainer("Bibliothèque", BODYLECTEUR, "up", "#drop");
    drop.render();
</script>
<style>
    #audio-container {
        margin: 20px;
    }

    #audio-player {
        width: 300px;
    }

    #play-button,
    #pause-button {
        display: none;
        cursor: pointer;
    }

    .biblio {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 30vh;
        overflow: auto;
    }
</style>