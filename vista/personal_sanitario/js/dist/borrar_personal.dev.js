"use strict";

window.addEventListener("DOMContentLoaded", function () {
  console.log("hola");
  var confimar = document.getElementById("confirmar");
  var borrar = document.getElementById("eliminar");
  confimar.addEventListener("click", function () {
    //primero escoger 
    if (confirmar.checked == true) {
      eliminar.className = "col-12 btn btn-success ok";
      eliminar.removeAttribute("disabled", "");
    }
  });
});