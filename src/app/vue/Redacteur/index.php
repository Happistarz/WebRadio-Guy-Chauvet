<div class="redacteur">

    <div class="column">

        <div class="info border-blue">
            <h1>Informations</h1>
            <button class="fas fa-circle-plus" title="Ajouter un nouvel élément" onclick="add(this)"></button>
            <hr style="width:100%">
            <div class="items">
                <div class="line">
                    <div class="desc">
                        <h2>🎵 H2P Ep 1.wav</h2>
                        <p>moi moi 2<span>• 2023-09-28</span></p>
                    </div>
                    <audio src="<?php echo DATA ?>audio/H2P/H2P Ep 1.wav" controls></audio>
                    <div class="action">
                        <button type="button" class="fas fa-edit" title="Modifier" onclick="edit(this)"
                            data-id="3"></button>
                        <button type"button" class="fas fa-trash" title="Supprimer" onclick="suppr(this)"
                            data-id="3"></button>
                    </div>
                </div>
                <div class="line">
                    <div class="desc">
                        <h2>🎵 H2P Ep 1.wav</h2>
                        <p>Lorem ddd</p>
                    </div>
                    <audio src="<?php echo DATA ?>audio/H2P/H2P Ep 1.wav" controls></audio>
                    <div class="action">
                        <button type="button" class="fas fa-edit" title="Modifier" onclick="edit(this)"
                            data-id="3"></button>
                        <button type"button" class="fas fa-trash" title="Supprimer" onclick="suppr(this)"
                            data-id="3"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="liste border-blue">
            <h1>Emissions</h1>
            <button class="fas fa-circle-plus" title="Ajouter un nouvel élément" onclick="add(this)"></button>
            <hr>
            <div class="items">
                <?php
                // var_dump($emissions);
                foreach ($emissions as $em) {
                    $img = file_exists(ROOT . "src/data/" . $em['SRC']) ? DATA . $em['SRC'] : DATA . 'general/nosrc.png';
                    $inscr = $em['INSCRIPTION'] ? "<b title='Inscription'>📝</b>" : "";
                    echo '
                    <div class="item" onclick="focus(this)">
                        <img src="' . $img . '" alt="">
                        <div class="desc">
                            <h2>' . $em['NOM'] . $inscr . '</h2>
                            <p>' . $em['AUDIOS'] . ' audio(s)</p>
                            <p style="display:none" id="description">' . $em['DESCRIPTION'] . '</p>
                            <p style="display:none" id="inscription">' . $em['INSCRIPTION'] . '</p>
                        </div>
                        <div class="action">
                            <button type="button" class="fas fa-edit" title="Modifier" onclick="edit(this)" data-id="' . $em['ID'] . '"></button>
                            <button type="button" class="fas fa-trash" title="Supprimer" onclick="suppr(this)" data-id="' . $em['ID'] . '"></button>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <button id="myBtn">BUTTON</button>
</div>
</div>
<script src="<?php echo WWW . "js/functions.js"; ?>"></script>
<script>
    const modal = new Modal("Ajouter", `
            <form method="post">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Nom" required>
                <label for="description">Description</label>
                <input type="text" name="description" id="description" placeholder="Description" required>
                <label for="src">Image</label>
                <input type="file" name="src" id="src" placeholder="Image" accept="image/*" onchange="changePreview()">
                <label for="inscription">Inscription</label>
                <select name="inscription" id="inscription" required>
                    <option value="0">Non</option>
                    <option value="1">Oui</option>
                </select>
                <input type="submit" value="Valider" id="ModalSubmit">
            </form>
            <div class="preview">
                <img src="<?php echo DATA . "general/nosrc.png" ?>" alt="" id="previewimg">
            </div>`);


    function focus(el) {
        document.querySelector('.focus')?.classList.remove('focus');
        el.classList.toggle('focus');
    }

    function add(el) {
        // openModal("Ajouter", {
        //     nom: "",
        //     description: "",
        //     inscription: 0,
        //     src: "<?php //echo DATA . 'general/nosrc.png' ?>"
        // });
        let link = "<?php echo DATA . 'general/nosrc.png' ?>";
        modal.render(
            function () {
                // link = document.querySelector('#previewimg').getAttribute('src');
                // console.log(link);
                $('.modal .modal-body form [name="src"]').attr('src', link);
            });
        modal.addSubmitListener("<?php echo WEBROOT . "src/app/vue/Redacteur/ajax.php" ?>", "add", "Emission");
        modal.setData({
            nom: "",
            description: "",
            inscription: 0,
            src: link
        });
        // request("<?php // echo WEBROOT . 'src/app/vue/Redacteur/ajax.php' ?>", "add", "Emission", "ddd", result);
    }

    function edit(el) {
        // console.log(el.getAttribute('data-id'));
        // console.log(el.parentElement.parentElement.querySelector('#description').innerHTML);
        modal.render(function () {
            console.log($('.modal .modal-body form [name="src"]'));
            $('.modal .modal-body form [name="src"]').attr('src', el.parentElement.parentElement.querySelector('img').getAttribute('src'));
        });
        modal.addSubmitListener("<?php echo WEBROOT . "src/app/vue/Redacteur/ajax.php" ?>", "edit", "Emission");
        modal.setData({
            nom: el.parentElement.parentElement.querySelector('h2').innerHTML.replace(/<b.*>.*<\/b>/g, ""),
            description: el.parentElement.parentElement.querySelector('#description').innerHTML,
            inscription: el.parentElement.parentElement.querySelector('#inscription').innerHTML,
            src: el.parentElement.parentElement.querySelector('img').getAttribute('src')
        });
        // openModal("Modifier", {
        //     // remove emoji for nom
        //     nom: el.parentElement.parentElement.querySelector('h2').innerHTML.replace(/<b.*>.*<\/b>/g, ""),
        //     description: el.parentElement.parentElement.querySelector('#description').innerHTML,
        //     inscription: el.parentElement.parentElement.querySelector('#inscription').innerHTML,
        //     src: el.parentElement.parentElement.querySelector('img').getAttribute('src')
        // });
    }

    function suppr(el) {
        // console.log("suppr");
        console.log(el.getAttribute('data-id'));
    }

    function resultSuppr(success, response) {
        console.log(response);
    }

    // function changePreview() {
    //     var preview = document.getElementById('previewimg');
    //     var file = document.getElementById('src').files[0];
    //     var reader = new FileReader();
    //     reader.onloadend = function () {
    //         preview.src = reader.result;
    //     }
    //     if (file) {
    //         reader.readAsDataURL(file);
    //     } else {
    //         preview.src = "";
    //     }
    // }

    // var modal = document.getElementById("modal");

    // // Get the button that opens the modal
    // var btn = document.getElementById("myBtn");

    // // Get the <span> element that closes the modal
    // var span = document.getElementsByClassName("close")[0];

    // // When the user clicks on the button, open the modal
    // function openModal(title,data=null) {
    //     modal.style.display = "block";
    //     document.querySelector('.modal-header h2').innerHTML = title;
    //     // set form with data

    //     if (data == null) return;
    //     document.getElementById('nom').value = data.nom;
    //     document.getElementById('description').value = data.description;
    //     document.getElementById('inscription').value = data.inscription;
    //     document.getElementById('previewimg').src = data.src;
    // }

    // function closeModal() {
    //     modal.style.display = "none";
    // }

    // // When the user clicks on <span> (x), close the modal
    // span.onclick = function() {
    //     closeModal();
    // }

    // btn.onclick = function() {
    //     openModal();
    // }
    // // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    //     if (event.target == modal) {
    //         closeModal();
    //     }
    // }
    // document.getElementById('submit').addEventListener('click', function (e) {
    //     e.preventDefault();
    //     var form = document.querySelector('form');
    //     var data = new FormData(form);
    //     console.log(data);
    // });

    // function resultModal(success, response) {
    //     if (success) {
    //         closeModal();
    //     }
    // }
</script>