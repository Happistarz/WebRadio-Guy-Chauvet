<?php
require_once(LIB.'model.php');

/**
 * 
 * Model de la page utilisateurs
 * table Utilisateurs
 * id ID
 */
class ModelUtilisateurs extends Model{
    protected $id;
    protected $table;
    protected $LOGIN;
    protected $PASSWORD;
    protected $ROLE;
    public function __construct(){
        $this->id ="ID";
        $this->table = "Utilisateurs";
        parent::__construct($this->table,$this->id);
        }
}

?>