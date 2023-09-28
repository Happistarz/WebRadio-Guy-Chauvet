<?php
// ROOT = AU CHEMIN DU DOSSIER WebRadio-Guy-Chauvet

define('ROOT', dirname($_SERVER['SCRIPT_FILENAME'])."/"); // Chemin à partir de var/www/html/WebRadio-Guy-Chauvet/
define('WEBROOT', dirname($_SERVER['SCRIPT_NAME'])."/"); 
define('APP', ROOT . 'src/app/');
define('LIB', ROOT . 'src/lib/');
define('CONTROLLER', APP . 'controllers/');
define('MODEL', APP . 'models/');
define('VUE', APP . 'vue/');
define('CONF',ROOT.'conf/');
define('VIEWS',VUE.'views/');
define('WWW',WEBROOT.'src/app/www/');
define('IMG',WEBROOT.'src/app/utils/');
define('CSS',WEBROOT.'src/app/www/css/');
define('DATA',WEBROOT.'src/data/');

define('ADMIN_MAIN',"webradio@lycee-guychauvet.fr");

define('EMISSIONS', array(
    "H2P" => "Histoire de Poche",
    "1T3C" => "1 Thème 3 Chansons",
    "JA" => "Journal Audio",
    "QES" => "Quizz En Série",
    "QQC" => "Qui Que C'est",
    "DBL" => "Débat Lycéen"
));


 function ValidSession() {
    if (isset($_SESSION) && !empty($_SESSION) && $_SESSION['valid'] && !empty($_SESSION['login']) && !empty($_SESSION['role'])) {
        return true;
    } else {
        header('Location: '.WEBROOT.'login');
        return false;
    }
};

?>