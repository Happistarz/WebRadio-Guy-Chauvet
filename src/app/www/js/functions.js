function request(url, action, table, data, result) {
  $.ajax({
    url: url,
    type: "POST",
    dataType: "json",
    data: {
      data: data,
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

// create a class Modal to create a modal with create, update and delete functions
// need to set data in the body of the modal
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
  addSubmitListener(url, action, table) {
    const submitButton = document.querySelector("#ModalSubmit");
    const self = this;
    if (submitButton) {
      submitButton.addEventListener("click", function (e) {
        e.preventDefault();
        const formData = $(".modal-body").find('form').serializeArray();

        console.log(formData);
        // request(
        //   url,
        //   action,
        //   table,
        //   formData,
        //   function (success, response) {
        //     if (success) {
        //       // Si la requête a réussi, fermez le modal et affichez une alerte
        //       // self.closeModal();
        //       alert("Success", response);
        //     } else {
        //       // Sinon, affichez une alerte avec le message d'erreur
        //       alert(response.message);
        //     }
        //   }
        // );
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