<!-- Setup Container Emission -->
<?php extract($emission); ?>
<div class="container">
    <div class="emission">
        <img src="<?= DATA . $SRC; ?>" alt="imgEmission">
        <article>
            <h5 ><?= EMISSIONS[$NOM] ?></h5>
            <p ><?= $DESCRIPTION ?></p>
        </article>
    </div>
    <div class="main-podcasts"> 
        <!-- header page podcasts -->
        <h1 id="podcasts" class="header-page title">LES PODCASTS</h1>
        <hr size="5" width="100%" color="black" />
        <div class="podcast-container border-">
            <?php
            $str = [];
            foreach ($audios as $music) {
                $str[] = '<div class="podcast">
                    <div class="info-podcast">
                        <div>
                            <h2>'. $music["NOM"] .'</h2>
                            <p>'. $music["DATE"] .'/'. $music["HEURE"].'</p>
                        </div>
                        <div>
                            <p>'.$music["AUTEURS"].' </p>
                            <p>'. $music["DESCRIPTION"].'</p>
                        </div>
                    </div>
                    <audio controls>
                        <source src="'.DATA . "audio/" . $music["AUDIO"] .'" type="audio/wav">
                        
                    </audio>
                    
                </div>';
            }
            echo join('<hr size="5" width="95%" color="black" />', $str);
            ?>

        </div>

            
        </div>
    </div>
</div>
