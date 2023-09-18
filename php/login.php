<?php
require("header.php");
entete("Login");
// Connexion à la base de données
$dsn = 'mysql:host=127.0.0.1;dbname=web_radio';
$username = 'chefWR';
$password = 'mdpwebradio';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    header("location:creation.php");
    exit;
}

$dbh = new PDO($dsn, $username, $password, $options); 
?>

<div class="form-wrapper">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="username" placeholder="Nom d'utilisateur"><br>
        <input type="password" name="password" placeholder="Mot de passe"><br>
        <?php
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = htmlspecialchars($_POST["username"]);
            $password = htmlspecialchars($_POST["password"]);

            $stmt = $dbh->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user["password"])) {
                // Redirection vers la page d'accueil si les informations de connexion sont correctes
                session_start();
                $_SESSION["logged_in"] = true;
                header("location:creation.php");
            } else {
                // Affichage d'un message d'erreur si les informations de connexion sont incorrectes
                echo "<div class='error-message'>Nom d'utilisateur ou mot de passe incorrect</div>";
            }
        }
        ?>
        <input type="submit" value="Se connecter">
    </form>
</div>