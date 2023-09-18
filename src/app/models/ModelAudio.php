<?php 

require LIB ."model.php";

class ModelAudio extends Model {
    protected $table = "audio";

    protected $id = "ID";
    protected $id_emission;
    protected $nom;
    protected $description;
    protected $heure;
    protected $date;
    protected $audio;
    protected $auteurs;
    public function __construct() {

        parent::__construct($this->table, $this->id);
    }
}
?>