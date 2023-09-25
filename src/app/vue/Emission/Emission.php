    <!-- Setup Container Emission  -->
	<?php extract($emission);?>
	<div class="container">
	<div class="emission">
        	<img src="<?php echo DATA . $SRC;?>" alt="Emission">
        	<article>
            		<h5><?php echo EMISSIONS[$NOM]?></h5>
            		<p><?php echo $DESCRIPTION?></p>
        	</article>
    	</div>
    <div class="main">
        <!-- header page podcasts -->
        <h1 id="podcasts" class="header-page title">LES PODCASTS</h1>
        <hr size=5 width="93%" color=white>

        <div class="podcast-container border-3">
	<?php
    // echo "<br><br><br>";
    // var_dump($emission);
	var_dump($audio);
		/*foreach ($audio as $music) {
		echo "
  			<div class=\"podcast\">
    				<button onclick=\"Like(this)\"></button>
    				<div class=\"info-podcast\">
      					<h2>{$music["titre"]}</h2>
      					<p>{$music["description"]}</p>
				      	<p>{$music["created"]} / {$music["heure"]}</p>
			    	</div>
			   	 <audio controls>
				     	 <source src=\"../files/H2P/H2P Ep ".$music['id'].".wav\" type=\"audio/wav\">
			   	 </audio>
		 	 </div>
		 	 <hr size=5 width=\"90%\" color=\"black\">";
             
        }*/?> 
        </div>
    </div>

    <!-- desc =  <p>Histoire de poche, c'est une émission pour les amateurs d'histoire et de savoir. Nous vous raconterons des anecdotes historiques et mythologiques sur des sujets aussi variés qu’intéressant.</p> -->
