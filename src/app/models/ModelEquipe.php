<?php
require_once(LIB.'model.php');
class ModelEquipe extends Model{
    protected $id;
    protected $NOM;
    protected $PRENOM;
    protected $DESCRIPTION;
    protected $MAIL;
    protected $SRC;
    protected $table;
    public function __construct(){
        $this->table = "Article";
        $this->id = "ID";
        parent::__construct($this->table,$this->id);
        }
}

?>
