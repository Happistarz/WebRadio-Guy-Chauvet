<h1>LES EMISSIONS</h1>
<HR class="hr-emi" ALIGN=CENTER WIDTH="100">
<?php
$counter = 0;

// Tableau des couleurs possibles
$colors = ['lightblue', 'orange', 'red'];

foreach ($emission as $e) {
    $counter++;
    $display = ($counter % 2 == 0) ? "right" : "left";
    extract($e);
    $imageSrc = DATA . 'rubrique/' . $NOM . '.png';
    $link = WEBROOT . "Emission/view/$NOM";

    $randomColor = $colors[array_rand($colors)];
?>

    <a class="les-emissions-a" href="<?= $link ?>">
        <?php if ($display === "left") : ?>
            <div class="<?= $display ?>" style="text-align: <?= $display ?>;">
                <div class="border-"> 
                    <div class="img-emi-title"> 
                        <p style="margin-left: 15px;"> Titre </p>
                    </div>
                    <img  src="<?= $imageSrc ?>" alt="image" /> 
                </div>
                <div class="info">
                    <div class="name"><?= EMISSIONS[$NOM] ?><br></div>
                    <div class="desc-emi"><?= $DESCRIPTION ?></div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($display === "right") : ?>
            <div class="<?= $display ?>" style="text-align: <?= $display ?>;">
                <div class="info">
                    <div class="name"><?= EMISSIONS[$NOM] ?><br></div>
                    <div class="desc-emi"><?= $DESCRIPTION ?></div>
                </div>
                <div class="border-"> 
                    <div class="img-emi-title"> 
                        <p style="margin-left: 15px;"> Titre </p>
                    </div>
                    <img  src="<?= $imageSrc ?>" alt="image" /> 
                </div>
            </div>
        <?php endif; ?>
    </a><br>

<?php
}
?>