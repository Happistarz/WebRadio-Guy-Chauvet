<!-- <link rel="stylesheet" href="<?php //WEBROOT ."app/www/css/style.css"?>"> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
</head>

<body>

    <?php require VIEWS . "header.php"; ?>
    <div class="content">
        <?php echo $content; ?>
    </div>
    <?php require VIEWS . "footer.php"; ?>
</body>

</html>