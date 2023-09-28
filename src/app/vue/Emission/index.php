<h1>Les Emissions</h1>
<?php

$counter = 0;

foreach ($emission as $e) {
    $counter++;
    $display = ($counter % 2 == 0) ? "right" : "left";
    extract($e);
    $imageSrc = DATA . 'rubrique/' . $NOM . '.png';
    $link = WEBROOT . "Emission/view/$NOM";
?>

    <a href="<?= $link ?>">
        <?php if ($display === "left") : ?>
            <div class="<?= $display ?>" style="text-align: <?= $display ?>;">
                <img class="img-emi" src="<?= $imageSrc ?>" alt="image" />
                <div class="info">
                    <div class="name"><?= EMISSIONS[$NOM] ?><br></div>
                    <div class="text"><?= $DESCRIPTION ?></div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($display === "right") : ?>
            <div class="<?= $display ?>" style="text-align: <?= $display ?>;">
                <div class="info">
                    <div class="name"><?= EMISSIONS[$NOM] ?><br></div>
                    <div class="text"><?= $DESCRIPTION ?></div>
                </div>
                <img class="img-emi" src="<?= $imageSrc ?>" alt="image" />
            </div>
        <?php endif; ?>
    </a><br>

<?php
}
?>