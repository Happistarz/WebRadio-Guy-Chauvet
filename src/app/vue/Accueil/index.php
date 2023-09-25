<!-- journal -->
<h1 class="title">LE JOURNAL</h1>
<hr size="5" width="93%" color="black" />
<?php
foreach ($data2 as $d) {
	echo'
	<a class=\"j-box border-1\" href=\"view/'.$d['NOM'].'.php">
	<img src=\"images/test.png\" alt=\"Image\" />
	<!-- article -->
	<article>
	  	<h2>".$resul["titre"]."</h2>
		<p>".$resul["description"]."</p>
	</article>
	</a> 
	';
}
?>

<h1 h1 class="title">LES EMISSIONS</h1>
<hr size="5" width="93%" color="black" />
<div class="emissions">
<?php
	foreach ($data as $d) {
		echo'
			<a href="Emission/view/'.$d['NOM'].'" class="border-2">
				<h3>'.$d['NOM'].'</h3>
				<img src="'.DATA.'rubrique/'.$d['NOM'].'.png" alt="image" />
  			</a>';
	}
?>
</div>