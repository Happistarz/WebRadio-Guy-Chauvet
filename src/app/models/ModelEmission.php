<?php
require_once(LIB.'model.php');

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