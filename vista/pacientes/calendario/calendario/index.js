let boton = document.getElementById("boton");
let moda = document.getElementById("evento");

document.addEventListener("DOMContentLoaded", function () {
  $("#loader").fadeOut(1500);
  var calendarEl = document.getElementById("calendar");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    editable: true,
    locale: "es",


    events: "http://localhost/PROYECTO_FINAL/vista/pacientes/calendario/eventos/eventos.php?accion=listar",

 dateClick: function ($e) {
      //console.log($("#evento_01"));
      const formatDate1 = (date)=>{
        formatted_date =date.getDate()  + "-" +(date.getMonth()+1) + "-" +date.getFullYear()
        return formatted_date;
       }
      ;
      let dia = $e.dateStr;
      let formatted_date
      var date = new Date();
      let dia01 = date.getDate();
      if (dia01 <9 && dia01 >1){
       // console.log()
      dia01= '0'+dia01;
      }
      const formatDate = (date) => {
        formatted_date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + dia01;
        return formatted_date;
      }
      console.log(formatDate(date));
      // console.log($e.dateStr);
      $('#fecha_cita').val($e.dateStr) //inserta hora en modal. la fehca que se elige 

      console.log(dia);
      if (formatDate(date) <= dia) {
        console.log("hola");

        $("#evento").modal('show')

        //console.log($('#hora').val)
        $('#date_click').val($e.dateStr);
        verificar_fechas($e.dateStr); //fehca como parametro





      } else {
        swal("INFORMACION", "Hoy es " + formatDate1(date) + " no puede seleccionar dias anteriores", "error");
      }
    }
    





  });

  calendar.render(); //no importa donde esta






  //BOTON QUE AGREGA CITAS, LLAMA A AGREGAR PARA INSERTAR LAS CITAS Y PASA COMO PARAMETRO LOS DATOS DEL REGISTRO
  $("#btnagregar").click(function () {
    let datos = datos_del_formulario();
    agregarRegistro1(datos);
    $('#evento').hide(); //esconde el boton 
  });

  //BOTON QUE PONE DISPONIBLE LAS HORAS

  $("#btncancelar").click(function () {
    restablecer_horas();
    $('#evento').modal('hide'); //esconde el boton 
    // $("#evento").modal('show');

  });

 

  //FUNCION AJAX ENVIA AL SERVIDOR LOS DATOS ASINCRONOS, RECIBE DE PARAMETRO LOS DATOS
  function agregarRegistro1(registro) {
    //alert(registro);
    console.log(registro);
    $.ajax({
      type: "POST",
      //otro cambio 
      //url: "/calendario/eventos/agregar.php",
      url: "http://localhost/PROYECTO_FINAL/calendario/eventos/agregar.php",
      data: (registro),

      success: function (msg) {

        calendar.refetchEvents();
        if (msg == 1) {

        alert("Guardado con exito",'¡¡','info');
          
          $("#evento").modal('hide');
          //segundo cambio 
          events:
            //"voolvemos a cargar el calendario con la nueva cita 
            "http://localhost/PROYECTO_FINAL/vista/pacientes/calendario/calendario/eventos/eventos.php?accion=listar";
          
           window.location.assign("http://localhost/PROYECTO_FINAL/vista/pacientes/portal_pacientes.php")
        } else
        swal("Ocurrio un error,Verifqiue citas existentes. Avise al administrador  en caso de continuar el error", "error");
      },

      error: function (error) {
        //alert("Hay un problema:" + error);
        console.log(error);
        $("#evento").modal('hide');
      },
    })
    $("#evento").modal('hide');

  }





  // funciones que interactuan con el formulario de entrada de datos



  //RECUPERA LOS DATOS INSERTADOS EN LOS FORMULARIOS Y LOS DEVUELVE EN OBJECT
  function datos_del_formulario() {
   
      var datos1 = {
      fk_paciente: $("#fk_paciente").val(),
      fk_medico: $("#fk_medico").val(),
      hora: $("#hora").val(),
      fecha_cita: $("#fecha_cita").val(),
      texto: $("#texto").val()

    };
    let texto_1 =$("#texto").val().length;
    let hora= $("#hora").val();console.log("soy hora " + hora);
   if(texto_1==0){
      swal("No puede estar vacio el campo sintomas",'info'); 
    }
    else if(hora==null) {
      swal("Seleecione una hora",'info')
    }else
    return datos1;

  }



  function verificar_fechas(date_click) {
    const horas = [];
    let contador = $("#contador").val(); //variable del tamaño del array php
    for (let i = 0; i < contador; i++) {
      // Se recorren todas las fechas 
      //console.log($("#verificar_fecha").val()+i)
      console.log(date_click);
      if ($("#verificar_fecha" + i).val() == date_click) { //si hay coincidencia con la fecha seleccionada 
        horas.push($("#verificar_hora" + i).val()); //
        //busco hora
        console.log("hola buscando horas");
        console.log($("#verificar_hora" + i).val());
        if ($("#verificar_hora" + i).val() == $("#h1").val()) { // si coinciden las fechas out
          $('#h1').attr('disabled', 'disabled');
          console.log("para las 9");
        }
        if ($("#verificar_hora" + i).val() == $("#h2").val()) { // si coinciden las fechas out
          $('#h2').attr('disabled', 'disabled');
          console.log("para las 10");
        }
        if ($("#verificar_hora" + i).val() == $("#h3").val()) { // si coinciden las fechas out
          $('#h3').attr('disabled', 'disabled');
          console.log("para las 11");
        }
        if ($("#verificar_hora" + i).val() == $("#h4").val()) { // si coinciden las fechas out
          $('#h4').attr('disabled', 'disabled');
          console.log("para las 12");
        }
        if ($("#verificar_hora" + i).val() == $("#h5").val()) { // si coinciden las fechas out
          $('#h5').attr('disabled', 'disabled');
          console.log("para las 13");
        }

      }
    }



    

  }

  //VACIAR CAMPOS SI CANCELAMOS
  function restablecer_horas() {
    let texto = $("#texto").val();
    
    console.log(texto.length);
    console.log("entra bton cerrar");
    $('#h1').removeAttr('disabled');

    $('#h2').removeAttr('disabled');
    $('#h3').removeAttr('disabled');
    $('#h4').removeAttr('disabled');
    $('#h5').removeAttr('disabled');
    //$('#h1').attr('enabled', 'enabled'); /PTE ADAPTAR MAS HORAS
  }




});