"use strict";

window.addEventListener("DOMContentLoaded", function () {
  var año_mes_dia = document.getElementById("hoy_es");
  var reloj = document.getElementById("hora");
  var hoy = new Date();
  var año = hoy.getFullYear();
  var dia = hoy.getDate();
  var mes = hoy.getMonth();
  año_mes_dia.textContent = "Hoy es " + dia + "-" + mes + "-" + año;

  function move() {
    var hoy = new Date();
    hora = hoy.getHours();
    minuto = hoy.getMinutes();
    segundo = hoy.getSeconds();
    time = hora + " : " + minuto + " : " + segundo;
    reloj.textContent = time;
  }

  setInterval(function () {
    move();
  }, 1000);
});