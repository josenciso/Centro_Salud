<?php

session_start();
//var_dump($_SESSION);


if (empty($_SESSION['administrativo']) || empty($_SESSION['paciente'])) { //solo acceso a personal sanitario y pacientes
  header("http://localhost/PROYECTO_FINAL/vista/personal_sanitario/login_personal_sanitario.php");
} ?>

<!DOCTYPE html>
<html lang='es'>

<head>

  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link href=' ../node_modules/fullcalendar/main.css' rel='stylesheet' />
  <!---->
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--LIBRERIAS NUEVA PARA AVISOS-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


   <!--<link href="../../vista/header/Medilab/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!--<link href="../../vista/header/Medilab/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../vista/header/Medilab/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../vista/header/Medilab/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../../vista/header/Medilab/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../vista/header/Medilab/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../vista/header/Medilab/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
  <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js" integrity="sha512-o0rWIsZigOfRAgBxl4puyd0t6YKzeAw9em/29Ag7lhCQfaaua/mDwnpE2PVzwqJ08N7/wqrgdjc2E0mwdSY2Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale-all.min.js" integrity="sha512-L0BJbEKoy0y4//RCPsfL3t/5Q/Ej5GJo8sx1sDr56XdI7UQMkpnXGYZ/CCmPTF+5YEJID78mRgdqRCo1GrdVKw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/es.min.js" integrity="sha512-DekU3EtZYK7QnqJh6Y+0LSL4w48zh6ZP/f52wTKiRa7uTlS8Eecw9aBVPwT4pR17B3dxiZBJwo/+XH8FPehgkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 Template Main CSS File -->
  <link href="../../vista/header/Medilab/assets/css/style.css" rel="stylesheet">
  <!---->

  <link rel="stylesheet" href="style.css">
  <script src='../node_modules/fullcalendar/main.js'></script>
  <script src="index.js"></script>

</head>

<body>
  <p></p>
  <?php include("../../vista/header/Medilab/top_bar.php") ?>

  <div class="container-fluid">

    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>CITAS PACIENTES</h2>
          <p></p>
        </div>


        <div class="2">
          <a>
            <section id="services" class="services">
              <div class="col-2">
                <a href="../../vista/personal_sanitario/gestionar_pacientes.php">
                  <div id=flecha_back class="">
                    <div class="icon "><i class="bi bi-arrow-left-circle"></i></div>

                  </div>
                </a>
              </div>

            </section>
          </a>

        </div>

      </div>
    </section><!-- End Services Section -->



    <div class="row">

      <div class="col-2">

      </div>
      <div class="col-8" id='calendar'></div>
      <div class="col-2"></div>



      <?php

      $server = "localhost";
      $usuario = "root";
      $clave = "";
      $base = "proyecto_fp";
      $con = mysqli_connect($server, $usuario, $clave, $base) or die("problemas");
      $fk_medico = "";
      $paciente_cita = $_POST['citar']; //viene de personal sanitario ya no la trae la traigo en session o de pacientes
      //parte del administrador
      if (isset($_SESSION['administrativo'])) {

        $pacientes = "SELECT  * FROM pacientes where dni='" . $paciente_cita . "'";
        $resultado = mysqli_query($con, $pacientes);
        while ($fila = mysqli_fetch_row($resultado)) {
          $dni = $fila[0]; //dni
          $nombre =  $fila[1]; //nombre
          $fila[2]; //calle
          $fila[3]; //teleefono
          $fila[4]; //USER
          $fila[5]; //PASS
          $fk_medico = $fila[5]; //fk,medico
          //$edad = $FILA[7];//FECHA
        }
        $_SESSION['fk'] = $fk_medico;
      }
      //parte del paciente asigna su medico
      if (isset($_SESSION['paciente'])) { //si viene paciente asigna su medico
        $fk_medico = $_SESSION['paciente4'];
      }

      //$cita_calendario =array();
      $citas = "select fecha_cita , hora   from citas where fk_medico ='$fk_medico'";
      $resu = mysqli_query($con, $citas);
      while ($fila1 = mysqli_fetch_row($resu)) {
        $hora = $fila1[1]; //dni
        //$nombre =  $fila[3];//nombre
        $cita_calendario = array('title', $fila1[0]); //calle
        $cita_calendario = array('id', $fila1[1]);
        //$fk_medico =$fila[6];//fk,medico
        //$edad = $FILA[7];//FECHA

      }
      // $json = mysqli_fetch_all($$cita_calendario, MYSQLI_ASSOC);

      //echo json_encode($json);


      // $resultado_02 = mysqli_fetch_all($resultado_01, MYSQLI_ASSOC);
      //$a=  json_encode($resultado_02);
      //echo json_encode($resultado_02);

      //echo "<div id='evento_01' value ='$$a;'>soy el evento</div>";





      //habra que quitar, o no, depende, me tengo que traer al paciente desde el boton de citas.

      // $datos = mysqli_query($con, "SELECT cod_id,fk_paciente,fk_medico,fecha_cita,fecha_cita,hora,texto,fondo FROM citas");
      //$ep = mysqli_fetch_all($datos, MYSQLI_ASSOC);
      // foreach ($ep as $fila)
      //   echo "<div class='fc-event' data-paciente='$fila[fk_paciente]' data-horafin='$fila[hora]' data-horainicio='$fila[hora]'
      //              data-colorfondo='$fila[fondo]' data-colortexto='$fila[texto]' data-codigo='$fila[cod_id]'
      //              style='border-color:$fila[fondo];color:$fila[texto];background-color:$fila[fondo];margin:10px'> Paciente
      //              $fila[fk_paciente] comienzo  '$fila[hora]' Medico '$fila[fk_medico]'</div>";
      ?>


      <!-- Button trigger modal -->
      <button id="boton" type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#evento " hidden="">
        SOY EL MODAL ESCONDIDO
      </button>

      <!-- Modal -->
      <div class="loading" id="loader"><img alt="loading">
      </div>
      <form action="" id="envios" method="POST">
        <div class="modal fade" id="evento" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content text-center " id="jk">
              <div class="modal-header text-center ">

                <h5 class="modal-title ">CITAS PACIENTES</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">


                <!--  <div class="mb-3">
            <label for="" class="form-label"></label>
            <input type="text" name="fecha" id="fecha" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
            </div>-->

                <div class="form-row">

                  <div class="form-group col-md-12">
                    <label></label>
                    <div class="input-group input-group-lg ">
                      <span class="bg-info background-color-info   col-12" id="inputGroup-sizing-lg">
                        <h3>PACIENTE</h3>
                      </span>
                    </div>
                    <div class="text-center">
                      <h3 id="nombrePaciente"><?php echo ($nombre); ?></h3>
                    </div>
                    <div class="text-center">
                      <h3 id="recupera"></h3>
                    </div>
                    <input type="text" name="nombre" id="paciente" value="<?php echo $nombre ?>" class="form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" hidden="true">


                    <div class="form-row">
                      <div class="input-group input-group-lg">
                        <!--CAMPO DNI-->
                        <input type="text" name="title" id="fk_paciente" value="<?php echo $dni ?>" class="form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" hidden="true">
                        <input type="text" name="title" id="fk_medico" value="<?php echo $fk_medico ?>" class="form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" hidden="true">
                        <?php

                        ?>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!--FIN DEL MODAL BODY DNI-->

              <div class="form-row">
                <!--FECHAS Y HORAS-->
                <div class="form-group col-md-12">
                  <div class="input-group input-group-lg ">
                    <span class="bg-info background-color-info   col-12" id="inputGroup-sizing-lg">
                      <h3>FECHA</h3>
                    </span>
                  </div>
                  <input type="text" name="fecha" id="fecha_cita" class="form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
                </div>
              </div>
              <div class="form-group col-md-12" id="TituloHoraInicio">
                <label>
                  <h3>Seleccion de hora </h3>
                </label>

                <!---CONSULTAR EN BD LAS HORAS LIBRES POR MEDICO Y DIA-->
                <div name="title" id="date_click" value="" class="date_click form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">

                  <input type="text" name="title" id="dat_click" value="" class="date_click form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" hidden>


                  <?php
                  $cajon = array();
                  $citas = "select *  from citas where fk_medico ='$fk_medico'";
                  $resultado_01 = mysqli_query($con, $citas);


                  while ($fila1 = mysqli_fetch_row($resultado_01)) {
                    $hora = $fila1[3]; //hora
                    
                    $cita_calendario = $fila1[4]; //fecha

                    array_push($cajon, [$cita_calendario, $hora]);
                    
                  }
                  $contador = count($cajon);
                  //var_dump($cajon);
                  for ($i = 0; $i < count($cajon); $i++) {

                    echo ' <input type="text" name="verificar_fecha" id="verificar_fecha' . $i . '" value="' . $cajon[$i][0] . '" class="date_click form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"  hidden="true">';
                    echo ' <input type="text" name="verificar_hora"  id="verificar_hora' . $i . '" value="' . $cajon[$i][1] . '" class="date_click form-control text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" hidden="true" >';
                  }




                  ?>

                  <input type="text" id="contador" value="<?php echo $contador ?> " hidden>




                  <select class="col-md-12" name="hora" id="hora">Seleccione hora

                    <option class="" value="" id="" disabled selected>horas</option>
                    <option class="" id="h1" value="09:00">09:00</option>
                    <option class="" id="h2" value="10:00">10:00</option>
                    <option class="" id="h3" value="11:00">11:00</option>
                    <option class="" id="h4" value="12:00">12:00</option>
                    <option class="" id="h5" value="13:00">13:00</option>
                  </select>

                </div>
              </div>
              <!--FIN HORAS-->



              <div class="form-row">
                <!--se puede quitar  desde aqui
            <div class="form-group col-md-6">
              <label>Fecha de fin:</label>

              <div class="input-group" data-autoclose="true">
                <input type="date" id="FechaFin" value="" class="form-control" />
              </div>
            </div>
            <div class="form-group col-md-6" id="TituloHoraFin">
              <label>Hora de fin:</label>

              <div class="input-group clockpicker" data-autoclose="true">
                <input type="text" id="HoraFin" value="" class="form-control" autocomplete="off" />
              </div>
            </div>
          </div>-->
                <!--se puede quitar hasta aqui solo es el final del evento-->

                <div class="form-group">
                  <label>Descripción:</label>
                  <textarea id="texto" name="texto" rows="2" class="form-control col-8" placeholder="Introduzca motivo de la consulta"></textarea>
                </div>

                <!--se puede quitar  desde aqui
            <label>Color de fondo:</label>
            <input type="color" value="#3788D8" id="ColorFondo" class="form-control" style="height:36px;">
          </div>
          <div class="form-group">
            <label>Color de texto:</label>
            <input type="color" value="#ffffff" id="ColorTexto" class="form-control" style="height:36px;">
          </div>
        </div>
        se puede quitar hasta aqui solo es el final del evento-->


                <!--
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>-->
                <div class="form-group row">
                  <!-- <div class="modal-footer row">
                    ZONA BOTONOES-->
                  <!--<button type="button" id="btnagregar" class="btn btn-success  col-5">Agregar</button>-->
                  <div class="col-6">
                  <button type="button" id="btnagregar" class="btn btn-success btn-circle btn-xl"><i class="fa fa-check"></i>  </button>
                  </div>
                  <!--NO SE PUEDE MODIFICAR CITAS, HAY QUE -->
                  <div class="col-6">
                  <button type="button" id="btncancelar" class="btn btn-danger btn-circle btn-xl"><i class="fa fa-times"></i> </button>
                  </div>
                 <!-- <button type="button" id="btncancelar" class="btn btn-danger  col-5" data-dismiss="modal ">Cancelar</button>-->

                </div>

              </div>
            </div>
          </div>
        </div>
    </div>
    </form>


    <!-- Vendor JS Files -->

    <!-- Vendor JS Files 
  <script src="../Medilab/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../Medilab/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../Medilab/assets/vendor/php-email-form/validate.js"></script>
  <script src="../Medilab/assets/vendor/purecounter/purecounter.js"></script>
  <script src="../Medilab/assets/vendor/swiper/swiper-bundle.min.js"></script>-->

    <!-- Template Main JS File -->
    <script src="../../vista/header/Medilab/assets/js/main.js"></script>


    <!-- Template Main JS File 
    <script src="../../vista/header/Medilab/assets/js/main.js"></script>-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>