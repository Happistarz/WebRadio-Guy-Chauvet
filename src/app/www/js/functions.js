function request(url, action, table, data, result) {
  $.ajax({
    url: url,
    type: "POST",
    dataType: "json",
    data: {
      data: JSON.stringify(data),
      submit: true,
      action: action,
      table: table,
    },
    success: function (response) {
      result(true, response);
    },
    error: function (response) {
      result(false, response);
    },
  });
}

class Modal {
  constructor(title, body, callback) {
    this.title = title;
    this.body = body;
    this.modal = null;
    this.Callback = callback;
  }

  /**
   * Ajoute un écouteur d'événements au bouton ModalSubmit.
   */
  addSubmitListener(url, action, table, callback) {
    const submitButton = document.querySelector("#ModalSubmit");
    const self = this;
    if (submitButton) {
      submitButton.addEventListener("click", function (e) {
        e.preventDefault();
        const formData = $(".modal-body").find('form').serializeArray();

        console.log(formData);
        request(
          url,
          action,
          table,
          formData,
          function (success, response) {
            if (success) {
              self.closeModal();
              alert(response.data);
              callback(true, response);
            } else {
              callback(false, response);
            }
          }
        );
        self.closeModal();
      });
    }
  }
  /**
   * Crée et affiche le modal.
   */
  render(Callback = function () { }) {
    // Crée le modal s'il n'existe pas
    if (!this.modal) {
      this.modal = document.createElement("div");
      this.modal.classList.add("modal");
      this.modal.innerHTML = `
        <div class="modal-content">
          <div class="modal-header">
            <h2>${this.title}</h2>
            <span class="close">&times;</span>
          </div>
          <div class="modal-body">
            ${this.body}
          </div>
        </div>
      `;
      document.body.appendChild(this.modal);
    }

    // Ajoute un écouteur pour fermer le modal lors du clic en dehors de celui-ci
    const self = this;
    this.modal.addEventListener("click", function (event) {
      if (event.target === self.modal) {
        self.closeModal();
      }
    });

    // Ajoute un écouteur pour fermer le modal lors du clic sur le bouton de fermeture
    const closeButton = this.modal.querySelector(".close");
    if (closeButton) {
      closeButton.addEventListener("click", function () {
        self.closeModal();
      });
    }

    // Affiche le modal
    this.modal.style.display = "block";
    Callback();
  }

  setData(data) {
    const form = this.modal.querySelector("form");
    for (let key in data) {
      const value = data[key];
      const field = form.querySelector(`[name="${key}"]`);

      if (field) {
        if (field.type === "file") {
          // Gérer le champ de type "file" en attachant le fichier s'il est fourni
          if (value instanceof File) {
            field.files[0] = value;
          }
        } else if (field.tagName === "SELECT") {
          // Gérer le champ <select> en sélectionnant l'option appropriée
          const option = field.querySelector(`option[value="${value}"]`);
          if (option) {
            option.selected = true;
          }
        } else {
          // Remplir les autres types de champs
          field.value = value;
        }
      }
    }
  }

  /**
   * Ferme le modal.
   */
  closeModal() {
    if (this.modal) {
      this.modal.style.display = "none";
    }
  }
}




// console.dir(audio);

// audio.addEventListener(
//   "loadeddata",
//   () => {
//     audioPlayer.querySelector(".time .length").textContent = getTimeCodeFromNum(
//       audio.duration
//     );
//     audio.volume = .75;
//   },
//   false
// );

// //click on timeline to skip around
// const timeline = audioPlayer.querySelector(".timeline");
// timeline.addEventListener("click", e => {
//   const timelineWidth = window.getComputedStyle(timeline).width;
//   const timeToSeek = e.offsetX / parseInt(timelineWidth) * audio.duration;
//   audio.currentTime = timeToSeek;
// }, false);

// //click volume slider to change volume
// const volumeSlider = audioPlayer.querySelector(".controls .volume-slider");
// volumeSlider.addEventListener('click', e => {
//   const sliderWidth = window.getComputedStyle(volumeSlider).width;
//   const newVolume = e.offsetX / parseInt(sliderWidth);
//   audio.volume = newVolume;
//   audioPlayer.querySelector(".controls .volume-percentage").style.width = newVolume * 100 + '%';
// }, false)

// //check audio percentage and update time accordingly
// setInterval(() => {
//   const progressBar = audioPlayer.querySelector(".progress");
//   progressBar.style.width = audio.currentTime / audio.duration * 100 + "%";
//   audioPlayer.querySelector(".time .current").textContent = getTimeCodeFromNum(
//     audio.currentTime
//   );
// }, 500);

// //toggle between playing and pausing on button click
// const playBtn = audioPlayer.querySelector(".controls .toggle-play");
// playBtn.addEventListener(
//   "click",
//   () => {
//     if (audio.paused) {
//       playBtn.classList.remove("play");
//       playBtn.classList.add("pause");
//       audio.play();
//     } else {
//       playBtn.classList.remove("pause");
//       playBtn.classList.add("play");
//       audio.pause();
//     }
//   },
//   false
// );

// audioPlayer.querySelector(".volume-button").addEventListener("click", () => {
//   const volumeEl = audioPlayer.querySelector(".volume-container .volume");
//   audio.muted = !audio.muted;
//   if (audio.muted) {
//     volumeEl.classList.remove("icono-volumeMedium");
//     volumeEl.classList.add("icono-volumeMute");
//   } else {
//     volumeEl.classList.add("icono-volumeMedium");
//     volumeEl.classList.remove("icono-volumeMute");
//   }
// });

// //turn 128 seconds into 2:08
// function getTimeCodeFromNum(num) {
//   let seconds = parseInt(num);
//   let minutes = parseInt(seconds / 60);
//   seconds -= minutes * 60;
//   const hours = parseInt(minutes / 60);
//   minutes -= hours * 60;

//   if (hours === 0) return `${minutes}:${String(seconds % 60).padStart(2, 0)}`;
//   return `${String(hours).padStart(2, 0)}:${minutes}:${String(
//     seconds % 60
//   ).padStart(2, 0)}`;
// }