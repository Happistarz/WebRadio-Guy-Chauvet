<?php
require(GENERAL."Controller.php");

class Emission extends Controller{
    public function __construct(){
        #herit de la function loadmodel pour categorie
        parent::loadModel('emission');
        }
    public function index(){
        #load model global
        $data = $this->emission->Liste();
        return $data;
    }
 }
 #appel de fichier vue
//  require(VUE.'categorie.php');
//  require(VUE.'layout.php');
 ?>