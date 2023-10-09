<?php 

require_once LIB ."model.php";

/**
 * Class ModelAudio
 * 
 * Model de la page Audio
 * table Audio
 * id ID
 */
class ModelAudio extends Model {
    protected $table = "Audio";

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