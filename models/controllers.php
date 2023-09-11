<?php
class controllers{

    public function __construct(){
    }

    public function loadModel($model){
        require(MODEL.$model.".php");
        $this->$model = new $model();
    }

}














