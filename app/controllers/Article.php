<?php
require(GENERAL."Controller.php");

class Article extends Controller{
    public function __construct(){
        #herit de la function loadmodel pour categorie
        parent::loadModel('ModelArticle');
        }
    public function index(){
        #load model global
        $data = $this->ModelArticle->Liste();
        parent::Set(array('data'=>$data));
        parent::Render("index.php"); 
    }
 }











