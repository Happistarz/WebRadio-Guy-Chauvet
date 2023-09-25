<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title;?></title>
</head>
<body>
    <?php require VIEWS . "header.php" ?>
    <div class="content">
        <?php echo $content; ?>
    </div>
    <div class="inscription">
        <form action="POST">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" id="prenom">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp">
            <label for="mdp2">Confirmer mot de passe</label>
            <input type="password" name="mdp2" id="mdp2">
            <input type="submit" value="S'inscrire">
        </form>
    </div>
    <?php require VIEWS . "footer.php" ?>
</body>
</html>