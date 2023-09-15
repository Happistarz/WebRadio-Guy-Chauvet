<?php

#path for all branch
define('ROOT',str_replace('index.php',"",$_SERVER['SCRIPT_FILENAME']));
define('APP',ROOT.'app/');
define('CONTROLER', APP.'controllers/');
define('MODEL',APP.'models/');
define('VUE',APP.'vue/');
define('GENERAL', ROOT.'general/');
define('CONF',ROOT.'conf/');

#derterminer si le chemin apres index et vide
if( empty($_GET['p'])){
    $ctrl = 'Accueil';
    $param = array();
}else{
    $param = explode('/',$_GET['p']);
    $ctrl =  $param[0];
}

#dertermine si la mehode choisie / saisie existe
if(!empty($param[1])){
    $action = $param;
}else{
    $action = 'index';
}
if (!file_exists(CONTROLER.$ctrl.'.php')){
    $ctrl = "ErrorHandler";
}
require (CONTROLER.$ctrl.'.php');



$ctrl = new $ctrl;
unset($param[0]);
unset($param[1]);

#appel final du controler / methode et +
call_user_func_array(array($ctrl,$action),$param);
?>

