<h1>Les Emissions</h1>
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
                <img class="border-" src="<?= $imageSrc ?>" alt="image" />
                <div class="info">
                    <div><?= EMISSIONS[$NOM] ?><br></div>
                    <div><?= $DESCRIPTION ?></div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($display === "right") : ?>
            <div class="<?= $display ?>" style="text-align: <?= $display ?>;">
                <div class="info">
                    <div><?= EMISSIONS[$NOM] ?><br></div>
                    <div><?= $DESCRIPTION ?></div>
                </div>
                <img class="border- " src="<?= $imageSrc ?>" alt="image" />
            </div>
        <?php endif; ?>
    </a><br>

<?php
}
?>