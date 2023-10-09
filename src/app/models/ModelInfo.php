<?php
require_once(LIB.'model.php');

/**
 * Class ModelInfo
 * 
 * Model de la page info
 * table Info
 * id ID
 */
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
