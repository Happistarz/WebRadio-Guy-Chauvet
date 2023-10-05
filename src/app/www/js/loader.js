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
// window.addEventListener("DOMContentLoaded", (event) => {
//   setTimeout(function () {
//     // animation loader fill up
//     document.getElementById("loader").style.top = "-100vh";
//   }, 500);
// });

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
  var preview = document.getElementById("preview");
  var image = document.getElementById("image").files[0];
  var reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (image) {
    reader.readAsDataURL(image);
  } else {
    preview.src = "";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  // Sélectionnez tous les éléments avec la classe "border-"
  const elements = document.querySelectorAll('[class*="border-"]');

  // Tableau des classes CSS disponibles
  const borderClasses = ["border-red", "border-blue", "border-green"];

  // Parcourez chaque élément et ajoutez une classe CSS aléatoire
  elements.forEach(function (element) {
    // Vérifiez si l'élément a déjà des classes CSS
    const existingClasses = element.getAttribute("class").split(" ");
    const borderClassesToRemove = existingClasses.filter((className) =>
      className.startsWith("border-")
    );

    // Retirez toutes les classes CSS "border-" existantes de l'élément
    borderClassesToRemove.forEach((className) => {
      element.classList.remove(className);
    });

    // Générez un index aléatoire
    const randomIndex = Math.floor(Math.random() * borderClasses.length);

    // Obtenez la classe CSS aléatoire
    const randomBorderClass = borderClasses[randomIndex];

    // Ajoutez la nouvelle classe CSS aléatoire à l'élément
    element.classList.add(randomBorderClass);
  });
});
