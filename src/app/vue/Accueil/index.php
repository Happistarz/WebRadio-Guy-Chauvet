<main>
<?php
foreach ($info as $i) {
	extract($i);
	if ($MODIFIED > $CREATED)  {
		$DATE = $MODIFIED;
	} else {
		$DATE = $CREATED;
	}
	echo 
	'
	<div class="tracer">
	<p>'.$INFO.'</p>
	<p>'.$DATE.'</p>

	</div>
	';
}

?>
<h1 class="title">LE JOURNAL</h1>
<hr size="5" width="100%" color="black"/>
<?php

foreach ($article as $d) {
	extract($d);
	echo'
	<a class="border- Mart" href="'.WEBROOT.'Article/view/'.$ID .'">
	<img src="'.DATA.'general/nosrc.png" alt="nosrc" />
	<article>
	  	<h2>'.$NOM.'</h2>
		<p>'.$DESCRIPTION.'</p>
	</article>
	</a> 
	';
}
?>

<h1 class="title">LES EMISSIONS</h1>
<hr size="5" width="100%" color="black" />
<div class="Memissions">
<?php

	foreach ($emission as $e) {
		extract($e);

		echo'<div class="border- Memis">
			<a href="Emission/view/'.$NOM.'" >
				<h3>'.EMISSIONS[$NOM].'</h3>
				<img src="'.DATA.'rubrique/'.$NOM.'.png" alt="image" />
  			</a>
			</div>';
	}
?>
</div>
</main>

