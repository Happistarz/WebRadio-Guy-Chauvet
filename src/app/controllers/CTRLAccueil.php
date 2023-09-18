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
        parent::loadModel('ModelAccueil');
        }

    /**
     * index
     * 
     * Methode appelée par defaut
     * 
     * @return array $data
     */
    public function index(){
        parent::Render('index.php');
    }

}
