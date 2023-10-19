<?php
require_once(LIB."Controller.php");

/**
 * Class Emission
 * 
 * Controleur de la page Emission
 * liste des emissions
 * ajout d'une emission
 * modification d'une emission
 * suppression d'une emission
 * 
 */
class CTRLEquipe extends Controller{
    /**
     * Constructeur
     * 
     * load le model emission
     * 
     * @return void
     */
    public function __construct(){
        #herit de la function loadmodel pour categorie
        parent::loadModel('ModelEquipe');
        }

    /**
     * index
     * 
     * Methode appelée par defaut
     * 
     * @return void
     */
    public function index(){
        #load model global
        $data = $this->ModelEquipe->Liste();
        parent::Set(array('Equipe'=>$data));
        parent::Render('index.php',"Equipe");
    }

    /**
     * afficher la page lycee
     * 
     * @return void
     */
    public function lycee() {
        parent::Render("lycee.php","Lycée");
    }

        /**
     * afficher les Membres
     * 
     * @return void
     */
    public function Membres() {
        $data = $this->ModelEquipe->Liste();
        parent::Set(array('membres'=>$data));
        parent::Render("membres.php","Membres");
    }
    


 }
 ?>
