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
  <a href="<?php echo WEBROOT ?>"><img src="<?php echo DATA . "general/Logo.png"; ?>" alt="WebRadio" class="logo" /></a>
  <!-- navbar header -->
  <div class="headright">
    <!-- emission btn -->
    <div class="dropdown">
      <a href="<?php echo WEBROOT ?>Emission">EMISSIONS</a>
      <div class="dropdown-content">
        <a href="<?php echo WEBROOT?>Emission/view/H2P">Histoire de poche</a>
        <a href="<?php echo WEBROOT?>Emission/view/JA">Journal Audio</a>
      </div>
    </div>
    <!-- journal btn -->
    <a href="<?php echo WEBROOT?>journaux">JOURNAUX</a>
    <!-- equipe btn -->
    <div class="dropdown">
      <a disabled style="pointer-events: none">L'EQUIPE</a>
      <div class="dropdown-content">
        <a href="Static/lycee_mdl">La Web Radio</a>
        <a href="Static/lycee_membre">Le Lycée</a>
      </div>
    </div>
  </div>

</header>
<?php
function getRandomBorderClass() {
    $borderClasses = ['red', 'blue', 'green'];
    $randomIndex = array_rand($borderClasses);
    return 'border-' . $borderClasses[$randomIndex];
}
$randomBorderClass = getRandomBorderClass();
?>