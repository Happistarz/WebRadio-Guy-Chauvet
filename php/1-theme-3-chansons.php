<?php

        $dbh = new Pdo("mysql:host=127.0.0.1;dbname=web_radio", "chefWR", "mdpwebradio");
	$sql = "SELECT * FROM 1_Theme_3_Chansons";
	$res = $dbh->query($sql);

?>
        <?php require("header.php");
        entete("1 théme 3 chansons");
?>
    <!-- Setup Container 1-theme-3-chansons -->
        <div class="emission">
                <img src="../images/Images_rubriques/1-theme-3-chansons.png" alt="Emission">
                <article>
                        <h5>1 thème 3 chansons</h5>
                        <p>Dans l’émission 1 thème, 3 chansons, découvrez trois œuvres musicales, réunies autour d’un thème. Pour chaque morceau, nous vous proposons une présentation pour comprendre les tenants et les aboutissants de ces derniers.</p>
                </article>
        </div>
    <div class="main">

<!-- header page 1-theme-3-chansons -->
        <h1 id="podcasts" class="header-page title">LES PODCASTS</h1>
        <hr size=5 width="93%" color=black>

        <div class="podcast-container border-3">
	<?php
                foreach ($res as $result) {
                echo
                        "<div class=\"podcast\">
                                <button onclick=\"Like(this)\"></button>
                                <div class=\"info-podcast\">
                                        <h2>{$result["titre"]}</h2>
                                        <p>{$result["description"]}</p>
                                        <p>{$result["created"]}</p>
                                </div>
                                 <audio controls>
                                         <source src=\"../files/1Theme3Chansons/1T3C Ep ".$result['id'].".wav\" type=\"audio/wav\">
                                 </audio>
                         </div>
                         <hr size=5 width=\"90%\" color=\"black\">";
        }?>
        </div>
</div>

<?php require("footer.php"); ?>

</body>
</html>
