<div class="redacteur">

    <div class="column">

        <div class="info border-blue">
            <h1>Informations</h1>
            <button class="fas fa-circle-plus" title="Ajouter un nouvel élément" onclick="add(this,'Audio')"></button>
            <hr>
            <div class="items">
                <?php
                ?>
                <div class="line">
                    <div class="desc">
                        <h2>H2P Ep 1.wav</h2>
                        <p id="auteurs">moi moi 2 <span>• 2023-09-28</span></p>

                        <p id="description"><i>Lorem ddd</i></p>
                    </div>
                    <audio src="<?php echo DATA ?>audio/H2P/H2P Ep 1.wav" controls></audio>
                    <p style="display: none" id="id">3</p>
                    <div class="action">
                        <button type="button" class="fas fa-edit" title="Modifier"
                            onclick="edit(this,'Audio',3)"></button>
                        <button type"button" class="fas fa-trash" title="Supprimer" onclick="suppr(this)"
                            data-id="3"></button>
                    </div>
                </div>
                <!-- <div class="line">
                    <div class="desc">
                        <h2>H2P Ep 1.wav</h2>
                        <p id="auteurs">Lorem ddd</p>
                        <span>• 2023-09-28</span>
                        <pid="description">Lorem ddd</p>
                    </div>
                    <audio src="<?php //echo DATA 
                    ?>audio/H2P/H2P Ep 1.wav" controls></audio>
                    <p style="display: none" id="id">3</p>
                    <div class="action">
                        <button type="button" class="fas fa-edit" title="Modifier" onclick="edit(this,'Audio',3)"></button>
                        <button type"button" class="fas fa-trash" title="Supprimer" onclick="suppr(this)" data-id="3"></button>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="liste border-blue">
            <h1>Emissions</h1>
            <button class="fas fa-circle-plus" title="Ajouter un nouvel élément"
                onclick="add(this,'Emission')"></button>
            <hr>
            <div class="items">
                <?php
                foreach ($emissions as $em) {
                    $img = file_exists(ROOT . "src/data/" . $em['SRC']) ? DATA . $em['SRC'] : DATA . 'general/nosrc.png';
                    $inscr = $em['INSCRIPTION'] ? "<b title='Inscription'>📝</b>" : "";
                    echo '
                    <div class="item" onclick="focus(this)">
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
    const BODYEMISSION = `
            <form method="post">
                <label>Nom</label>
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


    function focus(el) {
        document.querySelector('.focus')?.classList.remove('focus');
        el.classList.toggle('focus');
    }

    function add(el, table) {

        switch (table) {
            case "Emission":
                let modalEmission = new Modal("Ajouter", BODYEMISSION);
                let link = "<?php echo DATA . 'general/nosrc.png' ?>";
                modalEmission.render(
                    function () {
                        $('.modal .modal-body form [name="src"]').attr('src', link);
                    });
                modalEmission.addSubmitListener("<?php echo WEBROOT . "src/app/vue/Redacteur/ajax.php" ?>", "add", "Emission");
                modalEmission.setData({
                    nomlong: "",
                    nom: "",
                    description: "",
                    inscription: 0,
                    src: link
                });
                break;
            case "Audio":
                let modalAudio = new Modal("Ajouter", BODYAUDIO);
                modalAudio.render(function () {
                    $('.modal .modal-body form .preview audio').attr('src', "");
                });
                modalAudio.addSubmitListener("<?php echo WEBROOT . "src/app/vue/Redacteur/ajax.php" ?>", "add", "Audio");
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

    function edit(el, table, id) {
        // console.log(el.getAttribute('data-id'));
        switch (table) {
            case "Emission":
                let modalEmission = new Modal("Modifier", BODYEMISSION);
                modalEmission.render(function () {
                    $('.modal .modal-body #previewimg').attr('src', el.parentElement.parentElement.querySelector('img').getAttribute('src'));
                });
                modalEmission.addSubmitListener("<?php echo WEBROOT . "src/app/vue/Redacteur/ajax.php" ?>", "edit", "Emission");
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
                let modalAudio = new Modal("Modifier", BODYAUDIO);
                modalAudio.render(function () {
                    $('.modal .modal-body .preview audio').attr('src', el.parentElement.parentElement.querySelector('audio').getAttribute('src'));
                });
                modalAudio.addSubmitListener("<?php echo WEBROOT . "src/app/vue/Redacteur/ajax.php" ?>", "edit", "Audio");
                modalAudio.setData({
                    nom: el.parentElement.parentElement.querySelector('h2').innerHTML.replace(/<b.*>.*<\/b>/g, ""),
                    description: el.parentElement.parentElement.querySelector('#description i').innerHTML,
                    auteurs: el.parentElement.parentElement.querySelector('#auteurs').innerHTML,
                    src: el.parentElement.parentElement.querySelector('audio').getAttribute('src'),
                    idemission: el.getAttribute('data-id'),
                    id: id
                });
                break;
            default:
                break;
        }
    }

    function suppr(el, table) {
        // console.log(el.getAttribute('data-id'));
        if (confirm('Voulez vous vraiment suppimer cette émission?')) request('<?php echo WEBROOT . "src/app/vue/Redacteur/ajax.php" ?>', 'delete', table, el.getAttribute('data-id'), (success, response) => {
            console.log(response.responseText);
        });
    }

    // function changeSrcPreview() {

    // }

    function changeImgPreview() {
        var preview = document.getElementById('previewimg');
        var file = document.getElementById('src').files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
            preview.src = reader.result;
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
    // function resultModal(success, response) {
    //     if (success) {
    //         closeModal();
    //     }
    // }
</script>