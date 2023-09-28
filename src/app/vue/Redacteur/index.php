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

// var_dump($emissions);

?>
<div class="redacteur">

    <div class="column">

        <div class="info border-blue">
            <h1>Informations</h1>
            <hr style="width:100%">
            <div class="items">
                <div class="line">
                    <div class="desc">
                        <h2>🎵 H2P Ep 1.wav</h2>
                        <p>moi moi 2 aaaaaaaaaa<span>• 2023-09-28</span></p>
                    </div>
                    <audio src="<?php echo DATA ?>audio/H2P/H2P Ep 1.wav" controls></audio>
                    <div class="action">
                        <button type="button" class="fas fa-edit" title="Modifier" onclick="edit(this)" data-id="3"></button>
                        <button type"button" class="fas fa-trash" title="Supprimer" onclick="suppr(this)" data-id="3"></button>
                    </div>
                </div>
                <div class="line">
                    <div class="desc">
                        <h2>🎵 H2P Ep 1.wav</h2>
                        <p>Lorem ddd</p>
                    </div>
                    <audio src="<?php echo DATA ?>audio/H2P/H2P Ep 1.wav" controls></audio>
                    <div class="action">
                        <button type="button" class="fas fa-edit" title="Modifier" onclick="edit(this)" data-id="3"></button>
                        <button type"button" class="fas fa-trash" title="Supprimer" onclick="suppr(this)" data-id="3"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="liste border-blue">
            <h1>Emissions</h1>
            <button class="fas fa-circle-plus" title="Ajouter un nouvel élément" onclick="add(this)"></button>
            <hr>
            <div class="items">
                <div class="item" onclick="focus(this)">
                    <img src="<?php echo DATA?>rubrique/H2P.png" alt="">
                    <div class="desc">
                        <h2>aaaaa<b title="Inscription">📝</b></h2>
                        <p>6 audio(s)</p>
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
</div>
<script>
    function focus(el) {
        document.querySelector('.focus')?.classList.remove('focus');
        el.classList.toggle('focus');
        // alert('focus');
    }

    function add(el) {
        console.log("add");
    }

    function edit(el) {
        console.log(el.getAttribute('data-id'));
    }

    function suppr(el) {
        console.log(el.getAttribute('data-id'));
    }
</script>