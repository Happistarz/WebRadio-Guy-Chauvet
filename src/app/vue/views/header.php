<script src="<?php echo WWW . "js/loader.js" ?>"></script>
<link rel="stylesheet" href="<?php echo CSS . "reset.css" ?>">
<link rel="stylesheet" href="<?php echo CSS . "style.css" ?>">
<!-- loader -->
<!-- <div id="loader">
  <p>Chargement...</p>
</div> -->
<!-- header -->
<header>
  <!-- logo -->
  <a href="<?php echo WEBROOT ?>"><img src="<?php echo DATA . "general/Logo.png"; ?>" alt="Logo" class="logo" /></a>
  <!-- navbar header -->
  <div class="headright">
    <!-- emission btn -->
    <div class="dropdown">
      <a href="<?php echo WEBROOT ?>Emission" id="btn">EMISSIONS</a>
      <div class="dropdown-content">
        <a href="<?php echo WEBROOT?>Emission/view/H2P">Histoire de poche</a>
        <a href="<?php echo WEBROOT?>Emission/view/JA">Journal Audio</a>
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