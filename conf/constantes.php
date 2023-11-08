<?php


// Constantes de connexion à la base de données
define('ROOT', dirname(__DIR__) . '/');
define('WEBROOT', dirname($_SERVER['SCRIPT_NAME']) . "/");
define("AJAXROOT", "");
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

/**
 * Verifications de session

 @return bool
 */
function ValidSession() : bool
{
    if (isset($_SESSION) && !empty($_SESSION) && $_SESSION['valid'] && !empty($_SESSION['login']) && !empty($_SESSION['role'])) {
        return true;
    } else {
        return false;
    }
}
;

/**
 * Verification du role
 * 
 * @param string $role
 * @return bool
 */
function hasRole($role) : bool
{
    return ValidSession() && $_SESSION['role'] == $role;
}
;

?>