<?php
require_once MODEL . "ModelEmission.php";
$emission = new ModelEmission();
$plan_emissions = $emission->Liste();
?>

<div class="espace">
     <ul>
        <li>
            <a href="../index.php">
                <img src="../images/images_pds/page_dacceuil_pds.png" alt="Logo page d'accueil" />
            </a>
        </li>
    </ul>
</div>

<div class="espace">
    <?php
    $emission = array();
    foreach ($plan_emissions as $ems) {
        echo '
        <a href="' . WEBROOT . 'Emission/view/' . $ems['NOM'] . '">' . $ems['NOMLONG'] . '</a>
        ';
    }
    ?>
    </div>
</div>
