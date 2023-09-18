<?php

    $dbh = new Pdo("mysql:host=127.0.0.1;dbname=web_radio", "chefWR", "mdpwebradio");
	$sql = "SELECT * FROM Qui_qu_cest";
	$res = $dbh->query($sql);

?>
        <?php require("header.php");
        entete("Qui_qu'c'est");
?>
    <!-- Setup Container 1-theme-3-chansons -->
        <div class="emission">
                <img src="../images/Images_rubriques/Qui_qu_c_est.png" alt="Emission">
                <article>
                        <h5>Qui qu'c'est</h5>
                        <p>...</p>
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
                                         <source src=\"../files/Qui_qu_cest/Qui_qu_cest Ep ".$result['id'].".wav\" type=\"audio/wav\">
                                 </audio>
                         </div>
                         <hr size=5 width=\"90%\" color=\"black\">";
        }?>
        </div>
</div>

<?php require("footer.php"); ?>

</body>
</html>

