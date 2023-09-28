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
	<div class="def-p">
	<p>'.$INFO.'</p>
	<p>'.$DATE.'</p>

	</div>
	';
}

?>
<h1 class="title">LE JOURNAL</h1>
<hr size="5" width="100%" color="black" />
<?php

foreach ($article as $d) {
	extract($d);
	echo'
	<a class="j-box border-'.mt_rand(1,3).'" href="'.WEBROOT.'Article/view/'.$ID .'">
	<img src="'.DATA.'general/nosrc.png" alt="Image" />
	<!-- article -->
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
<div class="emissions">
<?php

	foreach ($emission as $e) {
		extract($e);

		echo'
			<a href="Emission/view/'.$NOM.'" class="border-'.mt_rand(1,3).'">
				<h3>'.EMISSIONS[$NOM].'</h3>
				<img src="'.DATA.'rubrique/'.$NOM.'.png" alt="image" />
  			</a>';
	}
?>
</div>
</main>