<h1>Les Emissions</h1>
<?php var_dump($emission);



foreach ($emission as $d) {
    echo '
    <a href="Emission/'.$d['NOM'].'">'. EMISSIONS[$d['NOM']].'  </a>
    ';
}





?>