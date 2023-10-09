<?php
require_once(LIB.'model.php');

/**
 * Class ModelAccueil
 * 
 * Model de la page accueil
 * table Audio
 * id id
 */
class ModelAccueil extends Model{
    protected $id;
    protected $lib;
    protected $table;
    public function __construct(){
        $this->table = "Accueil";
        parent::__construct($this->table,$this->id);
        }
}

?>
