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
       <a href="index.php"><img src="<?php echo WEBROOT ."utils/general/Logo.png";?>" alt="Logo" class="logo" /></a>
       <!-- navbar header -->
       <div class="headright">
         <!-- emission btn -->
         <div class="dropdown">
           <a href="Emission" id="btn">EMISSIONS</a>
           <div class="dropdown-content">
             <a href="Emission/H2P">Histoire de poche</a>
             <a href="Emission/JA">Journal Audio</a>
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
             <a href="Static/lycee_mdl">la Web Radio</a>
             <a href="Static/lycee_membre">Le lycée</a>
           </div>
         </div>
       </div>
     </header>
