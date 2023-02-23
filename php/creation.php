<?php
	require 'header.php';
	$sql = "INSERT INTO Article (";
	$dbh = new PDO('mysql:host=127.0.0.1;dbname=web_radio','chefWR','mdpwebradio');
	$res = $dbh ->query($sql);
	$dbh = null;
	
?>
<body>
    <main style="min-height:60vh ;" class="creation">
        <a id="profile" class="border-2">
            <img src="../images/test.png" alt="Profile photo">
            <h2 class="grade">Grade : Admin</h3>
        </a>
        <div class="redac-dropdown">
            <img src="../images/signe-plus.png" class="dropbtn" alt="Dropdown">
            <div class="dropdown-content">
                <button onclick="addredac()">Article</button>
                <button onclick="addemis()">Emission</button>
            </div>
        </div>
        <form id="form1" action="">
            <h1 class="title" style="margin-top: 1%">Crèation d'un article</h1>
            <hr size=5 width="93%" color=black>
            <input type="hidden" name="content" id="content">
            <div class="toolbar">
                <img src="../images/bold.png" onclick="makeBold()" alt="bolt" />
                <img src="../images/italic.png" alt="italic" />
                <img src="../images/underlined-text.png" alt="underline" />
            </div>
            <textarea onkeyup="textAreaAdjust(this)" placeholder="Titre article"></textarea>
            <textarea onkeyup="textAreaAdjust(this)" placeholder="Resumé article"></textarea>
            <input type="file" id="image" onchange="previewImage()" value="Parcourir..." />
            <img id="preview" src="" alt="" style="max-width: 200px;">
            <textarea onkeyup="textAreaAdjust(this)" placeholder="Description image"></textarea>
            <textarea onkeyup="textAreaAdjust(this)" placeholder="Contenu article"></textarea>
            <input id="submit" type="submit" value="Submit">
        </form>

        <form id="form2" action="">
            <h1 class="title" style="margin-top: 1%">Création d'une émission</h1>
            <hr size=5 width="93%" color=black>
            <input type="hidden" name="content" id="content">
            <div class="toolbar">
                <img src="../images/bold.png" onclick="makeBold()" alt="bolt" />
                <img src="../images/italic.png" alt="italic" />
                <img src="../images/underlined-text.png" alt="underline" />
            </div>
            <textarea onkeyup="textAreaAdjust(this)" placeholder="Titre émission"></textarea>
            <textarea onkeyup="textAreaAdjust(this)" placeholder="Resumé émission"></textarea>
            <div class="upload-group">
                <input type="file" id="audio-file" accept="audio/*" />
                <audio id="audio-preview" controls></audio>
            </div>
            <textarea onkeyup="textAreaAdjust(this)" placeholder="Description image"></textarea>
            <textarea onkeyup="textAreaAdjust(this)" placeholder="Contenu émission"></textarea>
            <input id="submit" type="submit" value="Submit">
        </form>
    </main>
</body>
<?php
	require 'footer.php';
?>
</html>