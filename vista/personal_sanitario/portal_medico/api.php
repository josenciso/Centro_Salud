<?php
session_start();
//var_dump($_POST);
echo "<br>";
if (isset($_POST['enviar'])) {
    $_SESSION['diagnostico'] = $_POST['diagnostico'];
}

//var_dump(($_SESSION));
if (!empty($_SESSION['medico'])) { //si ya existen la sesion


} else {
    header("location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/login_personal_sanitario.php");
}

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link href="../../header/Medilab/assets/img/favicon.png" rel="icon">
    <link href="../../header/Medilab/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
    <link href="../css/styles.css" rel="stylesheet">


    <title>Portal Medico</title>
</head>

<body>


    <?php
    include('../../header/Medilab/top_bar.php');
    ?>

    <p></p>
    <div class="container inicio_personal"><?php
                                            include("../informacion.php");
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
                <p>Seleccion de medicamento </p>
            </div>
    </section>


    <!--Formulario donde insertar medicamento, dosis y cantidad al dia controlado por javascrip 
    los medicamentos son recuperados de la api https://www.aemps.gob.es/apps/cima/docs/CIMA_REST_API.pdf -->

    <div class="container" id="">
        <form action="../../../controlador/insertar_historial.php" method="POST" id="form">

            <input type="text" name="fk_p" value="<?php echo $_SESSION['paciente_cita'] ?>" id="paci_" hidden>

            <input type="text" name="fk_m" value="<?php echo $_SESSION['colegiado'] ?>" id="fk_medico" hidden>

            <input type="text" class="form-control" name="med" value="" id="med" readonly>

            <input type="text" name="fecha_" value="<?php echo $_SESSION['fecha_cita1'] ?>" id="" hidden>

            <input type="text" name="motivo" value="<?php echo $_SESSION['motivo'] ?>" id="" hidden>
            diagnostico
            <input type="text" class="form-control" id="tex_" name="diagnostico" value="<?php echo  $_SESSION['diagnostico'] ?>">
            Posologia
            <select name="unidades" class="form-control" name="unidades" id="unidades">
                <option value=></option>
                <option value="1 unidad">1 unidad</option>
                <option value="2 unidades">2 unidades</option>
                <option value="3 unidades">3 unidades</option>
            </select>


            <select name="horas" class="form-control" name="horas" id="horas">
                <option value=></option>
                <option value="4 horas">4 horas</option>
                <option value="8 horas">8 horas</option>
                <option value="12 horas">12 horas</option>
                <option value="24 horas">24 horas</option>
            </select>
            <input type="submit" class="form-control bg-danger" name="" id="enviar" disabled>

            <hr>




            <form action="">

                <label for="medicamento">buscar medicamentos</label>
                <input id="medicamento" type="text" class="col-12">



            </form>
            <button id="boton" class="btn-orange">Consultar en la api</button>
            <div id="medi">

            </div>
            <hr>
            <form action="api.php" method="get">
                <input type="submit" value="Nueva consulta api" class="btn bg-warning">
            </form>
            <table class="table table-striped col-7">
                <thead>
                    <tr>

                        <th scope="col">NOMBRE</th>
                        <th scope="col">RECETA</th>
                        <th scope="col">VIA DE ADMINISTRACION</th>
                        <th scope="col">FOTO</th>
                        <!--<th scope="col">USUARIO</th>
    <th scope="col">EMAIL</th>
    <th scope="col">MEDICO</th>
    <th scope="col">MOD/CIT</th>-->
                    </tr>
                </thead>
                <tbody id="tbody">




                </tbody>
        </form>
        </table>
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

    <!-- Vendor JS Files -->

    <!-- Vendor JS Files 
  <script src="../Medilab/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../Medilab/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../Medilab/assets/vendor/php-email-form/validate.js"></script>
  <script src="../Medilab/assets/vendor/purecounter/purecounter.js"></script>
  <script src="../Medilab/assets/vendor/swiper/swiper-bundle.min.js"></script>-->





    <!-- Template Main JS File-->
    <script src="../../header/Medilab/assets/js/main.js"></script>





</body>

</html>


<script src="API/medicamentos.js"></script>
<script src="../js/loader.js"></script>

</body>

</html>