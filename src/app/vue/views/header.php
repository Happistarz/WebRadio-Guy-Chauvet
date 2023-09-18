   <!DOCTYPE html>
   <html lang="fr">

   <head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="<?php echo WEBROOT . "www/css/reset.css" ?>">
     <link rel="stylesheet" href="<?php echo WEBROOT . "www/css/style.css" ?>">
   <script src="<?php echo WEBROOT . "www/js/loader.js" ?>"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>INDEX</title>
     <!-- loader -->
     <div id="loader">
       <p>Chargement...</p>
     </div>
  </head>
  <body>
     <!-- header -->
     <header>
       <!-- logo -->
       <a href="<?php echo APP ?>"><img src="<?php echo WEBROOT ."utils/general/Logo.png";?>" alt="Logo" class="logo" /></a>
       <!-- navbar header -->
       <div class="headright">
         <!-- emission btn -->
         <div class="dropdown">
           <a href="<?php echo WEBROOT."/Emission/index.php";?>" id="btn">EMISSIONS</a>
           <div class="dropdown-content">
             <a href=<?php echo WEBROOT ."emission.php"?>>Histoire de poche</a>
             <a href="journalaudio.php">Journal Audio</a>
           </div>
         </div>
         <!-- journal btn -->
         <div class="dropdown">
           <a href="journal.php" id="btn" disabled style="pointer-events: none ;color: #ccc;">JOURNAL</a>
         </div>
         <!-- equipe btn -->
         <div class="dropdown">
           <a id="btn" disabled style="pointer-events: none">L'EQUIPE</a>
           <div class="dropdown-content">
             <a href="lycee_mdl.php">la Web Radio</a>
             <a href="lycee_membre.php">Le lycée</a>
           </div>
         </div>
       </div>
     </header>
