/**
 * Fonction qui permet de faire une requête AJAX avec jQuery.
 *
 * @param {string} url L'URL de la page qui va traiter la requête.
 * @param {string} action L'action à effectuer.
 * @param {string} table La table à modifier.
 * @param {object} data Les données à envoyer.
 * @param {function} result La fonction à exécuter après la requête.
 *
 * @return {void}
 */
function request(url, action, table, data, result) {
  // créer une requête AJAX
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
      // exécuter le callback avec la réponse du serveur
      result(true, response);
    },
    error: function (response) {
      // exécuter le callback avec la réponse du serveur
      result(false, response);
    },
  });
}

/**
 * Fonction qui set le lecteur audio
 */
function setLecteurAudio() {

}




/**
 * Fonction qui permet de faire une requête AJAX avec jQuery.
 *
 */
class Modal {
  /**
   * Crée un objet Modal.
   *
   * @param {string} title Le titre du modal.
   * @param {string} body Le corps du modal.
   * @param {function} callback La fonction à exécuter après la fermeture du modal.
   */
  constructor(title, body, callback) {
    // Initialiser les propriétés

    this.title = title;
    this.body = body;
    this.modal = null;
    this.Callback = callback;
  }

  /**
   * Ajoute un écouteur sur le bouton de soumission du formulaire.
   *
   * @param {string} url L'URL de la page qui va traiter la requête.
   * @param {string} action L'action à effectuer.
   * @param {string} table La table à modifier.
   * @param {function} callback La fonction à exécuter après la requête.
   */
  addSubmitListener(url, action, table, callback) {
    // Ajouter un écouteur sur le bouton de soumission du formulaire
    const submitButton = document.querySelector("#ModalSubmit");
    const self = this;
    if (submitButton) {
      submitButton.addEventListener("click", function (e) {
        // Empêcher le comportement par défaut du bouton
        e.preventDefault();
        // Récupérer les données du formulaire
        const formData = $(".modal-body").find("form").serializeArray();

        // Envoyer la requête AJAX
        request(url, action, table, formData, function (success, response) {
          if (success) {
            self.closeModal();
            // Exécuter le callback avec la réponse du serveur
            callback(true, response);
          } else {
            // Exécuter le callback avec la réponse du serveur
            callback(false, response);
          }
        });
        self.closeModal();
      });
    }
  }
  /**
   * Ajoute un écouteur sur le bouton de soumission du formulaire.
   *
   * @param {function} callback La fonction à exécuter après la requête.
   * @return {void}
   */
  render(AfterLoad = function () {}) {
    // Crée le modal s'il n'existe pas
    if (!this.modal) {
      // Crée le modal
      this.modal = document.createElement("div");
      this.modal.classList.add("modal");

      // Ajoute le contenu du modal
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
      // Ajoute le modal à la page
      document.body.appendChild(this.modal);
    }

    // Ajoute un écouteur pour fermer le modal lors du clic en dehors de celui-ci
    const self = this;
    this.modal.addEventListener("click", function (event) {
      // Ferme le modal si l'utilisateur clique en dehors du modal
      if (event.target === self.modal) {
        self.closeModal();
      }
    });

    // Ajoute un écouteur pour fermer le modal lors du clic sur le bouton de fermeture
    const closeButton = this.modal.querySelector(".close");
    if (closeButton) {
      // Ferme le modal si l'utilisateur clique sur le bouton de fermeture
      closeButton.addEventListener("click", function () {
        self.closeModal();
      });
    }

    // Affiche le modal
    this.modal.style.display = "block";
    AfterLoad();
  }

  /**
   * Remplit le formulaire du modal avec les données fournies.
   *
   * @param {object} data Les données à envoyer.
   * @return {void}
   */
  setData(data) {
    // Remplir le formulaire du modal avec les données fournies
    const form = this.modal.querySelector("form");
    for (let key in data) {
      // Récupérer la valeur de la propriété
      const value = data[key];
      const field = form.querySelector(`[name="${key}"]`);

      // Vérifier si le champ existe
      if (field) {
        // Gérer les champs spéciaux
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
   *
   * @return {void}
   */
  closeModal() {
    if (this.modal) {
      this.modal.style.display = "none";
    }
  }
}

/**
 * Class qui permet de faire des Dropdowns et Dropups.
 */
class DropContainer {
  /**
   * Crée un objet DropContainer.
   * @param {string} title Le titre du dropdown.
   * @param {string} body Le corps du dropdown.
   * @param {string} position La position du dropdown.
   * @param {string} parent Le parent du dropdown.
   * @return {void}
   */
  constructor(title, body, position, parent) {
    // Initialiser les propriétés
    this.title = title;
    this.body = body;
    this.position = position;
    this.container = null;
    this.parent = parent;
  }

  /**
   * Affiche le DropContainer.
   *
   * @return {void}
   */
  render() {
    // Crée le container s'il n'existe pas
    if (!this.container) {
      // Crée le container
      this.container = document.createElement("div");
      this.container.classList.add("drop-container");
      this.container.classList.add(this.position);

      // Ajoute le contenu du container
      this.container.innerHTML = `
        <div class="drop-content">
          <div class="drop-header">
            <h2>${this.title}</h2>
          </div>
          <div class="drop-body">
            ${this.body}
          </div>
        </div>
      `;
      // Ajoute le container à la page
      $(this.parent).append(this.container);
    }
    this.closeContainer();
    
    // Ajoute un écouteur pour fermer le container quand on perd le focus sur celui-ci
    const self = this;
    $(this.parent).on('mouseenter', function () {
      self.container.style.display = "block";
    });
    $(this.parent).on('mouseleave', function () {
      self.closeContainer();
    });

    // Affiche le container
    // this.container.style.display = "block";
  }

  /**
   * Ferme le container.
   *
   * @return {void}
   */
  closeContainer() {
    if (this.container) {
      this.container.style.display = "none";
    }
  }
}