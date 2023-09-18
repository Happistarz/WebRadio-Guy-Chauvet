<?php
require_once(LIB.'model.php');
class ModelAccueil extends Model{
    protected $id;
    protected $lib;
    protected $table;
    public function __construct(){
        $this->table = "Audio";
        parent::__construct($this->table,$this->id);
        }
}

?>
