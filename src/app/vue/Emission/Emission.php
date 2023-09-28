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

        <div class="podcast-container border-3">
            <?php
            foreach ($audios as $music) {
                ?>
                <div class="podcast">
                    <button onclick="Like(this)"></button>
                    <div class="info-podcast">
                        <h2><?= $music["NOM"] ?></h2>
                        <p><?= $music["DESCRIPTION"] ?></p>
                        <p><?= $music["DATE"] ?> / <?= $music["HEURE"] ?></p>
                    </div>
                    <audio controls>
                        <source src="<?= DATA . "audio/" . $music['AUDIO'] ?>" type="audio/wav">
                    </audio>
                </div>
               
                <?php
            }
            ?>
        </div>
    </div>
</div>
