"use strict";

window.addEventListener("DOMContentLoaded", function () {
  var regex_num = /^[0-9]{1,4}$/;
  var regex = /(delete)|(--)|(;)|(drop)|(insert)/; //evitar la insercin

  var nombre_regex = /^[A-Z]{1}.* [A-Z]{1}.*/;
  var pass_regex = /^[a-zA-Z0-9]{8}$/; // 8 maximo, solo letras y numeros

  var regex_email = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
  var regex_telefono = /^[0-9]{9}$/; //variables

  var num = document.getElementById("num"); //dni

  var num_error = document.getElementById("num_error");
  var nombre = document.getElementById("nombre"); //direccion

  var nombre_error = document.getElementById("nombre_error"); //nombre_error

  var telefono = document.getElementById("telefono"); //telefono

  var telefono_error = document.getElementById("telefono_error"); //telefono

  var contraseña = document.getElementById("contraseña"); //contraseña

  var contraseña_error = document.getElementById("contraseña_error"); //contraseña

  var contraseña_1 = document.getElementById("contraseña_1"); //contraseña1

  var contraseña_1_error = document.getElementById("contraseña_1_error"); //contraseña1

  var email = document.getElementById("email"); //email

  var email_error = document.getElementById("email_error"); //eamil_error

  var medicos = document.getElementById("flexRadioDefault1");
  var administrativos = document.getElementById("flexRadioDefault2");
  var rol = document.getElementById("rol");
  var enviar = document.getElementById("in"); //enviar.className = "ocultar";

  var contador = 0;
  var nun = 1;
  var val = false;
  var val_1 = false;
  var formulario = document.getElementById("formulario"); //***validando numero personal */

  var url = ""; //ASIGNAR SEGUN ROL CONSULTA ESCRIBIR placeholder de numero colegiado o adminis

  medicos.addEventListener("click", function () {
    num.setAttribute("placeholder", "Numero de colegiado");
    rol.value = "medico";
    url = "http://localhost/PROYECTO_FINAL/controlador/API_BD/medicos.php"; //todos los n de medico
  });
  administrativos.addEventListener("click", function () {
    num.setAttribute("placeholder", "Numero de administrativo");
    rol.value = "administrativo";
    url = "http://localhost/PROYECTO_FINAL/controlador/API_BD/administrativos.php"; //todos los n de admin y emails 
  }); //OBLIGAR A ELEGIR CHECK BOX

  formulario.addEventListener("click", function () {
    //primero escoger 
    if (medicos.checked == false && administrativos.checked == false) {
      swal("Aviso", "Seleccione primero MEDICO O ADMINISTRATIVO", "info");
    }
  }); //al elegir chekcbox, limpiar imput

  medicos.addEventListener("click", limpia_input);
  administrativos.addEventListener("click", limpia_input);
  num.addEventListener("blur", function (e) {
    num.className = "form-control";
    var reg = regex.test(num.value.toLowerCase());
    var regex1 = regex_num.test(num.value);
    console.log(num.value);

    if (reg) {
      contador++;
      console.log("Error_palabra falsa");
      num.className = "error";
      num.innerHTML = "PALABRA NO PERMITIDA"; //

      error();
      num.focus;
    } else if (regex1 == false) {
      num_error.innerHTML = "FORMATO INCORRECTO"; //

      num.className = "ko"; //num.focus();
    } else if (regex1) {
      if (medicos.checked == true && administrativos.checked == false || medicos.checked == false && administrativos.checked == true) {
        var recibir = function recibir() {
          // ver si ya esta registrado el n colegiado o n de administrativo
          if (conexion.readyState == 4 && conexion.status == 200) {
            datos = JSON.parse(conexion.responseText);
            console.log(datos);
            longitud = datos.length;

            for (i = 0; i < longitud; i++) {
              if (datos[i].title == num.value) {
                val = true;
                break; // si lo encuentro salir del bucle
              }
            }
          }

          if (val) {
            swal("ATENCION", "Este numero de registro ya esta siendo usado", "warning");
            num.className = "ko";
            val = false;
          } else {
            num.className = "ok";
            num_error.innerHTML = "OK"; //

            nun++;
            console.log(nun);
            val = false;
          }
        };

        var conexion = new XMLHttpRequest();
        conexion.onreadystatechange = recibir;
        conexion.open("GET", url, true);
        conexion.send(null);
      }
    }
  }); //***validando NOMBRE */

  nombre.addEventListener("blur", function (e) {
    nombre.className = "form-control";
    var reg = regex.test(nombre.value.toLowerCase());
    var reg_nom = nombre_regex.test(nombre.value);
    console.log(nombre.value.length);

    if (reg) {
      console.log("Error_palabra falsa");
      nombre.className = "error";
      nombre_error.innerHTML = "PAALABRA NO PERMITIDA"; //

      error();
    } else if (nombre.value.length > 79) {
      nombre.className = "ko";
      nombre_error.innerHTML = "Supera el maximo de caracteres permitidos"; //
    } else if (reg_nom) {
      console.log("nombre coreccto");
      nombre.className = "ok";
      nun++; //pte nombre_error.class=""; meter un simobolo
    } else if (reg_nom == false) {
      nombre.className = "ko";
      nombre_error.innerHTML = "Empieza con mayuscula y al menos Nombre y primer apellido"; //
    }
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
  }); //validando contraseñas

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

      error();
    }

    if (contador == 3) {
      console.log("ESTAS SIENDO REPOTARDO AL ADMIN");
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
      email.className = "ok";
      email_error.innerHTML = "";
      nun++;
    } else {
      email.className = "ko";
      email_error.innerHTML = "Debe ser una direccion de email ";
    }
  }); //****devolviendo clase normal si volvemos insertar */

  num.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    num.className = "form-control";
    num_error.innerHTML = "";
    cancelar_envio();
  });
  nombre.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    nombre.className = "form-control";
    nombre_error.innerHTML = "";
    cancelar_envio();
  });
  telefono.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    telefono.className = "form-control";
    telefono.innerHTML = "";
    cancelar_envio();
  });
  contraseña.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    contraseña.className = "form-control";
    contraseña_error.innerHTML = "";
    cancelar_envio();
  });
  email.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    email.className = "form-control";
    email_error.innerHTML = "";
    cancelar_envio();
  });

  function limpia_input() {
    num.className = "form-control";
    num_error.innerHTML = "";
    telefono.className = "form-control";
    telefono.innerHTML = "";
    nombre.className = "form-control";
    nombre_error.innerHTML = "";
    contraseña.className = "form-control";
    contraseña_error.innerHTML = "";
    email.className = "form-control";
    email_error.innerHTML = "";
  }

  function cancelar_envio() {
    enviar.setAttribute("disabled", "");
    enviar.className = "col-12 btn btn-warning";
  } //recorrer el dom para ver todos los inputs ok


  var verifica = document.getElementById("verifica");
  verifica.addEventListener("click", function () {
    if (num.className == "ok" && nombre.className == "ok" && telefono.className == "ok" && contraseña.className == "ok" && email.className == "ok" && contraseña_1.className == "ok") {
      console.log("ok todo");
      enviar.removeAttribute("disabled", "");
      enviar.className = "col-12 btn btn-success";
    } else {
      swal("ERROR", "DEBE DE INTRODUCIR TODOS LOS CAMPOS ANTES DE ENVIAR, DEBEN DE ESTAR EN VERDE", "error");
    }
  });

  function error() {
    swal("Aviso ", "ESTAS COMPROMETIENDO LA BASE DE DATOS", "error");
  }
});