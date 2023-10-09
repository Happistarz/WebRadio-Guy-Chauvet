<?php

require_once LIB . "Controller.php";
/**
 * Class CTRLAccount
 * 
 * Controleur de la page Account
 * liste des Account
 * ajout d'une Account
 * modification d'une Account
 * suppression d'une Account
 */
class CTRLAccount extends Controller
{
  public function __construct()
  {
  }

  /**
   * page login
   * 
   * @return void
   */
  public function login()
  {
    parent::Render("login.php", "Connexion");
  }

  /**
   * page create
   * 
   * @return void
   */
  public function create()
  {
    echo "create";
  }

  /**
   * page logout
   * 
   * @return void
   */
  public function logout()
  {
    echo "logout";
  }
}

?>