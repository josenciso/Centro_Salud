<?php
include('../../modelo/conectar.php');
session_start();
//var_dump($_SESSION);
if (empty($_SESSION['administrativo'])) {

    header("Location: login_personal_sanitario.php");
}

$conectar = conexion();
$personal = "SELECT  * FROM medicos";
$resultado = mysqli_query($conectar, $personal);
$contador = 0; //contar pacientes en acitvo por medico

include("../header/Medilab/header.php"); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/styles.css">

<body>

    <p></p>
    <?php
    include("../header/Medilab/top_bar.php");
    ?>
    <div class="container inicio_personal">
        <?php
        include("informacion.php");
        ?></div>
        <div class="col-1 services">
            <a href="gestionar_personal.php">
                <div id=flecha_back>
                    <div class="icon"><i class="bi bi-arrow-left-circle"></i></div>

                </div>
            </a>
        </div>

    <div class="container">


        <section id="services" class="services">

            <div class="section-title">
                <h2>GESTION DE PERSONAL DE SANITARIO</h2>
                <p></p>
            </div>
        </section>


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

        <form action="../../controlador/php_insertar_personal.php" method="post" id="insertar">
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
                        <label for="contrase??a" class="control-label">Contrase??a</label>
                        <input type="password" class="form-control" id="contrase??a" name="contrase??a" placeholder="......."><span class="charly" id="contrase??a_error"> </span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <!-- pass-->
                        <label for="contras??a" class="control-label">Contrase??a</label>
                        <input type="password" class="form-control" id="contrase??a_1" name="contrase??a_1" placeholder="......."><span class="charly" id="contrase??a_1_error"> </span>
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
            <a id="cierre" href="../../controlador/logout.php">
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
          Espa??a <br><br>
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







<!-- Template Main JS File-->
<!-- <script src="../Medilab/assets/js/main.js"></script> -->

<script src="../header/Medilab/assets/js/main.js"></script>

    <script src="js/nuevo_personal.js"></script>
    <script src="js/hora.js"></script>
</body>

</html>
<?php
