<?php
require('header.php');
entete("Rédaction");
$dbh = new PDO('mysql:host=127.0.0.1;dbname=web_radio', 'chefWR', 'mdpwebradio');

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    
} else {
    header("location:login.php");
    exit;
}


if (isset($_POST["submit-article"])) {
    $titre = $_POST['title'];
    $description = $_POST['desc'];
    $contenu = $_POST['content'];
    $image = $_POST['img'];
    $heure = date("H:i", time());
    $created = date("Y-m-d");
    $modified = date("Y-m-d");

    $sql = "INSERT INTO Article (titre,description,contenu,image,heure,created,modified) VALUES ('$titre','$description','$contenu','$image','$heure','$created','$modified')";
    $res = $dbh->exec($sql);
    // header("location:creation.php?creation=success");
}
if (isset($_POST["submit-emission"])) {
    $titre = $_POST["title"];
    $description = $_POST["desc"];
    // $audio = $_POST["audio"];
    $heure = date("H:i", time());
    $created = date("Y-m-d");
    $modified = date("Y-m-d");
    $selected = $_POST["select"];
    $table = "";
    switch ($selected) {
        case 'H2P':
            $table = "Histoire_de_Poche";
            break;
        case 'JA':
            $table = "Le_Journal_Audio";
            break;
        case '1T3C':
            $table = "1_Theme_3_Chansons";
            break;
        case 'QES':
            $table = "Quiz_en_série"; 
            break;
        default:
            $table = "";
            break;
    }
    if (!empty($selected)) {
        $sql1 = "INSERT INTO  $table (titre,description,audio,heure,created,modified) VALUES ('$titre','$description','/files/H2P/','$heure','$created','$modified')";
        $dbh->exec($sql1);
    }
}

$dbh = null;
?>

<body>
    <div style="min-height:60vh ;" class="creation main">
        <a id="profile" class="border-2">
            <img src="../images/test.png" alt="Profile photo">
            <h2 class="grade">Grade : Redac </h3>
        </a>
        <div class="redac-dropdown">
            <img src="../images/signe-plus.png" class="dropbtn" alt="Dropdown">
            <div class="dropdown-content">
                <button onclick="addredac()">Article</button>
                <button onclick="addemis()">Emission</button>
            </div>
        </div>
        <form id="form1" method="POST" enctype="multipart/form-data" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
            <h1 class="title" style="margin-top: 1%">Création d'un article</h1>
            <hr size=5 width="93%" color=black>
            <input type="hidden" id="content">
            <!-- <div class="toolbar">
                <img src="../images/bold.png" onclick="makeBold()" alt="bolt" />
                <img src="../images/italic.png" alt="italic" />
                <img src="../images/underlined-text.png" alt="underline" />
            </div> -->

            <textarea onkeyup="textAreaAdjust(this)" name="title" placeholder="*Titre article"></textarea>
            <div class="upload-group">
                <input type="file" id="image" onchange="previewImage()" name="img" value="Parcourir..." accept=".jpg,.png,.pdf" />*
            </div>
            <img id="preview" src="" alt="" style="max-width: 200px;">
            <textarea onkeyup="textAreaAdjust(this)" name="desc" placeholder="*Description image"></textarea>
            <textarea onkeyup="textAreaAdjust(this)" name="content" placeholder="*Contenu article"></textarea>
            <input id="submit" type="submit" name="submit-article" value="Valider">
            <p style='font-size: 15px'>Les <strong style="color:red;">*</strong> sont des champs obligatoires</p>
        </form>
        <!-- ------------------------------------------------------------------------------------- -->
        <form id="form2" method="post" enctype="multipart/form-data" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
            <h1 class="title" style="margin-top: 1%">Création d'une émission</h1>
            <hr size=5 width="93%" color=black>
            <input type="hidden" name="content" id="content">
            <!-- <div class="toolbar">
                <img src="../images/bold.png" onclick="makeBold()" alt="bolt" />
                <img src="../images/italic.png" alt="italic" />
                <img src="../images/underlined-text.png" alt="underline" />
            </div> -->
            <select id="rubriques" name="select">
                <option value="H2P">*Histoire de Poche</option>
                <option value="JA">*Journal Audio</option>
                <option value="1T3C">*1 Thème 3 Chansons</option>
                <option value="QES">*Question en Série</option>
            </select>
            <textarea onkeyup="textAreaAdjust(this)" name="title" placeholder="*Titre émission" required></textarea>
            <div class="upload-group">
                <input type="file" id="audio-file" accept="audio/*" name="audio" required/>
                *
            </div>
            <textarea onkeyup="textAreaAdjust(this)" name="desc" placeholder="*Description image" required></textarea>
            <textarea onkeyup="textAreaAdjust(this)" name="content" placeholder="*Contenu émission" required></textarea>
            <input id="submit" type="submit" name="submit-emission" value="Valider">
            <p style='font-size: 15px'>Les <strong style="color:red;">*</strong> sont des champs obligatoires</p>
        </form>
    </div>
</body>


<?php
require 'footer.php';
?>

</html>