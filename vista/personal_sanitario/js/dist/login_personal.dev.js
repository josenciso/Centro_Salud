"use strict";

window.addEventListener("DOMContentLoaded", function () {
  var regex_email = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
  var dni_regex = /^([0-9]{8,8}[A-Za-z])|([XYZ][0-9]{7}[A-Za-z])$/; //dni aunque no cumple todas las expectativas

  var pass_regex = /^[a-zA-Z0-9]{8}$/; // 8 maximo, solo letras y numeros

  var num_regex = /^[0-9]{4}$/; // 4 numeros maximo

  var email = document.getElementById("email");
  var pass = document.getElementById("pass");
  var medico = document.getElementById("medico");
  var pass1 = document.getElementById("pass1");
  email.addEventListener("blur", function (e) {
    //acceso a pacientes
    var email_ = regex_email.test(email.value.toLowerCase());

    if (email_ == false) {
      swal("FORMTARO INCORRECTO", "introduzca su correo electronico", "error");
      email.value = "";
    }
  });
  pass.addEventListener("blur", function (e) {
    //controla el pass
    var r = pass_regex.test(pass.value.toLowerCase());

    if (r == false) {
      swal("FORMTARO INCORRECTO", "deben ser 8 digitos", "error");
      pass.value = "";
    }
  });
  pass1.addEventListener("blur", function (e) {
    //controla el pass
    var r = pass_regex.test(pass1.value.toLowerCase());

    if (r == false) {
      swal("FORMTARO INCORRECTO", "deben ser 8 digitos", "error");
      pass1.value = "";
    }
  });
  medico.addEventListener("blur", function (e) {
    //acceso a pacientes
    var medico1 = num_regex.test(medico.value.toLowerCase());

    if (medico1 == false) {
      swal("FORMTARO INCORRECTO", " introduzca su numero de colegiado", "error");
      email.value = "";
    }
  });
});