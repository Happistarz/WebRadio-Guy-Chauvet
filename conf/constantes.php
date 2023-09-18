<?php
// ROOT = AU CHEMIN DU DOSSIER WebRadio-Guy-Chauvet


define('ROOT', dirname($_SERVER['SCRIPT_FILENAME'])."/"); // Chemin à partir de var/www/html/WebRadio-Guy-Chauvet/
define('WEBROOT', dirname($_SERVER['SCRIPT_NAME'])."/src/app/"); // Chemin à partir de src/app/
define('APP', ROOT . 'src/app/');
define('LIB', ROOT . 'src/lib/');
define('CONTROLLER', APP . 'controllers/');
define('MODEL', APP . 'models/');
define('VUE', APP . 'vue/');
define('UTILS', APP . 'utils/');
define('CONF',ROOT.'conf/');
define('VIEWS',VUE.'views/');
define('WWW',WEBROOT.'www/');
// define a constant that load images and styles in www/ and utils/ as url
define('IMG',WEBROOT.'utils/');
define('CSS',WEBROOT.'www/css/');

define('EMISSIONS', array(
    "H2P" => "Histoire de Poche",
    "1T3C" => "1 Thème 3 Chansons",
    "JA" => "Journal Audio",
    "QES" => "Quizz En Série",
    "QQC" => "Qui Que C'est",
    "DBL" => "Débat Lycéen"
));


?>
<img src="<?php echo WEBROOT . "utils/general/Logo.png"?>" alt="">