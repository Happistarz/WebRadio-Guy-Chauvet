<?php require VUE . "Redacteur/ajax.php"; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>
    <?php echo $title; ?>
  </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="<?php echo WWW . "js/loader.js" ?>"></script>
  <link rel="stylesheet" href="<?php echo CSS . "reset.css" ?>">
  <link rel="stylesheet" href="<?php echo CSS . "style.css" ?>">
  <link rel="icon" type="image/png" href="<?php echo DATA . "general/icones/couleur.png" ?>" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="<?php echo WWW . "js/functions.js" ?>"></script>
</head>

<body>
  <?php require VIEWS . "header.php"; ?>
  <main>
    <div class="content">
      <?php echo $content; ?>
    </div>
  </main>
  <?php require VIEWS . "footer.php"; ?>
</body>

</html>

<!-- generate me the architecture of the projet based on what you see just in the app folder and conf -->

<!-- 
conf
    config.php
src
    app
        controller
            AllControllers
        model
            AllModels
        vue
            Welcome
                ajax.php
                index.php
            layout
                box.php
                default.php
        www
            css
                AllCSS
            js
                AllJS
-->