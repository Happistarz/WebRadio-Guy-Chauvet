<?php
        $sql = "SELECT * FROM Le_Journal_Audio";

        $db = new Pdo("mysql:host=127.0.0.1;dbname=web_radio", "chefWR", "mdpwebradio");
        $resu = $db->query($sql);
         ?>
        <?php require("header.php");
        entete("Journal audio");
?>

    <!-- Setup Container Emission  -->
        <div class="emission">
                <img src="../images/Images_rubriques/journal-radio-25.png" alt="Emission">
                <article>
                        <h5>Journal Audio</h5>
                        <p>...</p>
                </article>
        </div>
    <div class="main">
        <!-- header page podcasts -->
        <h1 id="podcasts" class="header-page title">LES PODCASTS</h1>
        <hr size=5 width="93%" color=black>

        <div class="podcast-container border-3">
        <?php
                foreach ($resu as $resultat) {
		$date = new DateTime($resultat["created"]);
		$fdate = $date->format('d m Y');
                echo "
                        <div class=\"podcast\">
                                <button onclick=\"Like(this)\"></button>
                                <div class=\"info-podcast\">
                                        <h2>{$resultat["titre"]}</h2>
                                        <p>{$resultat["description"]}</p>
                                        <p>".$resultat["created"]." / {$resultat["heure"]}</p>
                                </div>
                                 <audio controls>
                                         <source src=\"../files/journal/Journal ".$fdate.".wav\">
                                 </audio>
                         </div>
                         <hr size=5 width=\"90%\" color=\"black\">";
        }?>
        </div>
</div>

<?php require("footer.php"); ?>
</body>

</html>