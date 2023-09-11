<?php
require(MODEL."controllers.php");

class Article extends controllers{
    public function __construct(){
        #herit de la function loadmodel pour categorie
        parent::loadModel('article');
        }
    public function defaults(){
        #load model global
        $data = $this->article->Liste();
        return $data;
    }
 }
 #appel de fichier vue
 require(VUE.'categorie.php');
 require(VUE.'layout.php');











