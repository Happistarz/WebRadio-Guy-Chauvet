<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="<?php echo WWW . "js/loader.js" ?>"></script>
    <link rel="stylesheet" href="<?php echo CSS . "reset.css" ?>">
    <link rel="stylesheet" href="<?php echo CSS . "style.css" ?>">
    <link rel="icon" type="image/png" href="<?php echo DATA . "general/icones/couleur.png" ?>" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="<?php echo WWW . "js/functions.js" ?>"></script>
    <title>
        <?php echo $title; ?>
    </title>
</head>

<body>
    <?php require VIEWS . "header.php"; ?>
    <main>
        <div class="content">
            <?php echo $content; ?>
        </div>
    </main>
    <?php require VIEWS . "footer.php"; ?>
</body>

</html>