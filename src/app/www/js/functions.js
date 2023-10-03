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
  constructor(title, body) {
    this.title = title;
    this.body = body;
    this.modal = null;
  }

  /**
   * create the modal
   * 
   * @memberof Modal
   * @returns {void}
   */
  render() {
    const self = this;
    this.modal = document.createElement("div");
    this.modal.classList.add("modal");
    this.modal.id = "modal";
    this.modal.innerHTML = `
        <div class="modal-content">
            <div class="modal-header">
                <h2>${this.title}</h2>
                <span class="close" onclick="this.closeModal()">&times;</span>
            </div>
            ${this.body}
        </div>
    `;
    // close modal when click outside of the modal
    window.onclick = function (event) {
      if (event.target == self.modal) {
        self.closeModal();
      }
    };

    // close modal when click on the close button
    $(".close").on("click", function () {
      self.closeModal();
    });

    document.body.appendChild(this.modal);
    $("#modal").css("display", "block");
  }
  /**
   * close the modal
   *
   * @memberof Modal
   * @returns {void}
   */
  closeModal() {
    $("#modal").css("display", "none");
    $("#modal").remove();
    this.modal = null;
  }
}
