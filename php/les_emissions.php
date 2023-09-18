<?php

$sql = "SELECT * FROM Emission";
$sql2 = "SELECT * FROM Custom";
$db = new PDO("mysql:host=127.0.0.1;dbname=web_radio", "chefWR", "mdpwebradio");
$res = $db->query($sql);
$resCustom = $db->query($sql2);
$db = null;


require("header.php");
entete("Les émissions");
?>


<div class="main">
	<h1 class="title" style="margin-top: 6%">Les Émissions</h1>
	<hr size=5 width="93%" color=black>

	<div class="ems">
		<?php
		$display = "left";
		$resuCustom = $resCustom->fetch(PDO::FETCH_ASSOC);
		while ($resu = $res->fetch(PDO::FETCH_ASSOC)) {
			extract($resu);
			$lines = explode("\n", wordwrap($resu["description"], 40));
			$resum = $resu["description"];
			if (count($lines) > 7) {
				$lines = array_slice($lines, 0, 7);
				$lines[6] .= "...";
				$resum = implode("\n", $lines);
			}
			echo '
        		<!--First left container, blue color-->
			<div class=\"container-{$display}\">
            			<a href=\"emission.php?id=" . $resu["id"] . "\" class=\"ems-box border-2\">
                			<h3>Titre</h3>
			                <img src=\"../images/Images_rubriques/1-theme-3-chansons.png\" alt=\"image\">
		                </a>
           			 <article>
           				 <h2>" . $resu["titre"] . "</h2>
               				 <p>" . $resum . "</p>
           			 </article>
        		</div>
				';

			if ($display == "left") {
				$display = "right";
			} else {
				$display = "left";
			}
		}

		?>
	</div>
</div>
<?php require("footer.php"); ?>
</body>

</html>