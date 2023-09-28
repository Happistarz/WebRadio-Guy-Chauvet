<!-- <link rel="stylesheet" href="<?php //WEBROOT ."app/www/css/style.css"
                                    ?>"> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title><?php echo $title; ?></title>
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