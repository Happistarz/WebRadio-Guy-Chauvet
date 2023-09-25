<?php
require(LIB."Controller.php");

/**
 * Class Accueil
 * 
 * Controleur de la page accueil
 * liste des accueil
 * ajout d'une accueil
 * modification d'une accueil
 * suppression d'une accueil
 */
class CTRLAccueil extends Controller{
    /**
     * Constructeur
     * 
     * load le model accueil
     * 
     * @return void
     */
    public function __construct(){
        #herit de la function loadmodel pour categorie
        parent::loadModel('ModelEmission');
        parent::loadModel('ModelArticle');

        }

    /**
     * index
     * 
     * Methode appelée par defaut
     * 
     * @return array $data
     */
    public function index(){
        $data2 = $this->ModelArticle->Liste();
        $data = $this->ModelEmission->Liste();
        parent::Set(array('data'=>$data));
        parent::Set(array('data2'=>$data2));
        parent::Render("index.php","Accueil");
    }

}
