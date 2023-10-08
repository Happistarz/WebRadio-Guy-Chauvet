<?php

require_once(LIB . "Controller.php");

class CTRLRedacteur extends Controller
{
    public function __construct()
    {
        parent::loadModel('ModelUtilisateurs');
        parent::loadModel('ModelEmission');
        parent::loadModel('ModelArticle');
    }

    public function index()
    {
        // if (ValidSession()) {
        $emissions = $this->ModelEmission->Liste();
        // for each emission, count the number of audios
        for ($i = 0; $i < sizeof($emissions); $i++) {
            $emissions[$i]['AUDIOS'] = $this->ModelEmission->Count("Audio", "ID=" . $emissions[$i]['ID']);
            // echo $this->ModelEmission->Count("ID=".$emissions[$i]['ID']);
        }
        // var_dump($emissions);

        $articles = $this->ModelArticle->Liste();
        parent::Set(array('emissions' => $emissions, 'articles' => $articles));
        parent::Render('index.php', "Redaction", "box");
        // }
    }
}
?>