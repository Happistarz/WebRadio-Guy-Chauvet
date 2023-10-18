<!-- loader -->
<!-- <div id="loader">
  <p>Chargement...</p>
</div> -->
<?php

require_once MODEL . "ModelEmission.php";
$emission = new ModelEmission();
$header_emissions = $emission->Liste();

?>
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
        <?php
        $emission = array();
        foreach ($header_emissions as $ems) {
          echo '
            <a href="' . WEBROOT . 'Emission/view/' . $ems['NOM'] . '">' . $ems['NOMLONG'] . '</a>
          ';
        }
        ?>
      </div>
    </div>
    <!-- journal btn -->
    <a href="<?php echo WEBROOT ?>journax">JOURNAL</a>
    <!-- equipe btn -->
    <div class="dropdown">
      <a href="<?php echo WEBROOT ?>Equipe">L'EQUIPE</a>
      <div class="dropdown-content">
        <a href="<?php echo WEBROOT ?>Equipe/lycee">Le Lycée</a>
        <a href="<?php echo WEBROOT ?>Equipe/membres">Les Membres</a>
      </div>
    </div>
  </div>
</header>
<?php
function getRandomBorderClass()
{
  $borderClasses = ['red', 'blue', 'green'];
  $randomIndex = array_rand($borderClasses);
  return 'border-' . $borderClasses[$randomIndex];
}
$randomBorderClass = getRandomBorderClass();
?>