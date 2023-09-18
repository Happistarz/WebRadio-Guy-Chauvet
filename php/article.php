<?php require("header.php");
?>


<?php

$id = $_GET['id'];
$sql = "SELECT * FROM Article WHERE id = '".$id."'";
$db = new PDO("mysql:host=127.0.0.1;dbname=web_radio","chefWR","mdpwebradio");
$res = $db->query($sql);

$resu = $res->fetch(PDO::FETCH_ASSOC);

$time = $resu["heure"];
$time = explode(":", $time);
$ftime = $time[0] . "h" . $time[1];

$date = $resu['created'];
$date = explode("-", $date);
$month = date("M", strtotime($date[1] . "-01-01"));
$fdate = $date[2] . " " . $month . ". " . $date[0];

$months = array(
  "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"
);

$db = null;

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/loader.js"></script>
    <title>Article - <?php echo $resu["titre"]; ?></title>
</head>

<body>
	    <div class="main">
        <!-- setup art box -->
        <div class="art-box" style="margin-top: 5%;">
            <div><?php echo ($fdate . " | " .  $ftime);?></div>
            <h4><?php echo $resu["titre"];?> </h4>
            <div class="art-box-img">
                <img class="border-1" src="../images/test.png" alt="Image">
                <p><?php echo $resu["description"]; ?></p>
            </div>
            <p><?php echo $resu["contenu"] ?></p>
        </div>
</div>
	
	<?php require("footer.php");?>	
</body>

</html>
