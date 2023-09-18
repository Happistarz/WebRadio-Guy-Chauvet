<?php

$sql = "SELECT * FROM Quiz_en_série";
$db = new PDO("mysql:host=127.0.0.1;dbname=web_radio", "chefWR", "mdpwebradio");
$resu = $db->query($sql);
if (isset($_POST["submit"])) {
        if (!empty($_POST["nom"]) && !empty($_POST["telephone"])) {
                $nom = htmlspecialchars($_POST["nom"]);
                $tel = hash("md5", htmlspecialchars($_POST["telephone"]));
                $d = '';
                if (isset($_POST["option1"])) {
                        $d = $d . '1';
                }
                if (isset($_POST["option2"])) {
                        $d = $d . '2';
                }
                if (isset($_POST["option3"])) {
                        $d = $d . '3';
                }
                if (isset($_POST["option4"])) {
                        $d = $d . '4';
                }
                if (isset($_POST["option5"])) {
                        $d = $d . '5';
                }
        }

        //header("location:quiz.php?success");
        $sqlquiz = "INSERT INTO InscriptionQuiz (nom_prenom,telephone,date,created)
				    VALUES ('" . $nom . "','" . $tel . "','" . $d . "','2023-02-02')";
        $db->exec($sqlquiz);


        // RESET les valeur du formulaire car sinon  renvoi le form dans la bdd tant que reload la page
        //
        //
        header("location:quiz.php?form=success");



}
//echo !empty($_POST["nom"]);
$db = null;

?>
<!DOCTYPE html>
<html lang="fr">

<body>
        <?php require("header.php");
        entete("Quiz En série");
        ?>
        <div class="emission">
                <img src="../images/Images_rubriques/quiz-en-serie.png" alt="Emission">
                <article>
                        <h5>Quiz en Série</h5>
                        <p>Le quiz en série, c'est 2 minutes durant lesquelles nous allons poser une série de questions
                                à notre candidat, et ce dernier va devoir donner le plus de bonnes réponses possibles.
                                Chaque bonne réponse lui rapportera 1 point. Tous ses points seront additionnés à la fin
                                pour obtenir un score.
                                Le candidat pourra passer une question s'il ne trouve pas la bonne réponse, mais il ne
                                pourra pas y répondre à nouveau par la suite. </p>
                </article>
        </div>

        <?php


        if (isset($_GET["form"]) && $_GET["form"] == "success") {
                echo "<h1 id='success'style= \"text-align:center; background-color: rgba(0,255,0,0.4); padding: 12px;\">Inscription validée</h1>";
        }
        ?>

        <!--setup page Journal -->

        <div class="quiz">

                <div class="form1">
                        <form method="POST" action="quiz.php">
                                <label for="nom">Nom Prénom:</label>
                                <input type="text" id="nom" name="nom" required="required"><br>
                                <label for="telephone">Téléphone :</label>
                                <input type="tel" id="telephone" name="telephone" required="required"
                                        placeholder="Tout attaché sans +33"><br>
                </div>

                <div class="txt-quiz">
                        <p>
                                Cochez les dates où vous ne serez pas disponible pour venir dans le studio le
                                [insérer
                                jour de la
                                semaine] de [insérer horaire de tournage].
                                Si vous êtes disponilbe à toutes les dates, merci de rien cocher.
                        </p>
                </div>

                <div class="form2">
                        <div class="pref">
                                <input type="checkbox" id="preference1" value="option1" name="option1">
                                <input type="time" name="t1" value="00:00">
                                <label for="preference1" class="pref">Proposition date 1</label><br>
                        </div>

                        <div class="pref">
                                <input type="checkbox" id="preference2" value="option2" name="option2">
                                <label for="preference2">Proposition date 2</label><br>
                        </div>

                        <div class="pref">
                                <input type="checkbox" id="preference3" value="option3" name="option3">
                                <label for="preference3">Proposition date 3</label><br>
                        </div>


                        <div class="pref">
                                <input type="checkbox" id="preference4" value="option4" name="option4">
                                <label for="preference4">Proposition date 4</label><br>
                        </div>

                        <div class="pref">
                                <input type="checkbox" id="preference5" value="option5" name="option5">
                                <label for="preference5">Proposition date 5</label><br>
                        </div>

                        <button type="submit" name="submit" class="button" id="button-submit"><img
                                        src="../images/valider.png" onclick="sumbimit_form();"></button>

                        </form>
                </div>
        </div>
        <div class="main">

                        <div class="podcast-container border-3">
                                <?php
                                foreach ($resu as $resultat) {

                                        echo
                                                " <div class=\"podcast\">
				<button onclick=\"Like(this)\"></button>
				 <div class=\"info-podcast\"> 
					<h2>{$resultat["titre"]}</h2> 
					<p>{$resultat["description"]}</p> 
					<p>{$resultat["created"]}</p> 
				</div> 
				<audio controls id='audio'>
					 <source src=\"../files/QES/QES Ep {$resultat["id"]}.wav\">
				 </audio>
				 </div> 

				<hr size=5 width=\"90%\" color=\"black\">
                          
                                ";

                                }
                                ?>
                        </div>
        </div>


        <?php require("footer.php"); ?>

        <?php
        /*
        class Audio 
        {
        public $id;
        public $dossier;
        public $titre;
        public $extension;
        public function_constructor($id, $dossier, $titre, $extension){
        $this.nom = $id;
        $this.dossier = $dossier;
        $this.titre = $titre;
        $this.extension = $extension;
        }
        }
        */
        ?>

</body>

<!-- 
        <script>
                function recupAudio(){
                        var audio = document.getElementById('audio').onclick = function();

                        btn.onclick(){
                                audio.oncanplaythrought = function(){
                                        audio.play();
                                        <source src='../files/QES/QES Ep {$resultat["id"]}.wav\'>
                                }            
                        }
                }
        </script> 
-->

</html>