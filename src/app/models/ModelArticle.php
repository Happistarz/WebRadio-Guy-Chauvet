<?php
require_once(LIB.'model.php');

/**
 * Class ModelAccueil
 * 
 * Model de la page accueil
 * table Article
 * id ID
 */
class ModelArticle extends Model{
    protected $id;
    protected $lib;
    protected $table;
    public function __construct(){
        $this->table = "Article";
        $this->id = "ID";
        parent::__construct($this->table,$this->id);
        }
}

?>
