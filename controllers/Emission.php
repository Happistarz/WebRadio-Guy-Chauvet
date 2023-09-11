<?php
require(MODEL."controllers.php");

class Emission extends controllers{
    public function __construct(){
        #herit de la function loadmodel pour categorie
        parent::loadModel('emission');
        }
    public function defaults(){
        #load model global
        $data = $this->emission->Liste();
        return $data;
    }
 }
 #appel de fichier vue
 require(VUE.'categorie.php');
 require(VUE.'layout.php');
