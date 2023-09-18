<?php 
	$sql = "SELECT * FROM Podcast";

        $db = new Pdo("mysql:host=127.0.0.1;dbname=web_radio", "chefWR", "mdpwebradio");
	$resu = $db->query($sql);

	$id = isset($_GET['id']) ? $_GET['id'] : null;
	$sql2 = "SELECT * FROM Emission WHERE id = :id";
	$stmt = $db->prepare($sql2);
	$stmt->execute(array(':id' => $id));
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
        <?php require("header.php");
        entete("Histoire de poche");
?>
    <!-- Setup Container Emission  -->
	<div class="emission">
        	<img src="../images/Images_rubriques/Rubrique_H2P.png" alt="Emission">
        	<article>
            		<h5>Histoire De Poche</h5>
            		<p>Histoire de poche, c'est une émission pour les amateurs d'histoire et de savoir. Nous vous raconterons des anecdotes historiques et mythologiques sur des sujets aussi variés qu’intéressant.</p>
        	</article>
    	</div>
    <div class="main">
        <!-- header page podcasts -->
        <h1 id="podcasts" class="header-page title">LES PODCASTS</h1>
        <hr size=5 width="93%" color=black>

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
			   	 <audio controls>
				     	 <source src=\"../files/H2P/H2P Ep ".$resultat['id'].".wav\" type=\"audio/wav\">
			   	 </audio>
		 	 </div>
		 	 <hr size=5 width=\"90%\" color=\"black\">";
        }?>
        </div>
    </div>

<?php require("footer.php"); ?>

</body>
</html>
