<?php
session_start();
//var_dump($_SESSION);
if (!empty($_SESSION['medico'])) { //si ya existen la sesion


} else {
  header("location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/login_personal_sanitario.php");
}
if (!empty($_POST['fk_paciente'])) {
  $_SESSION['paciente_cita'] = $_POST['fk_paciente'];
  $_SESSION['fecha_cita1'] = $_POST['fecha'];
  $_SESSION['nombre_cita_paciente'] = $_POST['nombre'];
  $_SESSION['telefono_cita_1'] = $_POST['telefono'];
  $_SESSION['edad_paciente'] = $_POST['edad'];
  $_SESSION['motivo'] = $_POST['motivo'];
} else {
}
//echo "<hr>";

//var_dump($_POST);


//include_once('../controlador/control_citas_medicos.php'); vemos si no tiro de aqui 

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- Favicons -->


  <link href="../../header/Medilab/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--LIBRERIAS NUEVA PARA AVISOS-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!--  <link href="../header/Medilab/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- <link href="../../header/Medilab/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../header/Medilab/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../header/Medilab/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../../header/Medilab/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../header/Medilab/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../header/Medilab/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->

  <!-- Template Main CSS File -->
  <link href="../../header/Medilab/assets/css/style.css" rel="stylesheet">
  <link href="../css/styles.css" rel="stylesheet">
  <title>Portal Medico</title>
</head>

<body>
  <p>

  </p>
  <?php
  include('../../header/Medilab/top_bar.php'); //include("../informacion.php");
  ?>
  <p></p>
  <div class="container inicio_personal"><?php
                                          //include("../informacion.php");
                                          ?></div>
   <div class="col-1 services">
        <a href="portal_medico.php">
            <div id=flecha_back>
                <div class="icon"><i class="bi bi-arrow-left-circle"></i></div>

            </div>
        </a>
    </div>
  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Portal medico</h2>
        <p>Tratamiendo paciente</p>
      </div>
  </section>


  <div class="container">
    <!--Formulario donde estan los datos del pacientes, no modificables, se tiene que seleccionar si llevará medicamento o solo tratamiento-->
    <form action="api.php" method="post" role="form" class="" data-aos="" data-aos-delay="100" id="formulario">
      <div class="row">

        <div class="col-md-3 form-group">
          <label for="name"> Nombre del paciente</label>
          <input type="text" name="name" class="form-control" name="nombre" id="name" value="<?php echo $_POST['nombre']    ?>" disabled>
        </div>
        <div class="col-md-1 form-group mt-3 mt-md-0">
          <label for="name"> Edad</label>
          <input type="number" class="form-control" name="viejos" value="<?php echo $_POST['edad'] ?>" disabled>
        </div>
        <div class="col-md-2 form-group mt-3 mt-md-0">
          <label for="name"> telefono</label>
          <input type="tel" class="form-control" name="phone" id="telefono" value="<?php echo $_POST['telefono']    ?>" disabled>
        </div>
        <div class="col-md-2 form-group mt-3 mt-md-0">
          <label for="name"> motivo</label>
          <input type="text" class="form-control" name="motivo" id="motivo" value="<?php echo $_POST['motivo']    ?>" disabled>
        </div>

      </div>
      <div class="row">
        <div class="col-md-2 form-group mt-3">
          <input type="datetime" name="date" class="form-control datepicker" id="date" value="<?php echo $_POST['fecha']    ?>" disabled>

        </div>
        <div class="col-md-2 form-group mt-3">

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
            <label class="form-check-label" for="flexCheckDefault">
              Insertar receta

            </label>
          </div>
        </div>
        <p class="ok" id="p"> Si esta marcada, en la siguiente pantalla debera de introducir el medicamento</p>


        <div class=" col-12">
          <textarea class="form-control" id="tex_" name="diagnostico" rows="5" placeholder="Diagnostico"></textarea>

        </div>
        <div class=" col-12">
          <input type="submit" name="enviar" disabled id="jj" class="ko btn btn-danger col-12">
        </div>


    </form>

  </div>
  </div>
  <?php

  ?>

  </div>
  <!-- ======= Footer ======= -->

  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Tu portal </h3>
            <p>
              30330 <br>
              Murcia <br>
              España <br><br>
              <strong>Telefono:</strong> 968 366 788 <br>
              <strong>Email:</strong> centronline@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4> Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Como usar la pagina</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sobre nosotros</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Servicios</a></li>

            </ul>
          </div>



          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Tu centro de salud, ahora toda la gestion se realiza online.</h4>
            <p>Para cualquier incidencia detectada, contante con el administrador</p>

          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Enciso</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->

        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id=""></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <!-- Vendor JS Files 
  <script src="../Medilab/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../Medilab/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../Medilab/assets/vendor/php-email-form/validate.js"></script>
  <script src="../Medilab/assets/vendor/purecounter/purecounter.js"></script>
  <script src="../Medilab/assets/vendor/swiper/swiper-bundle.min.js"></script>-->





  <!-- Template Main JS File-->
  <script src="../../header/Medilab/assets/js/main.js"></script>







  <script src="Api/gestion.js"></script>
  <script src="../js/loader.js"></script>

</body>

</html>

<?php
