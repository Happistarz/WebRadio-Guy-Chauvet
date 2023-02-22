<?php

$sql = "SELECT * FROM Article";
$db = new Pdo("mysql:host=127.0.0.1;dbname=web_radio", "chefWR", "mdpwebradio");
$res2 = $db->query($sql);
$db = null;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
<script src="js/loader.js"></script>
</head>

     <!-- loader -->
  <div id="loader">
    <p>Chargement...</p>
  </div>
  <!-- header -->
  <header>
    <!-- logo -->
    <a href="index.php"><img src="images/Logo.png" alt="Logo" class="logo" /></a>x
    <!-- navbar header -->
    <div class="headright">
      <!-- emission btn -->
      <div class="dropdown">
        <a href="php/les_emissions.php" id="btn">EMISSIONS</a>
        <div class="dropdown-content">
          <a href="php/emission.php">Histoire de poche</a>
	  <a href ="php/journalaudio.php">Journal Audio </a>
        </div>
      </div>
      <!-- equipe btn -->
      <div class="dropdown">
        <a href="php/journal.php disabled style="pointer-events: none;color: #ccc"; id="btn">JOURNAL</a>
      </div>
      <!-- journal btn -->
      <div class="dropdown">
        <a href="" id="btn" disabled style="pointer-events: none ;color: #ccc";>L'EQUIPE</a>
        <div class="dropdown-content">
          <a href="php/lycee_mdl.php">la Web Radio</a>
          <a href="php/lycee_membre.php">Le lycée</a>
        </div>
      </div>
    </div>
  </header>

<main>
    <div class="def-p">
      <p>
        Bonjour à vous cher internaute. Dans cette superbe invention qui est Internet, reliant des milliards d'humains entre eux, il y a environ 1.8 milliards de sites. Vous avez fait le choix de visiter celui-ci, toute l'équipe de radio Guy Chauvet est donc très honorée de vous accueillir. Si vous ne savez pas à quoi sert ce site, ne vous inquiétez pas, on va vous expliquer tout ça de suite : ici, vous pouvez écouter les émissions de la Webradio du lycée Guy Chauvet, qui se situe dans la ville de Loudun, en région Nouvelle-Aquitaine. Il y en a pour tous les goûts, des émissions sur l'Histoire, la musique, le cinéma ou l'actualité, des jeux, etc. Ce projet est financé par la Maison des lycéens de notre établissement, l'association qui organise des animations pour les élèves.  Nous espérons que vous passerez de bons moments ici.
<br>
<br>
La web radio du lycée, c'est votre radio. Vous y retrouverez des podcasts intéressants et vous y serez informés des actualités qu'elles soient au lycée ou mondiales. 
<br>
<br>
Bon surf,
<br>
<br>
L'équipe de Radio Guy Chauvet

      </p>
    </div>
    <!-- a venir -->
    <h1 class="title">A venir</h1>
    <hr size="5" width="100%" color="black" />

    <div class="new-p">
      <p>
        ...
      </p>
    </div>
    <!-- emission -->
    <h1 class="title">LES EMISSIONS</h1>
    <hr size="5" width="93%" color="black" />
    <div class="emissions">
	 <a href="php/emission.php" class="border-2">
           <h3>Histoire De Poche</h3>
           <img src="../images/Images_rubriques/Rubrique_H2P.png" alt="image" />
         </a>
	<a href="php/journalaudio.php" class="border-1">
           <h3>Journal Audio</h3>
	   <img src="../images/Images_rubriques/journal-radio-25.png" alt="image" />
         </a>
<!--	<a href="php/journalaudio.php" class="border-1">
           <h3>Quiz En Série</h3>
           <img src="../images/Images_rubriques/quiz-en-serie.png" alt="image" />
         </a>-->


    </div>
    <!-- journal -->
    <h1 class="title">LE JOURNAL</h1>
    <hr size="5" width="93%" color="black" />
<?php

	foreach ($res2 as $resul) {
	$id = $resul["id"];
	$lines = explode("\n", wordwrap($resul["description"], 40));
                $resum = $resul["description"];
                if (count($lines) > 7) {
                        $lines = array_slice($lines, 0, 7);
                        $lines[6] .= "...";
                        $resum = implode("\n", $lines);
		}
		echo "
    	<a class=\"j-box border-1\" href=\"php/article.php?id=".$id."\">
      	<img src=\"images/test.png\" alt=\"Image\" />
      	<!-- article -->
      	<article>
        	<h2>".$resul["titre"]."</h2>
        	<p>".$resul["description"]."</p>
      </article>
    </a>
	";
}
?>
  </main>
	<?php require("php/footer.php");?>

</body>

</html>
