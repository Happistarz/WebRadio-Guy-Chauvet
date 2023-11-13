<?php

// AFFICHE LES INFOS DANS LA SECTION INFO
foreach ($info as $i) {
	extract($i);
	if ($MODIFIED > $CREATED) {
		$DATE = $MODIFIED;
	} else {
		$DATE = $CREATED;
	}
	echo
		'
	<div class="tracer">
	<p>' . $INFO . '</p>
	<p>' . $DATE . '</p>

	</div>
	';
}

?>
<h1 class="title">LE JOURNAL</h1>
<hr size="5" width="100%" color="black" />
<div class="Mart">
	<?php

	// AFFICHE LES ARTICLES DANS LA SECTION JOURNAL
	foreach ($article as $d) {
		extract($d);
		echo '
    <a class="border- arti" href="' . WEBROOT . 'Article/view/' . $ID . '">
        <img src="' . DATA . 'general/nosrc.png" alt="nosrc" />
        <article>
            <h2>' . $NOM . '</h2>
			<p>' . $DESCRIPTION . '</p>
		</article>
    </a>';
	}
	?>
</div>

<h1 class="title">LES EMISSIONS</h1>
<hr size="5" width="100%" color="black" />
<div class="Memissions">
	<?php
	// AFFICHE LES EMISSIONS DANS LA SECTION EMISSIONS
	foreach ($emission as $e) {
		extract($e);

		echo '<div class="border- Memis">
			<a href="Emission/view/' . $NOM . '" >
				<h3>' . $NOMLONG . '</h3>
				<img src="' . DATA . 'rubrique/' . $NOM . '.png" alt="image" />
  			</a>
			</div>';
	}
	?>
</div>

<h1 class="title">L'ÉQUIPE</h1>
<hr size="5" width="100%" color="black" />
<div class="Mequipe">
	<div class="border- Membres">
		<a href="Equipe/lycee">
			<h3>LE LYCEE</h3>
			<img src="<?= DATA . 'general/lycee_img.png' ?>" alt="image" />
		</a>
	</div>
	<div class="border- Membres">
		<a href="Equipe/membres">
			<h3>LA WEB RADIO</h3>
			<img src="<?= DATA . 'general/logo/typo.png' ?>" alt="image" />
		</a>
	</div>.......