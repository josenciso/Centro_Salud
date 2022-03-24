<?php

//PARA BORRAR  NO USADO
//include 'conectar.php';
session_start();
if (empty($_SESSION['administrativo'])) { //SOLO ACCESO SANITARIO
    header("Location: ../vista/personal_sanitario/login_personal_sanitario.php");//*******CAMBIO  */
}



?>
 <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <!-- Favicons -->
    
    <link href="..../../vista/header/Medilab/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

   

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--LIBRERIAS NUEVA PARA AVISOS-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!--  <link href="../header/Medilab/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <!--
    <link href="../header/Medilab/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../header/Medilab/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../header/Medilab/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../header/Medilab/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../header/Medilab/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../header/Medilab/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->

    <!-- Template Main CSS File-->
    <link href="../vista/header/Medilab/assets/css/style.css" rel="stylesheet"> 
    <link href="../controlador/css/styles.css" rel="stylesheet">
    <title>Insertar personal</title>
  </head>

<body><p></p>
<?php

include('../vista/header/Medilab/top_bar.php');
?>

<p></p>
<div class="col-1 services">
            <a href="../personal_sanitario/gestionar_personal.php">
                <div id=flecha_back>
                    <div class="icon"><i class="bi bi-arrow-left-circle"></i></div>

                </div>
            </a>
        </div>
    <div class="container" id="formulario">
        <?php

        ?>
        <div class="form-check" id="">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Medicos
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                Administrativos
            </label>
        </div>
        <?php


        ?>

        <form action="php_insertar_personal.php" method="post" id="insertar">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <!-- NUMERO PERSONAL-->
                        <label for="num" class="control-label"></label>
                        <input type="text" class="form-control alfa" id="num" name="num" placeholder=""><span class="charly" id="num_error"> </span>
                        <input type="text" class=" ocultar form-control alfa" id="rol" name="rol" placeholder="">

                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <!-- nombre -->
                        <label for="nombre" class="control-label">Nombre y apellidos</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y apellidos"><span class="charly" id="nombre_error"> </span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <!-- telefono-->
                        <label for="telefono" class="control-label">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="969000000"><span class="charly" id="telefono_error"> </span>
                    </div>
                </div>

            </div>
            <div class="row">


            </div>
            <div class=row>
                <div class="col-3">
                    <div class="form-group">
                        <!-- pass-->
                        <label for="contraseña" class="control-label">Contraseña</label>
                        <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="......."><span class="charly" id="contraseña_error"> </span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <!-- pass-->
                        <label for="contrasña" class="control-label">Contraseña</label>
                        <input type="password" class="form-control" id="contraseña_1" name="contraseña_1" placeholder="......."><span class="charly" id="contraseña_1_error"> </span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <!-- email -->
                        <label for="email" class="control-label">email </label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="abc@pepe.com"><span class="charly" id="email_error"> </span>
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="col-6">




                </div>
            </div>
            <div class="row">
                <div class="col-3"> </div>
                <div class="col-3">

                    <label for="date" class="control-label"></label>
                    <div class="form-group">
                        <!-- Enviar -->
                        <button type="submit" id="in" name="enviar" class=" col-12 btn btn-warning" disabled>Pulse para Insertar</button><span class="charly" id="enviar_error"> </span>
                    </div>
                </div>
            </div>


            <div class=row>
                <div class="col-3"> </div>
                <div class="col-3"> <button id="verifica" type="button" class="btn btn-primary col-12">Verificar Formulario</button>

                </div>
            </div>
        </form>
    </div>
    </div>
    <a>
        <section id="services" class="services ">
          <div class="col-1 " data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Disabled popover">
            <a id="cierre" href="logout.php">
              <div id=flecha_back>
                <div class="text-black">Cierre de sesion</div>
                <div class="icon bg-danger"><i class="bi bi-x-circle-fill bg-danger"> </i></div>

              </div>
            </a>
          </div>

        </section>

      </a>
    <?php
   
?>
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







<!-- Template Main JS File
<script src="../Medilab/assets/js/main.js"></script>-->

<script src="../vista/header/Medilab/assets/js/main.js"></script> 

    <script src="js/nuevo_personal.js"></script>
</body>

</html>
<?php
