<?php

class Connexion {
    private static $login = "chef";
    private static $host = "127.0.0.1";
    private static $dbname = "WebRadio";
    private static $password = "mdpchef";

    public static function login() : PDO
    {
        return new PDO("mysql:host=".self::$host.";dbname=".self::$dbname, self::$login, self::$password);
    }

    public static function logout() {
        return null;
    }

}
function hashPassword ($passwd) {
    return password_hash($passwd, PASSWORD_DEFAULT);
}

?>