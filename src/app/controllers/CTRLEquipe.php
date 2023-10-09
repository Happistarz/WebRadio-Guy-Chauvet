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
     * affiche une emission en fonction de son nom
     * 
     * @param string $rubrique
     * @return void
     */
    public function view($equipe){
        $data = $this->ModelEquipe->ReadByKey(array("NOM ='$equipe'"))[0];
        parent::Set(array("Equipe"=>$data));
        parent::Render('index.php',$equipe);
    }

    


 }
 ?>
