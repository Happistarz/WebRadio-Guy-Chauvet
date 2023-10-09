<?php

require LIB."Controller.php";

/**
 * Class CTRLErrorHandler
 * 
 * Controleur de la page Error
 * liste des Error
 * ajout d'une Error
 * modification d'une Error
 * suppression d'une Error
 */
class CTRLErrorHandler extends Controller {
    public function __construct(){
        parent::__construct();
    }

    /**
     * index
     * 
     * Methode appelée par defaut
     * @return void
     */
    public function index(){
        echo 'Erreur pas de page';
    }
}
?>