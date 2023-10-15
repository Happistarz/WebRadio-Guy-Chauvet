<?php

/**
 * Class Controller
 * 
 * Classe parente des controleurs
 * 
 * @package webradio
 */
class Controller
{

    /**
     * @var array $view
     */
    protected $view = array();

    public function __construct()
    {
    }

    /**
     * loadModel
     * 
     * Charge un model
     * 
     * @param  string $model
     * @return void
     */
    public function loadModel($model)
    {
        require(MODEL . $model . ".php");
        $this->$model = new $model();
    }

    /**
     * Set
     * 
     * Ajoute des données à la vue
     * 
     * @param  array $array
     * @return void
     */
    public function Set($array)
    {
        $this->view = array_merge($this->view, $array);
    }


    /**
     * Render
     * 
     * Affiche la vue
     * 
     * @param  string $name
     * @param  string $title_page
     * @param  string $layout
     * @return void
     */
    public function Render($name, $title_page, $layout = "default")
    {
        // EXTRACT LES DATA
        extract($this->view);

        // RECUP LE DOSSIER PUIS LE PATH
        $doss = get_class($this);
        $doss = str_replace("CTRL", "", $doss);
        $path = VUE . "$doss/$name";

        // REQUIRE LA VUE MAIS LA STOCK DANS UN BUFFER
        ob_start();
        require $path;
        // RECUP LE BUFFER
        $content = ob_get_clean();
        ob_end_clean();

        $title = $title_page;
        // REQUIRE LE LAYOUT
        require VUE . "layout/$layout.php";
    }


    /**
     * RenderAJAX
     * 
     * Affiche la vue en AJAX
     * 
     * @param  string $name
     * @param  string $title_page
     * @return void
     */
    public function RenderAJAX($name, $title_page)
    {
        // // EXTRACT LES DATA
        // extract($this->view);

        // // RECUP LE DOSSIER PUIS LE PATH
        // $doss = get_class($this);
        // $doss = str_replace("CTRL", "", $doss);
        // $path = VUE . "$doss/$name";

        // // REQUIRE LA VUE MAIS LA STOCK DANS UN BUFFER
        // ob_start();
        // require $path;
        // // RECUP LE BUFFER
        // $content = json_encode(ob_get_clean());
        // ob_end_clean();

        // // REQUIRE LE LAYOUT
        // require VUE . "layout/box.php";

        // this function need to return a json object with the content of the view and the title of the page
        // the function call a layout with header and footer and echo the content of the view in the main
        // in the layout, i need $title, $content that will be decoded

        // EXTRACT LES DATA
        extract($this->view);

        // RECUP LE DOSSIER PUIS LE PATH
        $doss = get_class($this);
        $doss = str_replace("CTRL", "", $doss);
        $path = VUE . "$doss/$name";

        // REQUIRE LA VUE MAIS LA STOCK DANS UN BUFFER
        ob_start();
        require $path;
        // RECUP LE BUFFER
        $content = json_encode(ob_get_clean());
        ob_end_clean();

        // REQUIRE LE LAYOUT
        require VUE . "layout/box.php";
    }
}
?>