<?php

/**
 * Class Controller
 * 
 * Parent de tous les controllers
 * 
 * 
 */
class Controller{

    protected $view = array(); // stock les données à passer à la vue

    /**
     * Charge un model
     * 
     * @param string $model
     * @return void
     * 
     */
    public function loadModel($model){
        require(MODEL.$model.".php");
        $this->$model = new $model();
    }

    /**
     * Charge un model
     * 
     * @param array[string,array] $array
     * @return void
     * 
     */
    public function Set($array) {
        $this->view = array_merge($this->view, $array);
    }


    /**
     * Charge un model
     * 
     * @param string $name
     * @param string $layout
     * @return void
     * 
     */
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

