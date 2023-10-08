<?php

require_once LIB . "Controller.php";

class CTRLAccount extends Controller
{
  public function __construct()
  {
  }

  public function login()
  {
    parent::Render("login.php", "Connexion");
  }

  public function create()
  {
    echo "create";
  }

  public function logout()
  {
    session_start();
    session_destroy();
    header('Location: ' . WEBROOT . 'Accueil');
  }
}

?>