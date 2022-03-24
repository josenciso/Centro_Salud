<?php
session_start();

if (empty($_SESSION['administrativo'])) { //Solo tiene acceso el administrativo. lo demas fuera

  header("Location: login_personal_sanitario.php");
}

include("../header/Medilab/header.php"); ?>
<!--<link rel="stylesheet" href="../../vista/css/styles_vista.css">-->

<body id="login_per">
  <p></p>
  <?php
  include("../header/Medilab/top_bar.php") ;
  ?> <div class="container inicio_personal"><?php
  include("informacion.php");
  ?></div>
  <body class="portal_administrativo">


    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2 class="text-white">Portal admnistrativo </h2>
          <p class="text-white">Dede aqui puede gestionar paciences y personal sanitario</p>
        </div>
    </section>


    <?php

    ?>
<div class="loading" id="loader"><img alt="loading">
      </div>
    <div class="container">
      <div class="row ">


        <!--
        <section id="services" class="services col-12 ">


          <div class="align-items-stretch  card  cartas_inicio text-center col-sm-6 col-md-5 col-lg-6 ">

            <a href="gestionar_pacientes.php">
              <div class="icon-box">
                <div class="icon"><i class="bi  bi-file-person"></i></div>
                <h4>GESTION DE PACIENTES</h4>
                <p>Pagina dedicada para los pacientes</p>
              </div>
            </a>

          </div>

          <div class="align-items-stretch  card  cartas_inicio text-center  col-sm-6 col-md-5 col-lg-6">

            <a href="gestionar_personal.php">
              <div class="icon-box">
                <div class="icon"><i class="bi  bi-file-person"></i></div>
                <h4>GESTION PERSONAL</h4>
                <p>Pagina dedicada al personal del centro</p>
              </div>
            </a>

          </div>

        </section>


      </div>-->


        <div class="card col-6 cartas_inicio text-center" style="width:400px">
          <img class="card-img-top  rounded-10" src="../../img/paciente.jpg" alt="Card image">
          <div class="card-body">
            <h4 class="card-title text-white">Pacientes</h4>
            <p class="card-text">
              <a href="gestionar_pacientes.php" class=" col-12 btn btn-primary rounded-pill">IR </a>
            </p>

          </div>
        </div>
        <div class="col-4"></div>
        <div class="card col-6 cartas_inicio text-center" style="width:400px">
          <img class="card-img-top rounded-10" src="../../img/doctors/doctors-4.jpg" alt="Card image">
          <div class="card-body">
            <h4 class="card-title text-white">Personal sanitario</h4>
            <p class="card-text">
              <a href="gestionar_personal.php" class=" col-12 btn btn-warning rounded-pill">IR</a>
            </p>

          </div>
        </div>
      </div>
    </div>


    <a href=""></a>
    <i class=""></i>
    <div class="2">
      <a>
        <section id="services" class="services ">
          <div class="col-1 " data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Disabled popover">
            <a id="cierre" href="../../controlador/logout.php">
              <div id=cierre_sesion>
                <div class="icon"><i class="bi bi-x-circle-fill "> </i></div>

              </div>
            </a>
          </div>

        </section>

      </a>

    </div>


    <?php



    include("../header/Medilab/footer.php"); ?>
    <script src="../../vista/personal_sanitario/js/hora.js"></script>
    <script src="../../vista/personal_sanitario/js/loader.js"></script>
    <?php

    ?>
  </body>

  </html>