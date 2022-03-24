//en desuso
window.addEventListener("DOMContentLoaded", () => {



  const regex = /(delete)|(--)|(;)|(drop)|(insert)/; //evitar la insercin
  const dni_regex = /^[0-9]{8,8}[A-Za-z]$/; //dni aunque
  const nombre_regex = /^[A-Z]{1}.* [A-Z]{1}.*/;
  const pass_regex = /^[a-zA-Z0-9]{8}$/; // 8 maximo, solo letras y numeros
  const regex_email = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
  //const regex_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/;
  const regex_telefono = /^[0-9]{9}$/;
  //variables
  let dni = document.getElementById("dni"); //dni
  let dni_error = document.getElementById("dni_error");

  let nombre = document.getElementById("nombre"); //direccion
  let nombre_error = document.getElementById("nombre_error"); //nombre_error

  let direccion = document.getElementById("direccion"); //direccion
  let direccion_error = document.getElementById("nombre_error"); //direccion_error

  let ciudad = document.getElementById("ciudad"); //ciudad
  let ciudad_error = document.getElementById("ciudad_error"); //ciudad_error

  let telefono = document.getElementById("telefono"); //telefono
  let telefono_error = document.getElementById("telefono_error"); //telefono

  let contraseña = document.getElementById("contraseña"); //contraseña
  let contraseña_error = document.getElementById("contraseña_error"); //contraseña

  let contraseña_1 = document.getElementById("contraseña_1"); //contraseña1
  let contraseña_1_error = document.getElementById("contraseña_1_error"); //contraseña1

  let email = document.getElementById("email"); //email
  let email_error = document.getElementById("email_error"); //eamil_error

  let fecha = document.getElementById("fecha"); //fecha
  let fecha_error = document.getElementById("fecha_Error"); //fecha_error

  let medico = document.getElementById("medico"); //medico
  let enviar = document.getElementById("in");
  //enviar.className = "ocultar";
  let contador = 0;
  let nun = 1;
  let val = false;
  //***validando DNI */


  dni.addEventListener("blur", function (e) {
    dni.className = "form-control";
    let reg = regex.test(dni.value.toLowerCase());
    let reg_dni = dni_regex.test(dni.value.toLowerCase());
    if (reg) {
      contador++;
      console.log("Error_palabra falsa");
      dni.className = "error";
      dni_error.innerHTML = "PALABRA NO PERMITIDA"; //

      swal(
        "Aviso " + contador + "!",
        "ESTAS COMPROMETIENDO LA BASE DE DATOS",
        "error"
      );
      if (contador == 3) {
        swal("Aviso " + contador + "!", "SE SUSPENDE TU CUENTA", "error");
      }
    } else if (reg_dni == false) {
      dni_error.innerHTML = "FORMATO INCORRECTO"; //
      dni.className = "ko";

    } else if (reg_dni) {
      let conexion = new XMLHttpRequest();
      conexion.onreadystatechange = recibir;
      url = "http://localhost/PROYECTO_FINAL/controlador/API_BD/dni.php";
      conexion.open("GET", url, true);
      conexion.send(null);

      function recibir() {
        if (conexion.readyState == 4 && conexion.status == 200) {
          datos = JSON.parse(conexion.responseText);
          console.log(datos);
          longitud = datos.length;
          for (i = 0; i < longitud; i++) {
            if (datos[i].title == dni.value) {
              val = true;
              i = 100;
              
            }
          }
           
          

            if (val) {
              swal(
                "ATENCION",
                "Este numero de dni ya esta siendo usado",
                "warning"
              );
              dni.className = "ko";
              val=false;
            } else {
              dni.className = "ok";
              dni_error.innerHTML = "OK"; //
              nun++;
              console.log(nun)
              val=false;
            }
          
        }
      }





    }

  });







  //***validando NOMBRE */

  nombre.addEventListener("blur", function (e) {
    nombre.className = "form-control";
    let reg = regex.test(nombre.value.toLowerCase());
    let reg_nom = nombre_regex.test(nombre.value);
    console.log(nombre.value.length);
    if (reg) {

      contador++;
      console.log("Error_palabra falsa");
      nombre.className = "error";
      nombre_error.innerHTML = "PAALABRA NO PERMITIDA"; //
      swal(
        "Aviso " + contador + "!",
        "ESTAS COMPROMETIENDO LA BASE DE DATOS",
        "error"
      );
      if (contador == 3) {
        console.log("ESTAS SIENDO REPOTARDO AL ADMIN");
      }
    } else if (nombre.value.length > 79) {

      nombre.className = "ko";
      nombre_error.innerHTML = "Supera el maximo de caracteres permitidos"; //
    } else if (reg_nom) {
      console.log("nombre coreccto");
      nombre.className = "ok";

      nun++;
      //pte nombre_error.class=""; meter un simobolo
    } else if (reg_nom == false) {
      nombre.className = "ko";
      nombre_error.innerHTML =
        "Empieza con mayuscula y al menos Nombre y primer apellido"; //


    }
  });
  //***validando direccion */

  direccion.addEventListener("blur", function (e) {
    direccion.className = "form-control";
    let reg = regex.test(direccion.value.toLowerCase());
    // let reg_dni = dni_regex.test(nombre.value.toLowerCase());
    if (reg) {

      contador++;
      console.log("Error_palabra falsa");
      direccion.className = "error";
      direccion_error.innerHTML = "PAALABRA NO PERMITIDA"; //
      swal(
        "Aviso " + contador + "!",
        "ESTAS COMPROMETIENDO LA BASE DE DATOS",
        "error"
      );
      if (contador == 3) {
        console.log("ESTAS SIENDO REPOTARDO AL ADMIN");
      }
    } else if (direccion.value.length > 130) {

      direccion.className = "ko";
      direccion_error.innerHTML = "Supera el maximo de caracteres permitidos"; //
    } else if (direccion.value.length == 0) {

      direccion.className = "ko";
      direccion_error.innerHTML = "Debes de incluir una direccion"; //
    } else {
      direccion.className = "ok";
      direccion_error.innerHTML = ""; //

      nun++;
    }

    console.log("por validar");
  });

  //***validando ciudad */

  ciudad.addEventListener("blur", function (e) {
    ciudad.className = "form-control";
    let reg = regex.test(ciudad.value.toLowerCase());
    // let reg_dni = dni_regex.test(nombre.value.toLowerCase());
    if (reg) {

      contador++;
      console.log("Error_palabra falsa");
      ciudad.className = "error";
      ciudad_error.innerHTML = "PAALABRA NO PERMITIDA"; //
      swal(
        "Aviso " + contador + "!",
        "ESTAS COMPROMETIENDO LA BASE DE DATOS",
        "error"
      );
      if (contador == 3) {
        console.log("ESTAS SIENDO REPOTARDO AL ADMIN");
      }
    } else if (ciudad.value.length > 19) {

      ciudad.className = "ko";
      ciudad_error.innerHTML = "Supera el maximo de caracteres permitidos"; //
    } else if (ciudad.value.length == 0) {

      ciudad.className = "ko";
      ciudad_error.innerHTML = "Debes de incluir una direccion"; //
    } else {

      ciudad.className = "ok";
      ciudad_error.innerHTML = ""; //   
      nun++;
    }

  });
  //***validando medico seleccionado */

  medico.addEventListener("blur", function () {
    if (medico.value.length > 0) {

      medico.className = "ok";
      nun++;
    } else {

      medico.className = "ko";
    }
    // ciudad_error.innerHTML = "Debes de incluir una direccion"; //
  });

  //validando telefono

  telefono.addEventListener("blur", function (e) {
    telefono.className = "form-control";
    //let reg = regex.test(telefono.value.toLowerCase());
    let reg1 = regex_telefono.test(telefono.value);
    if (reg1) {

      telefono.className = "ok";
      telefono_error.innerHTML = ""; //

      nun++;
    } else {

      telefono.className = "ko";
      telefono_error.innerHTML = "Debes introducir un numero de 9 cifras"; //
    }

  });

  //validando contraseñas

  contraseña.addEventListener("blur", function (e) {
    contraseña.className = "form-control";
    let reg = regex.test(contraseña.value.toLowerCase()); //buscando --
    let reg1 = pass_regex.test(contraseña.value); //buscando --

    // let reg_dni = dni_regex.test(nombre.value.toLowerCase());
    if (reg) {

      contador++;
      console.log("Error_palabra falsa");
      contraseña.className = "error";
      contraseña_error.innerHTML = "PALABRA NO PERMITIDA"; //
      swal(
        "Aviso " + contador + "!",
        "ESTAS COMPROMETIENDO LA BASE DE DATOS",
        "error"
      );
    }
    if (contador == 3) {
      console.log("ESTAS SIENDO REPOTARDO AL ADMIN");
    }

    if (reg1) {


      contraseña.className = "ok";
      contraseña_1.removeAttribute("disabled", "");

      nun++;
    } else if (reg1 == false) {

      contraseña.className = "ko";
      contraseña_error.innerHTML = "Debe ser 8 caracteres alfanúmeros"; //
      contraseña_1.setAttribute("disabled", "");
    }
  });

  //validar contraseñas iguales

  contraseña_1.addEventListener("blur", function (e) {
    if (contraseña_1.value == contraseña.value) {
      contraseña_1.className = "ok";
      contraseña_1_error.innerHTML = ""; //
      console.log(nun)
      nun++;
    } else {

      contraseña_1.className = "ko";
      contraseña_1_error.innerHTML = "Las contraseñas no coinciden"; //
    }
  });


  //validando email

  email.addEventListener("blur", function () {
    console.log(email.value);
    let reg = regex_email.test(email.value);
    if (email.value.length > 99) {
      email.className = "ko";
      email_error.innerHTML = "Caracteres superados";
    }
    if (reg) {

      email.className = "ok";
      email_error.innerHTML = "";

      nun++;

    } else {

      email.className = "ko";
      email_error.innerHTML = "Debe ser una direccion de email ";
    }
  });







  //****devolviendo clase normal si volvemos insertar */
  dni.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    dni.className = "form-control";
    dni_error.innerHTML = "";
  });

  nombre.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    nombre.className = "form-control";
    nombre_error.innerHTML = "";
  });

  direccion.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    direccion.className = "form-control";
    direccion.innerHTML = "";
  });

  ciudad.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    ciudad.className = "form-control";
    ciudad_error.innerHTML = "";
  });

  medico.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    medico.className = "form-control";
    //medico.innerHTML = ""
  });
  telefono.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    telefono.className = "form-control";
    telefono.innerHTML = "";
  });

  contraseña.addEventListener("focus", function (e) {
    //AL ENTRAR AL FOCO, LIMPIA LOS ERRORES
    contraseña.className = "form-control";
    contraseña_error.innerHTML = "";

  });




  if (nun == 11) {

    enviar.className = "col-12 btn btn-primary";
  }





})