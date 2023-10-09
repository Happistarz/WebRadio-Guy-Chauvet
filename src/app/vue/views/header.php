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
        <?php
        $emission = array();
        foreach ($emission as $ems) {
          extract($ems);
          echo '
            <a href="' . WEBROOT . 'Emission/view/' . $NOM . '">' . $NOMLONG . '</a>
          ';
        }
        ?>
        <a href="<?php echo WEBROOT ?>Emission/view/H2P">Histoire de poche</a>
        <a href="<?php echo WEBROOT ?>Emission/view/JA">Journal Audio</a>
        <a href="<?php echo WEBROOT ?>Emission/view/1T3C">1 Thème 3 Chansons</a>
        <a href="<?php echo WEBROOT ?>Emission/view/QES">Quiz En Série</a>
        <a href="<?php echo WEBROOT ?>Emission">...</a>

      </div>
    </div>
    <!-- journal btn -->
    <a href="<?php echo WEBROOT ?>journax" >JOURNAL</a>
    <!-- equipe btn -->
    <div class="dropdown">
      <a href="<?php echo WEBROOT ?>Equipe">L'EQUIPE</a>
      <div class="dropdown-content">
        <a href="<?php echo WEBROOT ?>Equipe/view/lycee_mdl">La Web Radio</a>
        <a href="<?php echo WEBROOT ?>Equipe/view/lycee_membre">Le Lycée</a>
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