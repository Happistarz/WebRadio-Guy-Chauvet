<h1 class="title">LES EMISSIONS</h1>
<hr size="5" width="100%" color="black" />

<?php
// initialisation des variables
$counter = 0;
// Affichage des émissions
foreach ($emission as $e) :
    $counter++;
    // alternance de l'affichage des émissions
    $display = ($counter % 2 == 0) ? "right" : "left";
    
    // extract les variables de chaque émissions
    extract($e);
    $imageSrc = DATA . 'rubrique/' . $NOM . '.png';
    $link = WEBROOT . "Emission/view/$NOM";
?>
    <!-- Item émission -->
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