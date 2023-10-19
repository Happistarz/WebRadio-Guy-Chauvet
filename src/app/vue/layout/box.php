<head>
  <meta charset="UTF-8">
  <title>
    <?php
    // affiche le titre de la page
    echo $title_page;
    ?>
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
      <?php
      echo json_decode($content, true);
      ?>
    </div>
  </main>
  <?php require VIEWS . "footer.php"; ?>
  <?php require VIEWS . "lecteur.php"; ?>
</body>