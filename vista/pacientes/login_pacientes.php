<?php
session_start();

if (!empty($_SESSION['paciente'])) { //si ya existen la sesion

  header("Location: portal_pacientes.php"); //debe de ir al controlador


} else {
?>

  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <!-- Favicons -->

    <link href="../header/Medilab/assets/img/favicon.png" rel="icon">
    <link href="../header/Medilab/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--LIBRERIAS NUEVA PARA AVISOS-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!--  <link href="../header/Medilab/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="../header/Medilab/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../header/Medilab/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../header/Medilab/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../header/Medilab/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../header/Medilab/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../header/Medilab/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->

    <!-- Template Main CSS File -->
    <link href="../header/Medilab/assets/css/style.css" rel="stylesheet">


  </head>


  <body class="">
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
      <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">centroonline@gmail.com</a>
          <i class="bi bi-phone"></i> 968 366 788
        </div>
        <div class="d-none d-lg-flex social-links align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
      </div>
    </div>
    <p></p>

    <!-- ======= Header ======= -->

    <header id="header" class="fixed">
      <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="index.html">Tu centro de Salud</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0 text-decoration-none">
        <ul>
            <li><a class="" href="/PROYECTO_FINAL">Voler Inicio</a></li>
            </ul>

            <span shref="" class="appointment-btn scrollto"><span class="d-none d-md-inline">LLama</span> Solicita tu cita</span>

      </div>
    </header><!-- End Header -->
    <?php



    ?><section id="services" class="services">
      <div class="container">

        <div class="section-title text-white" id="">
          <h2 class="section-title text-white">Acceso pacientes </h2>
          <p>Tu portal medico </p>
        </div>
    </section>


  <!--Se gestiona la entrada de teclado a traves de ../pacientes/js/inicio_pacientes.js evitando insertar formato diferente-->
    <div class="container">
      <div class="row justify-content-center">
        <div class="card col-6 cartas_inicio text-center" id="paciente_inicio" style="width:400px">
          <img class="card-img-top d-none d-sm-block" src="../../img/personal/avatar1.png" alt="Foto paciente">
          <div class="card-body">
            <h4 class="card-title text-white">ACCESO PACIENTES</h4>
            <p class="card-text">
            <form action="../../controlador/control_pacientes.php" method="POST">
              <input id="dni" class="entrada_personal" type="text" name="dni" placeholder="Su usuario" required>
              <input id="pass" class="entrada_personal" type="password" name="pass" placeholder="Su contraseña" required>
              </p>
              <input type="submit" name="enviar" id="enviar" class="entrada_personalenviar">
            </form>

          </div>
        </div>
      </div>
    </div>
    


            <!-- ======= Footer ======= -->
            <footer id="footer">

              <div class="footer-top">
                <div class="container">
                  <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                      <h3>Tu portal Sanitario</h3>
                      <p>
                        30330 <br>
                        Murcia Calle <br>
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

                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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


            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

            <!-- Vendor JS Files
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script> -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
            <!-- Template Main JS File -->
            <script src="/PROYECTO_FINAL/vista/header/Medilab/assets/js/main.js"></script>
            <script src="../pacientes/js/inicio_pacientes.js"></script>
  </body>

  </html>

<?php

}
?>