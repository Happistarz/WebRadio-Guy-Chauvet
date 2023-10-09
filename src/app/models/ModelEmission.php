<?php
require_once(LIB.'model.php');

/**
 * Class ModelEmission
 * 
 * Model de la page emission
 * 
 * table Emission
 * id NOM
 */
class ModelEmission extends Model{
    protected $id;
    protected $table;
    protected $NOM;
    protected $NOMLONG;
    protected $DESCRIPTION;
    protected $SRC;
    protected $INSCRIPTION;
    public $nbAUDIO;
    public function __construct(){
        $this->id ="NOM";
        $this->table = "Emission";
        parent::__construct($this->table,$this->id);
        }
}

?>