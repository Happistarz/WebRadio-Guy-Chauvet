<?php

require GENERAL."Controller.php";

class ErrorHandler extends Controller {
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        echo 'Erreur pas de page';
    }
}
?>