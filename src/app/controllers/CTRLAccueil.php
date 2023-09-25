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
        parent::loadModel('ModelInfo');

        }

    /**
     * index
     * 
     * Methode appelée par defaut
     * 
     * @return array $data
     */
    public function index(){   
        $emission = $this->ModelEmission->Liste();
        $article = $this->ModelArticle->Liste();
        $info = $this->ModelInfo->Liste();
        parent::Set(array('emission'=>$emission));
        parent::Set(array('article'=>$article));
        parent::Set(array('info'=>$info));
        parent::Render("index.php","WebRadio");
    }

    public function Contact(){
        parent::Render("contact.php","Contact");
    }

    public function Plan() {
        parent::Render("plan.php","Plan");
    }

    public function Mentions() {
        parent::Render("mention.php","Mentions");
    }

}
