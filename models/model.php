<?php
class Model{
    private $table;
    private $primary;
    private $arraysys;

    public function __construct($table,$primary){
        $this->primary = $primary;
        $this->table = $table;
        $this->arraysys = array('table','primary','arraysys');
    }

    public function Liste($condition='1=1'){

        $sql="SELECT * FROM $this->table WHERE $condition";
        $db = $this->connect();
        $res=$db->query($sql);
        $db=null;
        while($resu=$res->fetch(PDO::FETCH_ASSOC)){
            $data[]=$resu;
        }
        return $data;

    }

    public function  Delete($id) {
        $sql = "DELETE FROM $this->table WHERE $this->primary=$id";
        $db=$this->connect();
        $res=$db->exec($sql);
        $db=null;
    }

   public function Read($id){
        $sql = "SELECT * FROM $this->table WHERE $this->primary=$id";
        echo $sql;
        $db=$this->connect();
        $res=$db->query($sql);
        $db=null;
        $resu=$res->fetch(PDO::FETCH_ASSOC);
        foreach($resu as $k => $v) {$this->$k=$v;}
    }

   public function Create(){
        $db=$this->connect();
    $colum="";
    $valeur="";
        foreach($this as $k => $v){
                if (! in_array($k,$this->arraysys) && $k !=$this->primary)
                {
                  $colum .= $k.',';
                  $valeur .= "'$v',";
                }
        }
        $colum = substr($colum,0,-1);
        $valeur = substr($valeur,0,-1);
    $sql="INSERT INTO Produit($colum) VALUES ($valeur)";

        $res=$db->exec($sql);
        $db=null;
   }

   public function Update(){
        $db=$this->connect();
        $cle = $this->primary;
        $id = $this->$cle;
        $sql = "UPDATE $this->table SET ";
    foreach($this as $k => $v){
        if (! in_array($k,$this->arraysys) && $k !=$this->primary)
                {
                  $sql .="$k='$v',";
                }
    }
    $sql = substr($sql,0,-1);

    $sql .= " WHERE $this->primary =$id";
    echo $sql;
        $res=$db->exec($sql);
        $db=null;
   }
   public function connect()
   {
        return new PDO('mysql:host=127.0.0.1;dbname=ECommerce','chef','mdpchef');
   }

   public function postobjets(){
    foreach($_POST as $k=> $v){
        $this->$k=$v;
    }
   }
}

?>
