<?php

require_once(LIB.'Connexion.php');

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

        $sql="SELECT * FROM ".$this->table." WHERE $condition";
        // echo $sql;
        $db = Connexion::login();
        $res=$db->query($sql);
        $db=Connexion::logout();
        $data = array();
        while($resu=$res->fetch(PDO::FETCH_ASSOC)){
            $data[]=$resu;
        }
        return $data;

    }

    public function  Delete($id) {
        $sql = "DELETE FROM $this->table WHERE $this->primary='$id'";
        $db=Connexion::login();
        $res=$db->exec($sql);
        $db=Connexion::logout();
    }

   public function Read($id){
        $sql = "SELECT * FROM $this->table WHERE $this->primary='$id'";
        // echo $sql;
        $db=Connexion::login();
        $res=$db->query($sql);
        $db=Connexion::logout();
        $resu=$res->fetch(PDO::FETCH_ASSOC);
        foreach($resu as $k => $v) {$this->$k=$v;}
        return $resu;
    }
    
    public function ReadByKey($cond = array("1=1")) {
        $where = implode(" AND ", $cond);
        echo $where;
        // return $resu;
        return $this->Liste($where);

    }
    

   public function Create(){
            $db=Connexion::login();
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
        $sql="INSERT INTO $this->table($colum) VALUES ($valeur)";

        $res=$db->exec($sql);
        $db=Connexion::logout();
   }

   public function Update(){
        $db=Connexion::login();
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
        $db=Connexion::logout();
   }

   public function postobjets(){
    foreach($_POST as $k=> $v){
        $this->$k=$v;
    }
   }

   public function ToArray() {
    $data = array();
    foreach($this as $k => $v) {
        $data[$k] = $v;
    }
    return $data;
   }

   /**
    * Count the number of items in a table with a condition
    * @param string $condition
    * @return int
    */
    public function Count($condition = "1=1") {
        $sql = "SELECT COUNT(*) AS NB FROM $this->table WHERE $condition";
        $db = Connexion::login();
        $res = $db->query($sql);
        $db = Connexion::logout();
        $resu = $res->fetch(PDO::FETCH_ASSOC);
        return $resu['NB'];
    }

}

?>
