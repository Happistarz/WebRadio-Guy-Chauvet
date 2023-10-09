<?php

/**
 * Class Connexion : Permet de se connecter à la base de données
 */
class Connexion {
    private static $login = "chef";
    private static $host = "127.0.0.1";
    private static $dbname = "WebRadio";
    private static $password = "mdpchef";

    /**
     * Permet de se connecter à la base de données
     * 
     * @return PDO
     */
    public static function login() : PDO
    {
        return new PDO("mysql:host=".self::$host.";dbname=".self::$dbname, self::$login, self::$password);
    }

    /**
     * Permet de se déconnecter de la base de données
     * 
     * @return null
     */
    public static function logout() {
        return null;
    }

}
function hashPassword ($passwd) {
    return password_hash($passwd, PASSWORD_DEFAULT);
}

/*
Pour stocker des informations sensibles comme des identifiants de base de données dans un fichier de configuration caché avec .gitignore, vous pouvez suivre ces étapes :

Créez un fichier de configuration : Créez un fichier de configuration (par exemple, config.php) dans lequel vous stockerez vos informations sensibles. Assurez-vous qu'il est situé en dehors de la racine de votre projet web pour des raisons de sécurité.

Ajoutez vos identifiants : Dans le fichier config.php, définissez des constantes pour vos identifiants de base de données, par exemple :

php
Copy code
define('DB_HOST', 'localhost');
define('DB_USER', 'votre_utilisateur');
define('DB_PASSWORD', 'votre_mot_de_passe');
define('DB_NAME', 'votre_base_de_donnees');
Vous pouvez également ajouter d'autres constantes pour d'autres informations sensibles, comme les clés d'API, etc.

Ajoutez le fichier à .gitignore : Créez un fichier .gitignore s'il n'existe pas déjà, et ajoutez-y le nom de votre fichier de configuration (config.php) pour vous assurer qu'il ne sera pas suivi par Git.

plaintext
Copy code
config.php
Incluez le fichier de configuration : Dans vos scripts PHP où vous avez besoin de ces informations sensibles, incluez simplement le fichier de configuration en utilisant require_once ou include_once.

php
Copy code
require_once('chemin/vers/config.php');
Utilisez les constantes : Vous pouvez maintenant utiliser les constantes définies dans config.php dans votre code pour accéder aux informations sensibles en toute sécurité.

php
Copy code
$dbHost = DB_HOST;
$dbUser = DB_USER;
$dbPassword = DB_PASSWORD;
$dbName = DB_NAME;

// Utilisez ces variables pour configurer votre connexion à la base de données
De cette manière, vos informations sensibles sont stockées en toute sécurité dans un fichier de configuration qui n'est pas suivi par Git, ce qui protège vos données sensibles tout en les rendant facilement accessibles dans votre code PHP. Assurez-vous de sécuriser également correctement l'accès au fichier de configuration sur le serveur web pour empêcher tout accès non autorisé.*/


?>