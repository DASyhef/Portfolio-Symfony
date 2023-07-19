/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

let clicklink = document.querySelectorAll(".clicklink");
let clickbutton = document.querySelector(".round");
let selector = document.querySelector(".rect");

function navbar(event) {
  event.preventDefault(); // Empêche le comportement par défaut du lien


  if (selector.classList.contains("off")) {
    selector.classList.remove("off");
    selector.style.display = "flex";
    selector.classList.add("on");
  } else {
    selector.classList.remove("on");
    selector.classList.add("off");
    setTimeout(function() {
      selector.style.display = "none";
    }, 1000);
  }
}


clickbutton.addEventListener("click", navbar);

clicklink.forEach(function(link) {
  link.addEventListener("click", navbar);
});


