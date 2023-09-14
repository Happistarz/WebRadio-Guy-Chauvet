<?php
class Controller{

    protected $view = array();

    public function __construct(){
    }

    public function loadModel($model){
        require(MODEL.$model.".php");
        $this->$model = new $model();
    }

    public function Set($array) {
        $this->view = array_merge($this->view, $array);
    }


    public function Render($name, $layout = "default") {
        // EXTRACT LES DATA
        extract($this->view);
        
        // RECUP LE DOSSIER PUIS LE PATH
        $doss = get_class($this);
        $doss = str_replace("CTRL", "", $doss);
        $path = VUE."$doss/$name";

        // REQUIRE LA VUE MAIS LA STOCK DANS UN BUFFER
        ob_start();
        require $path;
        // RECUP LE BUFFER
        $content = ob_get_clean();
        ob_end_clean();

        // REQUIRE LE LAYOUT
        require VUE."layout/$layout.php";
    }
}














