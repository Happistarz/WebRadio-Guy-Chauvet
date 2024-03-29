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
     * @return void
     */
    public function index(){
        #load model global
        $data = $this->ModelEmission->Liste();
        parent::Set(array('emission'=>$data));
        parent::Render('index.php',"Emission");
    }

    /**
     * affiche une emission en fonction de son nom
     * 
     * @param string $rubrique
     * @return void
     */
    public function view($rubrique){
        $data = $this->ModelEmission->ReadByKey(array("NOM ='$rubrique'"))[0];
        $audio = $this->ModelAudio->ReadByKey(array("IDEMISSION =".$data["ID"]));
        parent::Set(array('emission'=>$data,'audios'=>$audio));
        $layout = "default";
        
        // si l'emission est en inscription
        if ($data["INSCRIPTION"]) {
            $layout = "inscription";
        }
        parent::Render('Emission.php', $data['NOMLONG'], $layout);
    }

    


 }
 ?>
