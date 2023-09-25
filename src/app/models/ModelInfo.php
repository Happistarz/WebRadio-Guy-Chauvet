<?php
require_once(LIB.'model.php');
class ModelInfo extends Model{
    protected $id;
    protected $NOM;
    protected $table;
    protected $INFO;
    protected $CREATED;
    protected $MODIFIED;

    public function __construct(){
        $this->table = "Info";
        parent::__construct($this->table,$this->id);
        }
}

?>
