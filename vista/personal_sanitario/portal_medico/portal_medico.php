<?php
include_once('../../../controlador/control_citas_medicos.php'); //trae info del medico, la sesion viene de aqui
include_once('../../../modelo/años.php'); //CALCULA LA EDAD EN AÑOS
//session_start();

if (empty($_SESSION['medico'])) { //Solo tiene acceso el administrativo. lo demas fuera

    header("Location: /PROYECTO_FINAL");
}
//header("location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/login_personal_sanitario.php");



//var_dump($_SESSION);





?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <!-- Favicons -->

    <link href="../../header/Medilab/assets/img/favicon.png" rel="icon">
    <link href="../../header/Medilab/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--LIBRERIAS NUEVA PARA AVISOS-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!--  <link href="../header/Medilab/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="../../header/Medilab/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../header/Medilab/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../header/Medilab/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../../header/Medilab/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../header/Medilab/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../header/Medilab/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->

    <!-- Template Main CSS File -->
    <link href="../../header/Medilab/assets/css/style.css" rel="stylesheet">

    <title>Portal Medico</title>
</head>

<body>


    <p></p>
    <?php





    include_once('../../header/Medilab/top_bar.php');

    //var_dump($_SESSION);
    ?>
    <div class="container inicio_personal">
        <!--Mostrar info y reloj-->
        <?php
        include("../informacion.php");
        ?>

    </div>
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2 class="text-white">Portal medico</h2>
                <p class="text-white">Gestion de citas pacientes</p>
            </div>
    </section>

    <?php
    //mostrando datos del doctor/doctora--s
    //
    // echo 'Bienvenido a su pagina Doctor/ra ' . $_SESSION['nombre'];
    // echo "</br></h2>";
    // echo "<h5>";
    // echo "Su numero de telefono : " . $_SESSION['telefono'];
    //  echo "</br>";
    //  echo "Numero de colegiado :" . $_SESSION['colegiado'];
    // echo "</h5";
    //  echo "</br>";
    ?>

    </div>
    </div>

    <div class='row'>
        <div class='col-8 mx-auto'>
            <h2 class="text-white">CITAS </h2>
            <?php
            $dia = date('Y-m-d'); //dia actual

            ?>



            <div class="row">


                <div class="col-6">
                    <?php
                    $num = 0;
                    $fk = $_SESSION['colegiado'];
                    $consulta_citas = "SELECT * FROM citas WHERE fk_medico=" . $fk . " and fecha_cita='" . $dia . "' order by hora"; //consulta, si hay citas con fecha igual a hoy

                    $result_citas = mysqli_query($link, $consulta_citas); //mostrando citas, si es que las tiene ordenadas por horas

                    while ($citas = mysqli_fetch_row($result_citas)) {
                        //echo $num;
                        $num++;



                        // $_SESSION['cod_id'] = $citas[0];
                        // $_SESSION['fk_paciente'] = $citas[1];
                        // $_SESSION['fecha_cita'] = $citas[4];
                        // $_SESSION['hora'] = $citas[3];
                    ?>
                        <?php
                        // if ($_SESSION['fecha_cita']==$dia) {
                        //
                        ?>
                        <!--
                           A traves de un fomr enviamos datos del paciente, 
                       -->
                        <div class="">
                            <form action="gestionar_cita.php" method="POST">
                                <button class='p-3 list-group-item list-group-item-action flex-column align-items-start mb-4 rounded-3'>
                                    <div class='d-flex w-100 justify-content-between mb-4'>
                                        <h4 class='mb-3'><?php ?>
                                        </h4>
                                        <small class='fecha'>
                                            <?php  ?>
                                        </small>
                                    </div>
                                    <p class='mb-0'>
                                        <?php //echo $citas[1]; ?>
                                        <?php echo $citas[4]; ?>
                                        <?php echo $citas[3]; ?>


                                    </p>
                                    <div class='py-3'>
                                        <?php
                                        $consulta_paciente = "SELECT * FROM pacientes WHERE dni='" . $citas[1] . "'"; //recuperando pacientes

                                        $result_paciente = mysqli_query($link, $consulta_paciente);

                                        if ($paciente = mysqli_fetch_row($result_paciente)) {
                                            //$_SESSION['nombre_pc'] =$paciente[1];
                                            //$_SESSION['telefono_pc'] = $paciente[2];

                                            $año = verFecha($paciente[7]);
                                            $año1 = calcular_edad($año)
                                        ?>
                                            <input type="text" name="fk_paciente" value="<?php echo $paciente[0]; ?>" hidden="true">
                                            <!--FK_PACIENTE-->
                                            <input type="text" name="fecha" value="<?php echo $citas[4]; ?>" hidden="true">
                                            <!--FECHA_CITA-->
                                            <input type="text" name="nombre" value="<?php echo $paciente[1]; ?>" hidden="true">
                                            <!--nombre-->
                                            <input type="text" name="telefono" value="<?php echo $paciente[3]; ?>" hidden="true">
                                            <!--telefono-->
                                            <input type="text" name="edad" value="<?php echo $año1; ?>" hidden="true">
                                            <!--edad-->
                                            <input type="text" name="motivo" value="<?php echo $citas[5]; ?>" hidden="true">
                                            <!--edad-->


                                            <p>Nombre del paciente: <?php echo $paciente[1]; ?></p>
                                            <p>Telefono: <?php echo $paciente[3]; ?> </p>
                                            <p>Email: <?php echo $paciente[6]; ?> </p>
                                            <p>Fecha nacimiento: <?php echo verFecha($paciente[7]);
                                                                    echo "<p> Edad:  $año1</p>"; ?> </p>
                                            <p>Motivo consulta: <?php echo $citas[5]; ?> </p>
                                        <?php
                                        } ?>

                                    </div>
                                </button>
                            </form>
                        </div>
                    <?php
                        //}
                    }
                    if ($num == 0) {
                        echo "<h2 class='text-white'> Sin citas para dia de hoy</h2>";
                    }
                    ?>
                </div>



            </div>

        </div>
        <?php

        ?>

    </div>
    <?php
    ?>

    <div class="col-1 services" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Disabled popover">
        <a id="cierre" href="../../../controlador/logout.php">
            <div id=flecha_back>

                <div class="icon bg-danger"><i class="bi bi-x-circle-fill bg-danger"> </i></div>

            </div>
        </a>
    </div>

    </section>
    <!--   <a href="../../../controlador/logout.php">cerrar sesion</a>
        ======= Footer ======= -->
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
    </footer><!-- fin Footer -->

    <div id=""></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>




    <div class="loading" id="loader"><img alt="loading">
      </div>

    <script src="../../header/Medilab/assets/js/main.js"></script>
    <script src="../js/loader.js"></script>





</body>

</html>


<?php


// } else {
//    header("Location:../personal_sanitario/login_personal_sanitario.php");

?>