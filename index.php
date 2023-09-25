<?php

#path for all branch
require('conf/constantes.php');
ini_set('display_errors',1);
#derterminer si le chemin apres index et vide
if( empty($_GET['p'])){
    $ctrl = 'CTRLAccueil';
    $param = array();
}else{
    $param = explode('/',$_GET['p']);
    $ctrl =  "CTRL".$param[0];
}
#dertermine si la mehode choisie / saisie existe
if(!empty($param[1])){
    $action = $param[1];
}else{
    $action = 'index';
}
if (!file_exists(CONTROLLER.$ctrl.'.php')){
    $ctrl = "CTRLErrorHandler";
}
require (CONTROLLER.$ctrl.'.php');

$ctrl = new $ctrl();
unset($param[0]);
unset($param[1]);

#appel final du CONTROLLER / methode et +
call_user_func_array(array($ctrl,$action),$param);
?>

