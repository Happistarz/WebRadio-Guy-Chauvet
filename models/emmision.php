<?php
require_once('model.php');
class Emission extends Model{
    protected $id;
    protected $NOM;
    protected $table;
    public function __construct(){
        $this->NOM ="";
        $this->id =1;
        $this->table = "Emission";
        parent::__construct($this->table,$this->id);
        }
}
?>