<?php

require LIB . "Controller.php";

class CTRLErrorHandler extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        parent::Render("error.php", "Erreur");
    }
}
?>