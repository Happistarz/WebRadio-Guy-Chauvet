<?php
require_once MODEL . "ModelEmission.php";
$emission = new ModelEmission();
$plan_emissions = $emission->Liste();
?>

<h1>Plan du site</h1>

<div class="espace">
    <ul>
        <li>
            <a href="<?php echo WEBROOT ?>">Accueil</a>
        </li>
    </ul>
</div>

<div class="espace">
    <ul>
        <li>
            <a href="<?php echo WEBROOT ?>Emission">Les Émissions</a>
            <ul>
                <?php foreach ($plan_emissions as $ems) : ?>
                    <p>
                        <a href="<?php echo WEBROOT . 'Emission/view/' . $ems['NOM']; ?>">
                            <?php echo "-", " ",$ems['NOMLONG']; ?>
                        </a>
                    </p>
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
            <p>
                <a href="<?php echo WEBROOT ?>Equipe/view/lycee_mdl">-La Web Radio</a>
                <a href="<?php echo WEBROOT ?>Equipe/view/lycee_membre">-Le Lycée</a>
            </p>
        </li>
    </ul>
</div>

<div class="espace">
    <ul>
        <li>
            <a href="<?php echo WEBROOT ?>">A propos</a>
            <p>
                <a href="<?php echo WEBROOT . "Accueil/Contact" ?>">- Contact</a>
                <a href="<?php echo WEBROOT . "Accueil/Plan" ?>">- Plan du site</a>
                <a href="<?php echo WEBROOT . "Accueil/Mentions" ?>">- Mentions Legales</a>
            </p>
        </li>
    </ul>
</div>

