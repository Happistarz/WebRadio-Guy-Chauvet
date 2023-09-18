<?php
session_start();
function entete($title)
{
  echo "
  <!DOCTYPE html>
  <html lang=\"en\">

  <head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
    <link rel=\"stylesheet\" href=\"../css/reset.css\">
    <link rel=\"stylesheet\" href=\"../css/style.css\">
    <link rel=\"shortcut icon\" href=\"../images/icone_couleur_web.png\" type=\"image/x-icon\">
    <script src=\"../js/loader.js\"></script>
    <title>
      " . $title . "
    </title>
  </head>

  <body>
    <!-- loader -->
    <div id=\"loader\">
      <p>Chargement...</p>
    </div>

    <!-- header -->
    <header>
      <!-- logo -->
      <a href=\"../index.php\"><img src=\"../images/Logo.png\" alt=\"Logo\" class=\"logo\" /></a>
      <!-- navbar header -->
      <div class=\"headright\">
        <!-- emission btn -->
        <div class=\"dropdown\">
          <a href=\"les_emissions.php\" id=\"btn\" style=\"pointer-events: none;color: #ccc;\">EMISSIONS</a>
          <div class=\"dropdown-content\">
            <a href=\"emission.php\">Histoire de poche</a>
            <a href=\"journalaudio.php\">Journal Audio</a>
            <a href=\"1-theme-3-chansons.php\">1 thème 3 chansons</a>
            <a href=\"quiz.php\">Quiz en série</a>
            <a href=\"qui_qu_cest.php\">Qui qu'c'est</a>
          </div>
        </div>
        <!-- journal btn -->
        <div class=\"dropdown\">
          <a href=\"journal.php\" id=\"btn\" disabled style=\"pointer-events: none ;color: #ccc;\">JOURNAL</a>
        </div>
        <!-- equipe btn -->
        <div class=\"dropdown\">
          <a id=\"btn\" disabled style=\"pointer-events: none;color: #ccc\">L'EQUIPE</a>
          <div class=\"dropdown-content\">
            <a href=\"lycee_mdl.php\">la Web Radio</a>
            <a href=\"lycee_membre.php\">Le lycée</a>
            <a href=\"lycee_equipe.php\">Les Membres</a>
          </div>
        </div>
      </div>
      
      ";
  if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    echo "<a href='logout.php' class='login' style='background-color:rgba(255,0,0,0.6);'>Déconnexion</a>";
  } else {
    echo "<a href='login.php' class='login'>Espace Rédacteur</a>";
  }
  echo "
    </header>
  </body>
";

}
?>