"use strict";

window.addEventListener("DOMContentLoaded", function () {
  //const regex = /(delete)|(--)|(;)|(drop)|(insert)/; //evitar la insercin
  var dni_regex = /^([0-9]{8,8}[A-Za-z])|([XYZ][0-9]{7}[A-Za-z])$/; //dni aunque no cumple todas las expectativas

  var pass_regex = /^[a-zA-Z0-9]{8}$/; // 8 maximo, solo letras y numeros

  var dni = document.getElementById("dni");
  var pass = document.getElementById("pass");
  var envio = document.getElementById("enviar");
  dni.addEventListener("blur", function (e) {
    //acceso a pacientes
    var reg_dni = dni_regex.test(dni.value.toLowerCase());

    if (reg_dni == false) {
      swal("FORMTARO INCORRECTO");
      dni.value = "";
    }
  });
  pass.addEventListener("blur", function (e) {
    //controla el pass
    var r = pass_regex.test(pass.value.toLowerCase());

    if (r == false) {
      swal("FORMTARO INCORRECTO", "deben ser 8 digitos");
      pass.value = "";
    }
  });
});