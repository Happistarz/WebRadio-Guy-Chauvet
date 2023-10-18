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
                    <div class="audio-container" >
                        <div class="controls">
                            <button class="like"><img src="' . DATA . "general/like.png" . '" alt=""></button>
                            <button class="play" onclick="PlayEvent(this)"><img src="' . DATA . "general/play.png" . '"
                                    alt=""></button>
                        </div>
                        <div class="audiobar">
                            <div class="topbar">
                                <h3 class="titre">' . $music['NOM'] . '</h3>
                                <p class="info">' . $music['AUTEURS'] . '</p>
                                <p class="info">' . $music['DESCRIPTION'] . '</p>
                                <i style="font-size: 12px">
                                    ' . $music['DATE'] . ' / ' . $music['HEURE'] . '
                                </i>
                            </div>
                            <div class="audioplayer">
                                <audio src="' . DATA . "audio/" . $music['AUDIO'] . '" id="audio-src" preload="metadata" loop></audio>
                                <div class="tracker">
                                    <span id="current-time">00:00</span>
                                    <div class="progress">
                                        <input type="range" name="progress-track" id="progress-track" max="100" value="0">
                                    </div>
                                    <span id="duration">00:00</span>
                                </div>
                                <div class="volume">
                                    <button type="button" id="button-mute" onclick="MuteEvent(this)"><img
                                            src="' . DATA . "general/unmute.png" . '" alt=""></button>
                                    <input type="range" name="volume-track" id="volume-track" max="100" value="100">
                                    <!-- <output id="volume-output">100%</output> -->
                                </div>
                            </div>
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
    $('.podcast-container audio').on('play', function() {
        $('.podcast-container audio').not(this).each(function(index, audio) {
            audio.pause();
        });

        setLecteurAudio($(this).attr('src'), 0, false);
    });
</script>