<h1>Les Emissions</h1>
<?php //var_dump($emission);
echo "</br>";

/*foreach ($emission as $e) {
    extract($e);
    echo
        '<a href="Emission/view/' . $NOM . '">' . EMISSIONS[$NOM] . '  </a><br>';
}*/
$counter = 0;

foreach ($emission as $e) {

    $display = ($counter % 2 == 0) ? "left" : "right";

    $counter++;

    extract($e);
    
    echo "<div style='text-align: $display;'>";
    echo "</br>";
    echo "<a href='".URLROOT."Emission/view/$NOM'>" . EMISSIONS[$NOM] . "</a>";
    echo $DESCRIPTION;
    echo $SRC;
    echo "</div></br>";
}
?>


