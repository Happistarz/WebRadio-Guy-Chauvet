<?php
// extract les données de l'émission
extract($emission); ?>
<div class="container">
    <!-- PANNEAU DE L'EMISSION -->
    <div class="emission">
        <img src="<?= DATA . $SRC; ?>" alt="imgEmission">
        <article>
            <h5>
                <?= $NOMLONG ?>
            </h5>
            <p>
                <?= $DESCRIPTION ?>
            </p>
        </article>
    </div>
    <!-- AFFICHAGE DES PODCASTS -->
    <div class="main-podcasts">
        <!-- header page podcasts -->
        <h1 id="podcasts" class="header-page title">LES PODCASTS</h1>
        <hr size="5" width="100%" color="black" />
        <div class="podcast-container border-">
            <?php
            // tableau des podcasts
            $str = [];
            // affichage des podcasts
            foreach ($audios as $music) {
                $str[] = '<div class="podcast">
                    <div class="info-podcast">
                        <div>
                            <h2>' . $music["NOM"] . '</h2>
                            <p>' . $music["DATE"] . '/' . $music["HEURE"] . '</p>
                        </div>
                        <div>
                            <p>' . $music["AUTEURS"] . ' </p>
                            <p>' . $music["DESCRIPTION"] . '</p>
                        </div>
                    </div>
                    <audio controls>
                        <source src="' . DATA . "audio/" . $music["AUDIO"] . '" type="audio/wav">
                        
                    </audio>
                    
                </div>';
            }
            // affichage des podcasts dans la page avec un séparateur
            echo join('<hr size="5" width="95%" color="black" />', $str);
            ?>

        </div>


    </div>
</div>
</div>
<script>
    $('.podcast-container audio').on('play', function () {
        $('.podcast-container audio').not(this).each(function (index, audio) {
            audio.pause();
        });

        setLecteurAudio($(this).attr('src'), 0, false);
    });
</script>