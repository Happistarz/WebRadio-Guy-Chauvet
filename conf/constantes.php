<?php


// Constantes de connexion à la base de données
define('ROOT', dirname($_SERVER['SCRIPT_FILENAME']) . "/");
define('WEBROOT', dirname($_SERVER['SCRIPT_NAME']) . "/");
define('APP', ROOT . 'src/app/');
define('LIB', ROOT . 'src/lib/');
define('CONTROLLER', APP . 'controllers/');
define('MODEL', APP . 'models/');
define('VUE', APP . 'vue/');
define('CONF', ROOT . 'conf/');
define('VIEWS', VUE . 'views/');
define('WWW', WEBROOT . 'src/app/www/');
define('IMG', WEBROOT . 'src/app/utils/');
define('CSS', WEBROOT . 'src/app/www/css/');
define('DATA', WEBROOT . 'src/data/');

define('ADMIN_MAIN', "webradio@lycee-guychauvet.fr");

function ValidSession()
{
    if (isset($_SESSION) && !empty($_SESSION) && $_SESSION['valid'] && !empty($_SESSION['login']) && !empty($_SESSION['role'])) {
        return true;
    } else {
        return false;
    }
}
;

function hasRole($role)
{
    return ValidSession() && $_SESSION['role'] == $role;
}
;

?>