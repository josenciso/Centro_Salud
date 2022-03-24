"use strict";

window.addEventListener("DOMContentLoaded", function () {
  var regex_num = /^[0-9]{1,4}$/;
  var regex = /(delete)|(--)|(;)|(drop)|(insert)/; //evitar la insercin

  var nombre_regex = /^[A-Z]{1}.* [A-Z]{1}.*/;
  var pass_regex = /^[a-zA-Z0-9]{8}$/; // 8 maximo, solo letras y numeros

  var regex_email = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
  var regex_telefono = /^[0-9]{9}$/;
  var regex_dire = /^[A-Z]{1}.* /;
  var url = "http://localhost/PROYECTO_FINAL/controlador/API_BD/dni.php"; //variables

  var direccion = document.getElementById("direccion"); //direccion

  var direccion_error = document.getElementById("direccion_error"); //direccion_error

  var telefono = document.getElementById("telefono"); //telefono

  var telefono_error = document.getElementById("telefono_error"); //telefono

  var medico = document.getElementById("medico"); //medico

  var contraseña = document.getElementById("contraseña"); //contraseña

  var contraseña_error = document.getElementById("contraseña_error"); //contraseña

  var contraseña_1 = document.getElementById("contraseña_1"); //contraseña1

  var contraseña_1_error = document.getElementById("contraseña_1_error"); //contraseña1

  var email = document.getElementById("email"); //email

  var email_error = document.getElementById("email_error"); //eamil_error
  //casillas

  var casilla_tel = document.getElementById("casilla_telefono");
  var casilla_contraseña = document.getElementById("casilla_contraseña");
  var casilla_email = document.getElementById("casilla_email");
  var casilla_direccion = document.getElementById("casilla_direccion");
  var casilla_medico = document.getElementById("casilla_medico");
  var rol = document.getElementById("rol");
  var enviar = document.getElementById("in"); //enviar.className = "ocultar";

  var contador = 0; //para baneo

  var nun = 1;
  var val_1 = false; //valida el envio 

  var verificar = document.getElementById("verifica");
  var formulario = document.getElementById("formulario"); //***validando numero personal */
  //necesario tener check para rellenar, si desactiva borra campo

  casilla_tel.addEventListener("click", function () {
    //primero escoger 
    if (casilla_tel.checked == true) telefono.removeAttribute("disabled", "");

    if (casilla_tel.checked == false) {
      telefono.setAttribute("disabled", "");
      telefono.className = "form-control";
      telefono.value = "";
      enviar.setAttribute("disabled", "");
      enviar.className = "col-12 btn btn-warning";
    }
  });
  casilla_contraseña.addEventListener("click", function () {
    //primero escoger 
    if (casilla_contraseña.checked == true) // se activan 
      contraseña.removeAttribute("disabled", "");
    contraseña_1.removeAttribute("disabled", "");
    verifica.removeAttribute("disabled", "");
    console.log("activa");

    if (casilla_contraseña.checked == false) {
      //se desactivan
      contraseña.setAttribute("disabled", "");
      contraseña_1.setAttribute("disabled", "");
      contraseña.className = "form-control";
      contraseña_1.className = "form-control";
      console.log("desactiva");
      contraseña.value = "";
      contraseña_1.value = "";
      enviar.setAttribute("disabled", "");
      enviar.className = "col-12 btn btn-warning";
    }
  });
  casilla_email.addEventListener("click", function () {
    //primero escoger 
    if (casilla_email.checked == true) email.removeAttribute("disabled", "");

    if (casilla_email.checked == false) {
      email.setAttribute("disabled", "");
      email.className = "form-control";
      email.value = "";
      enviar.setAttribute("disabled", "");
      enviar.className = "col-12 btn btn-warning";
    }
  });
  casilla_direccion.addEventListener("click", function () {
    //primero escoger 
    if (casilla_direccion.checked == true) direccion.removeAttribute("disabled", "");
    console.log("hola");

    if (casilla_direccion.checked == false) {
      direccion.setAttribute("disabled", "");
      direccion.className = "form-control";
      direccion.value = "";
      enviar.setAttribute("disabled", "");
      enviar.className = "col-12 btn btn-warning";
    }
  });
  casilla_medico.addEventListener("click", function () {
    //primero escoger 
    if (casilla_medico.checked == true) medico.removeAttribute("disabled", "");
    console.log("hola");

    if (casilla_medico.checked == false) {
      medico.setAttribute("disabled", "");
      medico.className = "form-control";
      medico.value = "";
      enviar.setAttribute("disabled", "");
      enviar.className = "col-12 btn btn-warning";
    }
  }); //***validando direccion */

  direccion.addEventListener("blur", function (e) {
    direccion.className = "form-control";
    var reg = regex.test(direccion.value.toLowerCase());
    var reg_di = regex_dire.test(direccion.value);

    if (reg) {
      contador++;
      console.log("Error_palabra falsa");
      direccion.className = "error";
      direccion_error.innerHTML = "PAALABRA NO PERMITIDA"; //

      swal("Aviso ", "ESTAS COMPROMETIENDO LA BASE DE DATOS", "error");
    } else if (direccion.value.length > 130) {
      direccion.className = "ko";
      direccion_error.innerHTML = "Supera el maximo de caracteres permitidos"; //
    } else if (direccion.value.length == 0) {
      direccion.className = "ko";
      direccion_error.innerHTML = "Debes de incluir una direccion"; //
    } else if (reg_di == false) {
      direccion.className = "ko";
      direccion_error.innerHTML = "Debes Empezar con una letra mayuscula y la direccion"; //
    } else {
      direccion.className = "ok";
      direccion_error.innerHTML = ""; //

      nun++;
    }

    console.log("por validar");
  }); //Validando medico

  medico.addEventListener("blur", function () {
    if (medico.value.length > 0) {
      medico.className = "ok";
      nun++;
    } else {
      medico.className = "ko";
    } // ciudad_error.innerHTML = "Debes de incluir una direccion"; //

  }); //validando telefono

  telefono.addEventListener("blur", function (e) {
    telefono.className = "form-control"; //let reg = regex.test(telefono.value.toLowerCase());

    var reg1 = regex_telefono.test(telefono.value);

    if (reg1) {
      telefono.className = "ok";
      telefono_error.innerHTML = ""; //

      nun++;
    } else {
      telefono.className = "ko";
      telefono_error.innerHTML = "Debes introducir un numero de 9 cifras"; //
    }
  }); //Validando Medicos
  //validando contraseñas

  contraseña.addEventListener("blur", function (e) {
    contraseña.className = "form-control";
    var reg = regex.test(contraseña.value.toLowerCase()); //buscando --

    var reg1 = pass_regex.test(contraseña.value); //buscando --
    // let reg_dni = dni_regex.test(nombre.value.toLowerCase());

    if (reg) {
      contador++;
      console.log("Error_palabra falsa");
      contraseña.className = "error";
      contraseña_error.innerHTML = "PALABRA NO PERMITIDA"; //

      swal("Aviso " + contador + "!", "ESTAS COMPROMETIENDO LA BASE DE DATOS", "error");
    }

    if (reg1) {
      contraseña.className = "ok";
      contraseña_1.removeAttribute("disabled", "");
      nun++;
      contraseña_1.focus();
    } else if (reg1 == false) {
      contraseña.className = "ko";
      contraseña_error.innerHTML = "Debe ser 8 caracteres alfanúmeros"; //

      contraseña_1.setAttribute("disabled", "");
    }
  }); //validar contraseñas iguales

  contraseña_1.addEventListener("blur", function (e) {
    if (contraseña_1.value == contraseña.value) {
      contraseña_1.className = "ok";
      contraseña_1_error.innerHTML = ""; //

      console.log(nun);
      nun++;
    } else {
      contraseña_1.className = "ko";
      contraseña_1_error.innerHTML = "Las contraseñas no coinciden"; //
    }
  }); //validando email

  email.addEventListener("blur", function () {
    console.log(email.value);
    var reg = regex_email.test(email.value);

    if (email.value.length > 99) {
      email.className = "ko";
      email_error.innerHTML = "Caracteres superados";
    }

    if (reg) {
      if (reg) {
        var recibir = function recibir() {
          // email no registrado
          if (conexion.readyState == 4 && conexion.status == 200) {
            datos = JSON.parse(conexion.responseText);
            console.log(datos);
            longitud = datos.length;

            for (i = 0; i < longitud; i++) {
              if (datos[i].jose == email.value) {
                //email
                val_1 = true;
                break; // si lo encuentro salir del bucle
              }
            }
          }

          if (val_1) {
            swal("ATENCION", "Este email ya esta siendo usado", "warning");
            email.className = "ko";
            val_1 = false;
          } else {
            email.className = "ok";
            email.innerHTML = "OK";
            val_1 = false;
          }
        };

        var conexion = new XMLHttpRequest();
        conexion.onreadystatechange = recibir;
        conexion.open("GET", url, true);
        conexion.send(null);
      }

      email.className = "ok";
      email_error.innerHTML = "";
    } else {
      email.className = "ko";
      email_error.innerHTML = "Debe ser una direccion de email ";
    }
  }); //****devolviendo clase normal si volvemos insertar */

  telefono.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    telefono.className = "form-control";
    telefono.innerHTML = "";
    enviar.setAttribute("disabled", "");
    enviar.className = "col-12 btn btn-warning";
  });
  contraseña.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    contraseña.className = "form-control";
    contraseña_error.innerHTML = "";
    enviar.setAttribute("disabled", "");
    enviar.className = "col-12 btn btn-warning";
  });
  email.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    email.className = "form-control";
    email_error.innerHTML = "";
    enviar.setAttribute("disabled", "");
    enviar.className = "col-12 btn btn-warning";
  });
  direccion.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    direccion.className = "form-control";
    direccion_error.innerHTML = "";
    enviar.setAttribute("disabled", "");
    enviar.className = "col-12 btn btn-warning";
  });
  medico.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    enviar.setAttribute("disabled", "");
    enviar.className = "col-12 btn btn-warning";
  }); //recorrer el dom para ver todos los inputs ok

  var verifica = document.getElementById("verifica");
  verifica.addEventListener("click", function () {
    if (telefono.className == "ok" && casilla_tel.checked == true || casilla_email.checked == true && email.className == "ok" || contraseña.className == "ok" && contraseña_1.className == "ok" && casilla_contraseña.checked == true || direccion.className == "ok" && casilla_direccion.checked == true || medico.className == "ok" && casilla_medico.checked == true) {
      enviar.removeAttribute("disabled", "");
      enviar.className = "col-12 btn btn-success";
    } else {
      swal("ERROR", "Al menos rellene los datos", "error");
      enviar.setAttribute("disabled", "");
    }
  });
});