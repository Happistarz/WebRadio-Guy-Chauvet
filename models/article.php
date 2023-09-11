<?php
require_once('model.php');
class Article extends Model{
    protected $id;
    protected $lib;
    protected $table;
    public function __construct(){
        $this ->lib ="";
        $this ->id =1;
        $this->table = "article";
        parent::__construct($this->table,$this->id);
        }
}
?>

