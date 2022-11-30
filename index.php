<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WebRadio</title>
    <link rel="stylesheet" href="main.css">
    <link rel="import" href="/main.html">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
</head>

<body>
    <meta http-equiv="refresh" content="delay_time; URL=/template/page_d_acueil.html" />
    
    <?php
if ($_GET['run']) {
  # This code will run if ?run=true is set
  exec("/var/www/html/lgc-update.sh");
}
?>

<!-- This link will add ?run=true to your URL, myfilename.php?run=true -->
 <a href="?run=true">Update du site (test)</a>
    <!--
<a href="/var/www/html/lgc-update.sh">Mettre a jour le site </a> -->
</body>


</html>
