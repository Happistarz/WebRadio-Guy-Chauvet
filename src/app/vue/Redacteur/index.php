<div class="redacteur">

    <div class="column">

        <!-- INFORMATION DE LA LISTE -->
        <div class="info border-blue">
            <h1>Informations</h1>
            <button class="fas fa-circle-plus" title="Ajouter un nouvel élément" onclick="add(this,'Audio')"></button>
            <hr>
            <div class="items">
                <?php

                foreach ($audios as $audio) {
                    $nom_emission = $emissions[$audio['IDEMISSION'] - 1]['NOM'];

                    echo '<div class="line">
                    <div class="desc">
                    <h2>' . $audio['NOM'] . '</h2>
                        <p id="auteurs">' . $audio['AUTEURS'] . '<span>• ' . $audio['CREATED'] . '</span></p>
                        
                        <p id="description"><i>' . $audio['DESCRIPTION'] . '</i></p>
                        </div>
                        <audio src="' . DATA . 'audio/' . $nom_emission . '/' . $audio['NOM'] . '.wav" controls></audio>
                        <p style="display: none" id="id">3</p>
                    <div class="action">
                    <button type="button" class="fas fa-edit" title="Modifier"
                    onclick="edit(this,"Audio",3)"></button>
                        <button type"button" class="fas fa-trash" title="Supprimer" onclick="suppr(this)"
                        data-id="' . $audio['IDEMISSION'] . '"></button>
                        </div>
                        </div>';
                }
                ?>
            </div>
        </div>
        <!-- LISTE DES DATA -->
        <div class="liste border-blue">
            <h1>Emissions</h1>
            <button class="fas fa-circle-plus" title="Ajouter un nouvel élément"
                onclick="add(this,'Emission')"></button>
            <hr>
            <div class="items">
                <?php
                // affichage des emissions
                foreach ($emissions as $em) {
                    $img = file_exists(ROOT . "src/data/" . $em['SRC']) ? DATA . $em['SRC'] : DATA . 'general/nosrc.png';
                    // affichage de l'icone inscription si inscription
                    $inscr = $em['INSCRIPTION'] ? "<b title='Inscription'>📝</b>" : "";
                    echo '
                    <div class="item" onclick="focusElement(this)" data-id="' . $em['ID'] . '">
                        <img src="' . $img . '" alt="">
                        <div class="desc">
                            <h2>' . $em['NOMLONG'] . $inscr . '</h2>
                            <p>' . $em['AUDIOS'] . ' audio(s)</p>
                            <p style="display:none" id="description">' . $em['DESCRIPTION'] . '</p>
                            <p style="display:none" id="inscription">' . $em['INSCRIPTION'] . '</p>
                            <p style="display:none" id="nom">' . $em['NOM'] . '</p>
                        </div>
                        <div class="action">
                            <button type="button" class="fas fa-edit" title="Modifier" onclick="edit(this,\'Emission\',\'' . $em['ID'] . '\')" data-id="' . $em['ID'] . '"></button>
                            <button type="button" class="fas fa-trash" title="Supprimer" onclick="suppr(this, \'Emission\')" data-id="' . $em['ID'] . '"></button>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    // FORMULAIRE POUR LES EMISSIONS
    const BODYEMISSION = `
            <form method="post">
                <label for="nomlong">Nom</label>
                <div class="form-name">
                    <input type="text" name="nomlong" id="nomlong" placeholder="Nom" required>
                    <input type="text" name="nom" id="nom" placeholder="Raccourci" required>
                </div>
                <label for="description">Description</label>
                <textarea type="text" name="description" id="description" placeholder="Description" required> </textarea>
                <label for="src">Image</label>
                <input type="file" name="src" id="src" placeholder="Image" accept="image/*" onchange="changeImgPreview()">
                <label for="inscription">Inscription</label>
                <select name="inscription" id="inscription" required>
                    <option value="0">Non</option>
                    <option value="1">Oui</option>
                </select>
                <input type="hidden" name="id" id="id" value="">
                <input type="submit" value="Valider" id="ModalSubmit">
            </form>
            <div class="preview">
                <img src="<?php echo DATA . "general/nosrc.png" ?>" alt="" id="previewimg">
            </div>`;

    // FORMULAIRE POUR LES AUDIOS
    const BODYAUDIO = `
            <form method="post">
                <label>Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Nom" required>
                <label for="src">Audio</label>
                <input type="file" name="src" id="src" placeholder="Audio" accept="audio/*" onchange="changeImgPreview()">
                <label for="description">Description</label>
                <textarea type="text" name="description" id="description" placeholder="Description" required> </textarea>
                <label for="auteurs">Auteurs</label>
                <input type="text" name="auteurs" id="auteurs" placeholder="Auteurs" required>
                <input type="hidden" name="idemission" id="idemission" value="">
                <input type="hidden" name="id" id="id" value="">
                <input type="submit" value="Valider" id="ModalSubmit">
            </form>
            <div class="preview">
                <audio src="" controls></audio>
            </div>`;


    var lastFocusElement = null;

    /**
     * Permet de mettre en focus un élément
     * @param {HTMLElement} el
     * @returns {void}
     */
    function focusElement(el) {
        document.querySelector('.focus')?.classList.remove('focus');
        if (lastFocusElement != el) {
            el.classList.add('focus');
            request('<?php echo WEBROOT . "src/app/vue/Redacteur/ajax.php" ?>', 'get', 'Audio', $(el).data('id'), (success, response) => {
                alert(response.responseText);
            });
        }
        lastFocusElement = el;
    }

    /**
     * Permet d'ajouter un élément
     * @param {HTMLElement} el
     * @param {string} table
     * @returns {void}
     */
    function add(el, table) {

        // switch pour savoir quel modal afficher
        switch (table) {
            case "Emission":
                // création du modal
                let modalEmission = new Modal("Ajouter", BODYEMISSION);
                // affichage de l'image par défaut
                let link = "<?php echo DATA . 'general/nosrc.png' ?>";
                // affichage du modal avec l'image par défaut
                modalEmission.render(
                    function () {
                        $('.modal .modal-body form [name="src"]').attr('src', link);
                    });
                // ajout du listener pour l'envoi du formulaire
                modalEmission.addSubmitListener("<?php echo WEBROOT . "src/app/vue/Redacteur/ajax.php" ?>", "add", "Emission", resultContent);
                // ajout des données par défaut
                modalEmission.setData({
                    nomlong: "",
                    nom: "",
                    description: "",
                    inscription: 0,
                    src: link
                });
                break;
            case "Audio":
                // création du modal
                let modalAudio = new Modal("Ajouter", BODYAUDIO);
                // affichage du modal
                modalAudio.render(function () {
                    $('.modal .modal-body form .preview audio').attr('src', "");
                });
                // ajout du listener pour l'envoi du formulaire
                modalAudio.addSubmitListener("<?php echo WEBROOT . "src/app/vue/Redacteur/ajax.php" ?>", "add", "Audio", resultModal);
                // ajout des données par défaut
                modalAudio.setData({
                    nom: "",
                    src: "",
                    description: "",
                    auteurs: "",
                    idemission: ""
                });
                break;
            default:
                break;
        }
    }

    /**
     * Permet de modifier un élément
     * @param {HTMLElement} el
     * @param {string} table
     * @param {number} id
     * @returns {void}
     */
    function edit(el, table, id) {
        // switch pour savoir quel modal afficher
        switch (table) {
            case "Emission":
                // création du modal
                let modalEmission = new Modal("Modifier", BODYEMISSION);
                // affichage du modal avec l'img de l'élément
                modalEmission.render(function () {
                    $('.modal .modal-body #previewimg').attr('src', el.parentElement.parentElement.querySelector('img').getAttribute('src'));
                });
                // ajout du listener pour l'envoi du formulaire
                modalEmission.addSubmitListener("<?php echo WEBROOT . "src/app/vue/Redacteur/ajax.php" ?>", "edit", "Emission", resultContent);
                // ajout des données par défaut
                modalEmission.setData({
                    nomlong: el.parentElement.parentElement.querySelector('h2').innerHTML.replace(/<b.*>.*<\/b>/g, ""),
                    nom: el.parentElement.parentElement.querySelector('#nom').innerHTML,
                    description: el.parentElement.parentElement.querySelector('#description').innerHTML,
                    inscription: el.parentElement.parentElement.querySelector('#inscription').innerHTML,
                    src: el.parentElement.parentElement.querySelector('img').getAttribute('src'),
                    id: id
                });
                break;
            case "Audio":
                // création du modal
                let modalAudio = new Modal("Modifier", BODYAUDIO);
                // affichage du modal avec l'audio de l'élément
                modalAudio.render(function () {
                    $('.modal .modal-body .preview audio').attr('src', el.parentElement.parentElement.querySelector('audio').getAttribute('src'));
                });
                // ajout du listener pour l'envoi du formulaire
                modalAudio.addSubmitListener("<?php echo WEBROOT . "src/app/vue/Redacteur/ajax.php" ?>", "edit", "Audio", resultModal);
                // ajout des données par défaut
                modalAudio.setData({
                    nom: el.parentElement.parentElement.querySelector('h2').innerHTML.replace(/<b.*>.*<\/b>/g, ""),
                    description: el.parentElement.parentElement.querySelector('#description i').innerHTML,
                    auteurs: el.parentElement.parentElement.querySelector('#auteurs').innerHTML.replace(/<span.*>.*<\/span>/g, ""),
                    src: el.parentElement.parentElement.querySelector('audio').getAttribute('src'),
                    idemission: el.getAttribute('data-id'),
                    id: id
                });
                break;
            default:
                break;
        }
    }

    /**
     * Permet de supprimer un élément
     * @param {HTMLElement} el
     * @param {string} table
     * @returns {void}
     */
    function suppr(el, table) {
        // confirmation de la suppression, si oui, envoi de la requête
        if (confirm('Voulez vous vraiment suppimer cette émission?')) request('<?php echo WEBROOT . "src/app/vue/Redacteur/ajax.php" ?>', 'delete', table, el.getAttribute('data-id'), (success, response) => {
            console.log(response.responseText);
        });
    }

    /**
     * Permet de changer l'image de preview
     * @returns {void}
     */
    function changeImgPreview() {
        // récupération de l'image
        var preview = document.getElementById('previewimg');
        var file = document.getElementById('src').files[0];
        // création d'un reader pour lire l'image
        var reader = new FileReader();
        reader.onloadend = function () {
            preview.src = reader.result;
        }
        // si il y a une image, on la lit, sinon on met l'image par défaut
        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    /**
     * Permet de gérer le résultat de la requête ajax puis reload la div .items
     * @param {boolean} success
     * @param {XMLHttpRequest} response
     * @returns {void}
     */
    function resultModal(success, response) {
        // reload .items where 
    }

    /**
     * Permet de gérer le résultat de la requête ajax puis reload la div #ajaxcontent
     * @param {boolean} success
     * @param {XMLHttpRequest} response
     * @returns {void}
     */
    function resultContent(success, response) {
        if (success) {
            $('#ajaxcontent').load(location.href + ' #ajaxcontent');
        }
    }
</script>