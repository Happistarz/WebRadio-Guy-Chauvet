<h1 class="title">LES EMISSIONS</h1>
<hr size="5" width="100%" color="black" />
<?php
$counter = 0;

// Tableau des couleurs possibles
$colors = ['lightblue', 'orange', 'red'];

foreach ($emission as $e) :
    $counter++;
    $display = ($counter % 2 == 0) ? "right" : "left";
    extract($e);
    $imageSrc = DATA . 'rubrique/' . $NOM . '.png';
    $link = WEBROOT . "Emission/view/$NOM";
?>
    <a class="les-emis" href="<?= $link ?>">
        <div class="<?= $display ?>">
            <div class="border-">
                <img src="<?= $imageSrc ?>" alt="image" />
            </div>

            <div class="info ">
                <div class="name"><?= $NOMLONG ?><br></div>
                <div class="desc-emi"><?= $DESCRIPTION ?></div>
            </div>
        </div>
    </a>
<?php
endforeach;
?>