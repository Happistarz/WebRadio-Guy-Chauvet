<?php

	$sql = "SELECT * FROM Quiz_en_série";
	$db = new PDO("mysql:host=127.0.0.1;dbname=web_radio","chefWR","mdpwebradio");
	$resu = $db->query($sql);
	$db = null;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/reset.css">    <link rel="stylesheet" href="../css/style.css" />
    <title>WebRadio Lycee Guy Chauvet</title>
        <script src="../js/loader.js"></script>
</head>
 <body>
	<?php require("header.php");?>
	<div class="emission">
                <img src="../images/Images_rubriques/quiz-en-serie.png" alt="Emission">
                <article>
                        <h5>Quiz en Série</h5>
                        <p>Le quiz en série, c'est 2 minutes durant lesquelles nous allons poser une série de questions à notre candidat, et ce dernier va devoir donner le plus de bonnes réponses possibles.
 Chaque bonne réponse lui rapportera 1 point. Tous ses points seront additionnés à la fin pour obtenir un score.
 Le candidat pourra passer une question s'il ne trouve pas la bonne réponse, mais il ne pourra pas y répondre à nouveau par la suite. </p>
                </article>
        </div>
	
        <!--setup page Journal -->
        <h1 class="title" style="margin-top: 6%">LE QUIZ</h1>
        <hr size=5 width="93%" color=black>
        <div class="quiz">
        <iframe src="https://forms.gle/LGNrwH8zn35rwste9" width="800" height="700"  >Chargement...</iframe> 
	</div>	
	
  <main> 
<!-- header page podcasts --> 
<h1 id="podcasts" class="header-page title"> 
 
<div class="podcast-container border-3"> 
	<?php 
		foreach ($resu as $resultat) {
			echo " <div class=\"podcast\">
				 <button class=\"previous\"></button> 
				<button onclick=\"Like(this)\"></button>
				 <div class=\"info-podcast\"> 
					<h2>{$resultat["titre"]}</h2> 
					<p>{$resultat["description"]}</p> 
					<p>{$resultat["created"]}</p> 
				</div> 
				<audio controls>
					 <source src=\"../files/QES/QES Ep {$resultat["id"]}.wav\">
				 </audio>
				 </div> 
				<hr size=5 width=\"90%\" color=\"black\">
			";
		 }
	?>
 </div> 
</main>       
    
<?php require("footer.php"); ?>

</body>
</html>
