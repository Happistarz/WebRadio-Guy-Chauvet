<?php 

require_once(LIB."Controller.php");

class CTRLRedacteur extends Controller {
    public function __construct() {
        parent::loadModel('ModelUtilisateurs');
        parent::loadModel('ModelEmission');
        parent::loadModel('ModelArticle');
    }

    public function index() {
        // if(ValidSession()) {
            $emissions = $this->ModelEmission->Liste();
            $articles = $this->ModelArticle->Liste();
            parent::Set(array('emissions'=>$emissions,'articles'=>$articles));
            parent::Render('index.php',"Emission");
        // }
    }
}
?>