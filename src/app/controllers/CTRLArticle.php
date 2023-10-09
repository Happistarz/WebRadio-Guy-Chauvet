<?php
require(LIB."Controller.php");

/**
 * Class Article
 * 
 * Controleur de la page Article
 * liste des articles
 * ajout d'un article
 * modification d'un article
 * suppression d'un article
 *
 */
class CTRLArticle extends Controller{
    public function __construct(){
        #herit de la function loadmodel pour categorie
        parent::loadModel('ModelArticle');
    }

    /**
     * index
     * 
     * Methode appelée par defaut
     * @return void
     */
    public function index(){
        #load model global
        $data = $this->ModelArticle->Liste();
        parent::Set(array('data'=>$data));
        parent::Render("index.php","Article");
    }

    /**
     * affiche un article en fonction de son nom
     * 
     * @param string $rubrique
     * @return void
     */
    public function view($id){
        $data = $this->ModelArticle->Read($id)[0];
        parent::Set(array('data'=>$data));
        parent::Render('Article.php', $data["NOM"]);
    }
 }











