<?php
// foreach ($emissions as $e) {
//     echo $e['NOM'];
//     echo $e['DESCRIPTION'];
//     echo $e['SRC'];
//     echo $e['INSCRIPTION'];
//     echo "<br> <br>";
// }

// foreach ($articles as $a) {
//     echo $a['NOM'];
//     echo $a['DESCRIPTION'];
//     echo $a['AUTEUR'];
//     echo $a['CREATED'];
//     echo "<br> <br>";
// }

?>
<div class="redacteur">
    <div class="column">

        <div class="info border-blue">
            <h1>Informations</h1>
            <hr>

        </div>
        <div class="liste border-blue">
            <h1>Emissions</h1>
            <button class="fas fa-circle-plus" title="Ajouter un nouvel élément" onclick="add(this)"></button>
            <hr>
            <div class="items">
                <div class="item" onclick="focus(this)">
                    <img src="<?php echo DATA ?>rubrique/QES.png" alt="">
                    <div class="desc">
                        <h2 title="Inscription">Quiz En Série 📝</h2>
                        <p>6 audios</p>
                    </div>
                    <div class="action">
                        <button type="button" class="fas fa-edit" title="Modifier" onclick="edit(this)" data-id="3"></button>
                        <button type"button" class="fas fa-trash" title="Supprimer" onclick="suppr(this)" data-id="3"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function focus(el) {
        // document.querySelector('.focus')?.classList.remove('focus');
        el.classList.toggle('focus');
    }
</script>