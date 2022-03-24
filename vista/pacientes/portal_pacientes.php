<?php

?>

<body class="">
  <?php

  ?>
  <div class="hold-transition sidebar-mini ">
    <?php

    session_start();

    if (empty($_SESSION['paciente'])) { //si contiene datos, muestra bienvenida

      header("Location:login_pacientes.php");
    }

    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
      <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
      <!-- Favicons

      <link href="../header/Medilab/assets/img/favicon.png" rel="icon">
      <link href="../header/Medilab/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!--LIBRERIAS NUEVA PARA AVISOS-->
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <!--  <link href="../header/Medilab/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


      <!-- Template Main CSS File -->
      <link href="../header/Medilab/assets/css/style.css" rel="stylesheet">
      <link href="css/styles.css" rel="stylesheet">

    </head>

    <body>

    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-between">
          <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope"></i> <a href="">centroonline@gmail.com</a>
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
         

          <nav id="navbar" class="navbar order-last order-lg-0">
            
          </nav>
             

          <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">LLama</span> Solicita tu cita</a>

        </div>
      </header><!-- End Header -->
   
   
  
      <div class="container">


        <section id="services" class="services">

          <div class="section-title text-white">
            <h2 class="text-white" >Portal del paciente</h2>
            <p></p>
          </div>
        </section>

        <div class="container">

          <div class="">
            <!-- Content Header (Page header) -->
            <?php
            require("/wamp64/www/PROYECTO_FINAL/controlador/control_citas_pacientes.php");
            //var_dump($_SESSION); ?>
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                

                    <!-- MOSTRAR INFORMACION DEL PACIENTE Y SU MEDICO -->
                   
                    <div>
                  <b>Paciente :</b><h3 class="paci"><?php echo $_SESSION['paciente1']; ?></h3>
                  <b>Direccion :</b><h3 class="paci"><?php echo $_SESSION['paciente2']; ?></h3>
                  <b>telefono :</b><h3 class="paci"><?php echo $_SESSION['paciente3']; ?></h3>
                  <b>email :</b>
                  
                   <h3 class="paci "><?php echo $_SESSION['paciente5']; ?></h3>
                   <b>Doctor asingando</b>
                               <h3 class="paci"> <?php echo $_SESSION['medico']; ?>
                                <a  class="float-right btn-tool"><i class="bi bi-person-square"></i></a></h3>
                                <span class="text-white">Telefono : <?php echo $_SESSION['medicoTLF']; ?></span>
                                <span  class="text-white">Email : <?php echo $_SESSION['medicoEMAIL']; ?></span>
                 </div>
            
              

                  <?php 
                  
                    if($_SESSION['hay_citas']){//si hay citas se muestran Y BOTON CANCELA
                      ?>
                      
                      
                        <form action="../../controlador/borrar_cita_paciente.php" method="POST">
                          <input  type="text" name="" id="cita" value="<?php echo $_SESSION['cita3']; ?> " hidden>
                          <input type="text" name="" id="cita1" value="<?php echo $_SESSION['cita4']; ?> " hidden>
                          <input type="text" name="" id="cita1" value="<?php echo $_SESSION['paciente0']; ?> " hidden>
                        
                          <button  id="cancela_cita" type="submit" class=" boton alert alert-primary col-12  " name="anula_paciente" value="<?php echo $_SESSION['paciente0']; ?> ">
                          Anular cita  <p id="describir_cancelar">Cita fecha :<?php echo $_SESSION['cita4']; ?> hora : <?php echo $_SESSION['cita3']; ?>  </p>
                        </button>
                        </form>
                        <form action="" method="POST">
                         
    
                        </form>
                      
                 <?php
                    }else{// si no hay citas mostramos para BOTON citar

                      ?>
                         <form action="../pacientes/calendario/calendario/index.php" method="POST">
                      <!--<div class="alert alert-primary col-12" id="citas" role="alert" >-->
                      <p></p>
                   
                        <input  id="pedir_cita" type="submit" class=" alert  col-12" value="PEDIR CITA">
                        <input type="text"  name="citar" class="bg-primary" value="<?php echo $_SESSION['paciente0']//fk_paciente; ?> "hidden>
                        <input type="text"  name="citar" class="bg-primary" value="<?php echo $_SESSION['paciente4']//fk_medico; ?>" hidden>
                        <input type="text" name="" id="cita1" value="<?php echo $_SESSION['paciente1'];//nombre_paciente ?> " hidden>
                     

                      <form action="" method="POST">
                        <p id=""></p>
  
  
                      </form>
                  
                    </form>
                 <?php
                    }
                  ?>

                
                 
                 <!--BOTON CONULTAR HISTORIAL-->
                  <form   class="" role="alert" action="../../controlador/historial_consultar.php" method="POST">
                        <input id="consulta_historial" type="submit" class=" alert alert-danger col-12" value="HISTORIAL">
                        <input type="text"  name="paciente" class="bg-primary " value="<?php echo $_SESSION['paciente0']//fk_paciente; ?>" hidden>
                        <input type="text"  name="citar" class="bg-primary" value="<?php echo $_SESSION['paciente4']//fk_medico; ?>" hidden>
                        <input type="text" name="" id="cita1" value="<?php echo $_SESSION['paciente1'];//nombre_paciente ?> " hidden>
                      </form>
                  
                   <!--BOTON CONULTAR CERRAR SESION-->
                  <a id="cerrar_sesion_paciente" class="alert alert-dark col-12 "  href="http://localhost/PROYECTO_FINAL/controlador/paciente_logout.php"> CERRAR SESION</a>


                 
            </section>
           
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
          <li><i class="bx bx-chevron-right"></i> <a href="#"></a></li>
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
      <script src="js/index.js"></script>
    </body>

    </html>

    <?php

    ?>