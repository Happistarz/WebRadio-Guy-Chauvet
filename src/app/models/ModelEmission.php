<?php
require_once(LIB.'model.php');

class ModelEmission extends Model{
    protected $id;
    protected $NOM;
    protected $table;
    public function __construct(){
        $this->NOM ="";
        $this->id ="NOM";
        $this->table = "Emission";
        parent::__construct($this->table,$this->id);
        }
}

?>