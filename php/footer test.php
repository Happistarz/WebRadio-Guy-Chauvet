<?php
// ----------------
require("header.php");
entete("footer");
// ----------------
$sql = "SELECT * FROM Podcast";
$db = new Pdo("mysql:host=127.0.0.1;dbname=web_radio", "chefWR", "mdpwebradio");
$resu = $db->query($sql);

$id = isset($_GET['id']) ? $_GET['id'] : null;
$sql2 = "SELECT * FROM Podcast WHERE id = :id";
$stmt = $db->prepare($sql2);
$stmt->execute(array(':id' => $id));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="podcast-container border-3">
    <?php
    foreach ($resu as $resultat) {
        echo "
  			<div class=\"podcast\">
    				<button onclick=\"Like(this)\"></button>
    				<div class=\"info-podcast\">
      					<h2>{$resultat["titre"]}</h2>
      					<p>{$resultat["description"]}</p>
				      	<p>{$resultat["created"]} / {$resultat["heure"]}</p>
			    	</div>
                    <button onclick=\"playPodcast(1)\"> ttt </button>
			   	 <audio controls>
				     	 <source src=\"../files/H2P/H2P Ep " . $resultat['id'] . ".wav\" type=\"audio/wav\">
			   	 </audio>
		 	 </div>
		 	 <hr size=5 width=\"90%\" color=\"black\">";
    } ?>
</div>
<script>
    // var audio = document.querySelector('audio');
    // var playButton = document.querySelector('.play-button');

    // playButton.addEventListener('click', function () {
    //     var audioSrc = audio.src;
    //     // Envoie de la source audio à la page du footer
    //     window.parent.postMessage(audioSrc, '*');
    // });

    function playPodcast(podcastid) {
        console.log("podcastid=" + podcastid);
        document.cookie = "podcastid=" + podcastid;
    }
</script>

<footer>
    <img src="../images/Logo.png" alt="Logo" class="logo-footer">
    <h4>A propos</h4>
    <div class="footer-element">
        <ul>
            <li><a href="contact.php">- Contact</a></li>
            <li><a href="plan_du_site.php">- Plan du site</a></li>
            <li><a href="mentions_legales.php">- Mentions Legales</a></li>
        </ul>
    </div>

</footer>
<?php
if (isset($_COOKIE["podcastid"])) {
    $id = $_COOKIE["podacstid"];
    $sql2 = "SELECT * FROM Podcat WHERE id = $id";
    $result = $db->query($sql2);
    echo "
<div class=\"podcast-ft\">
    <div class=\"head\">
        <p><strong> {$result["titre"]} </strong> / {$result["description"]}</p>   
    </div>
    <div class=\"audio-lect\">
        <button class=\"previous\"></button>
        <button onclick=\"Like(this)\" class=\"like\"></button>
        <button class=\"next\"></button>
        <audio controls preload>
            <source src=\"../files/H2P/H2P Ep {$id}.wav\">
        </audio>
        <img id=\"myImg\" src=\"../images/biblio.png\" alt=\"image\" class=\"biblio\" onclick=\"openModal('myModalmention')\">
    </div>
</div>
";
$db = null;
}
?>

</html>