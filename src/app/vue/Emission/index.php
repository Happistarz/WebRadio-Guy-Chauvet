<h1>Les Emissions</h1>
<?php //var_dump($emission);
echo "</br>";

// @author BRIAUDEAU Yoan & Kassim ATTOUMANI
        

/*foreach ($emission as $e) {
    extract($e);
    echo
        '<a href="Emission/view/' . $NOM . '">' . EMISSIONS[$NOM] . '  </a><br>';
}*/
$counter = 0;
echo "<style>";
echo "body { background-color: grey; color: darkblue;  }";
echo "</style>";

//Parcours la liste des emissions 
foreach ($emission as $e) {
    // Ajoute + 1 au compteur
    $counter++;
    $display = ($counter % 2 == 0) ? "right" : "left";
    extract($e);
    
    // Ouvrir le lien <a> avec le style pour le div
    echo "<a href='".WEBROOT."Emission/view/$NOM' style='display: block; text-decoration: none; color: inherit; '>";
    echo "<div style='text-align: $display; background-color: pink; border-radius: 30px; border: 50px solid brown; margin:20px; '>";

    
    echo "<div style='float : left ; display: flex; align-items: center; margin-right: 10px;";
    if ($counter % 2 == 0) {
        echo "float : right; ";
    }
    echo "'/>";

    echo "<img src='".DATA.'rubrique/'.$e['NOM'].'.png'."' alt='image' style='width: 200px; border-radius:30px; margin:2%;' />";
    echo "</div>";

     // Div pour le nom et la description
    // echo "<div style='margin-$display: 220px; '>"; 
    echo EMISSIONS[$NOM] . "<br>" ;
    echo $DESCRIPTION;
    echo "</div>";
    
    echo "</a></br>";
}
?>