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
class CTRLEmission extends Controller{
    /**
     * Constructeur
     * 
     * load le model emission
     * 
     * @return void
     */
    public function __construct(){
        #herit de la function loadmodel pour categorie
        parent::loadModel('ModelEmission');
        parent::loadModel('ModelAudio');
        }

    /**
     * index
     * 
     * Methode appelée par defaut
     * 
     * @return array $data
     */
    public function index(){
        #load model global
        $data = $this->ModelEmission->Liste();
        parent::Set(array('emission'=>$data));
        parent::Render('index.php',"Emission");
    }

    public function view($rubrique){
        $data = $this->ModelEmission->ReadByKey(array("NOM ='$rubrique'"));
        $audio = $this->ModelAudio->ReadByKey(array("IDEMISSION ='$data[ID]'"));
        var_dump($audio);
        parent::Set(array('emission'=>$data,'audio'=>$audio));
        parent::Render('Emission.php', EMISSIONS[$rubrique]);
    }

    


 }
 ?>
