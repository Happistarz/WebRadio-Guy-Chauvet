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
                    
                    <div class="audio-container">
                        <div class="controls">
                            <button class="like"><img src="' . DATA . "general/like.png" . '" alt=""></button>
                            <button class="play"><img src="' . DATA . "general/play.png" . '" alt=""></button>
                        </div>
                        <div class="audiobar">
                            <div class="topbar">
                                <h3 class="audiotitre">' . $music['NOM'] . '</h3>
                                <p class="info-topbar">' . $music['AUTEURS'] . '</p>
                                <p class="info-topbar">' . $music['DESCRIPTION'] . '</p>
                                <i style="font-size: 12px">
                                    ' . $music['DATE'] . ' / ' . $music['HEURE'] . '
                                </i>
                            </div>
                            <div class="audioplayer">
                                <audio class="audio-src" src="' . DATA . 'audio/' . $music['AUDIO'] . '" preload="metadata" loop></audio>
                                <div class="tracker">
                                    <span class="current-time">00:00</span>
                                    <div class="progress">
                                        <input type="range" class="progress-track" name="progress-track" max="100" value="0">
                                    </div>
                                    <span class="duration">00:00</span>
                                </div>
                                <div class="volume">
                                    <button type="button" id="button-mute"><img src="' . DATA . "general/unmute.png" . '"
                                            alt=""></button>
                                    <input type="range" class="volume-track" name="volume-track" max="100" value="100">
                                </div>
                            </div>
                        </div>
                        <div class="extra">
                            <button id="open-modal-button" class="biblio">
                                <img src="' . DATA . "general/biblio.png" . '" alt="">
                                <span>Bibliothèque</span>
                            </button>
                        </div>
                    </div>
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