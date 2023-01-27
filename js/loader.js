tmp = true;
// responsive effect
function MenuOpen() {
  console.log(window.innerWidth);

  // condition responsive with window's width
  if (window.innerWidth < 400) {
    if (tmp == true) {
      const btn = document.querySelectorAll("#btn");
      // display all header buttons
      btn.forEach((btn) => {
        btn.style.display = "block";
      });

      tmp = false;
    } else {
      tmp = true;
      const btn = document.querySelectorAll("#btn");
      // display off all header buttons
      btn.forEach((btn) => {
        btn.style.display = "none";
      });
    }
  } else {
    const btn = document.querySelectorAll("#btn");
    btn.forEach((btn) => {
      btn.style.display = "block";
    });
  }
}

// loader event
window.addEventListener("DOMContentLoaded", (event) => {
  setTimeout(function () {
    // animation loader fill up
    document.getElementById("loader").style.top = "-100vh";
  }, 500);
});

var i = 0;
function Like(x) {
    if (i == 0) {
        x.style.backgroundImage = "url('../images/bouton-coeur-plein.png')";
        i = 1;
    } else {
        x.style.backgroundImage = "url(../images/bouton-coeur-vide.png)";
        i = 0;
    }
}
function addredac() {
  var form1 = (document.getElementById("form1").style.display = "grid");
  var form1 = (document.getElementById("form2").style.display = "none");
  // form1.style.display="block";
}
function addemis() {
  var form1 = (document.getElementById("form2").style.display = "grid");
  var form1 = (document.getElementById("form1").style.display = "none");
  // form1.style.display="block";
}

function textAreaAdjust(element) {
  element.style.height = "1px";
  element.style.height = 25 + element.scrollHeight + "px";
}


function previewImage() {
  var preview = document.getElementById('preview');
  var image = document.getElementById('image').files[0];
  var reader = new FileReader();

  reader.onloadend = function() {
      preview.src = reader.result;
  }

  if (image) {
      reader.readAsDataURL(image);
  } else {
      preview.src = "";
  }
}

// récupération de l'élément de type "file"
const audioFile = document.getElementById("audio-file");

// écouteur d'événement pour détecter lorsque l'utilisateur sélectionne un fichier audio
audioFile.addEventListener("change", function() {
  // vérification que le fichier sélectionné est bien un fichier audio
  if (this.files && this.files[0]) {
    // vérification que le fichier est en format .wav
    if (this.files[0].type === "audio/wav") {
      // création d'un objet URL qui pointe vers le fichier sélectionné
      const audioURL = URL.createObjectURL(this.files[0]);
      // modification de la source de l'élément audio pour qu'il pointe vers le fichier sélectionné
      audioPreview.src = audioURL;
      // lecture de l'élément audio pour prévisualiser le fichier audio
      audioPreview.play();
    } else {
      // message d'erreur si le fichier sélectionné n'est pas en format .wav
      console.error("Veuillez sélectionner un fichier audio en format .wav");
    }
  }
});

document.getElementById('audio-file').addEventListener('change', function(e) {
  var file = e.target.files[0];
  var audio = document.getElementById('audio-preview');
  var reader = new FileReader();
  reader.onload = function(){
      var dataUrl = reader.result;
      audio.src = dataUrl;
  };
  reader.readAsDataURL(file);
});
