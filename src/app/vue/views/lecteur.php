<!-- CONTENU DU LECTEUR AUDIO -->

audio {
  width: 100%;
}

/* Styles pour le lecteur audio spécifiques à WebKit (Chrome, Safari) */
audio::-webkit-media-controls-current-time-display,
audio::-webkit-media-controls-time-remaining-display {
  color: black;
}

audio::-webkit-media-controls-panel {
  border-radius: 10px;
  /* Coins arrondis des contrôles */
}

audio::-moz-controls-currentplaybackrate {
  color: black;
}

/* Styles pour le lecteur audio spécifiques à Firefox */
audio::-moz-controls-time {
  color: white;
}

audio::-moz-range-thumb {
  background-color: black;
}

audio::-moz-range-track {
  background-color: black;
}

<audio controls>
  <source src="https://ia800905.us.archive.org/19/items/FREE_background_music_dhalius/backsound.mp3"  type="audio/mp3">
</audio> 
<div style="width: 50px; height: 50px;"></div>
<div class="audio-player">
  <div class="timeline">
    <div class="progress"></div>
  </div>
  <div class="controls">
    <div class="play-container">
      <div class="toggle-play play">
    </div>
    </div>
    <div class="time">
      <div class="current">0:00</div>
      <div class="divider">/</div>
      <div class="length"></div>
    </div>
    <div class="name">Music Song</div>
<!--     credit for icon to https://saeedalipoor.github.io/icono/ -->
    <div class="volume-container">
      <div class="volume-button">
        <div class="volume icono-volumeMedium"></div>
      </div>
      
      <div class="volume-slider">
        <div class="volume-percentage"></div>
      </div>
    </div>
  </div>
</div>