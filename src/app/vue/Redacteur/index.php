<?php 
foreach ($emissions as $e) {
    echo $e['NOM'];
    echo $e['DESCRIPTION'];
    echo $e['SRC'];
    echo $e['INSCRIPTION'];
    echo "<br> <br>";
}

foreach ($articles as $a) {
    echo $a['NOM'];
    echo $a['DESCRIPTION'];
    echo $a['AUTEUR'];
    echo $a['CREATED'];
    echo "<br> <br>";
}

?>