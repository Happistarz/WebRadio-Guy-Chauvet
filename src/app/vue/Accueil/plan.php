<?php
require_once MODEL . "ModelEmission.php";
$emission = new ModelEmission();
$plan_emissions = $emission->Liste();
?>

<h1>Plan du site</h1>

<div class="espace">
    <ul>
        <li>
            <a href="<?php echo WEBROOT ?>Emission">Les Émissions</a>
            <ul>
                <?php foreach ($plan_emissions as $ems) : ?>
                    <li>
                        <a href="<?php echo WEBROOT . 'Emission/view/' . $ems['NOM']; ?>">
                            <?php echo $ems['NOMLONG']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
    </ul>
</div>

<div class="espace">
    <ul>
        <li>
            <a href="<?php echo WEBROOT ?>journax">Journal</a>
        </li>
    </ul>
</div>

<div class="espace">
    <ul>
        <li>
            <a href="<?php echo WEBROOT ?>Equipe">L'équipe</a>
            <ul>
                <li><a href="<?php echo WEBROOT ?>Equipe/view/lycee_mdl">La Web Radio</a></li>
                <li><a href="<?php echo WEBROOT ?>Equipe/view/lycee_membre">Le Lycée</a></li>
            </ul>
        </li>
    </ul>
</div>

