<?php

include('../../modelo/Paciente.php');
//include 'conectar.php';
session_start();
if (empty($_SESSION['administrativo'])) { //SOLO ACCESO SANITARIO
    header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/login_personal_sanitario.php");
}


include('../header/Medilab/header.php');
?>
<link href="css/styles.css" rel="stylesheet">




<body>


    <p></p>
    <?php include('../header/Medilab/top_bar.php');
    //var_dump($_SESSION);

    if (!empty($_SESSION['existe_dni']))
        echo '<span class="" id="existe_dni">1</span>';
    ?><div class="container inicio_personal">
        <?php
        include("informacion.php");
        ?></div>
    <div class="col-1 services">
        <a href="../personal_sanitario/gestionar_pacientes.php">
            <div id=flecha_back>
                <div class="icon"><i class="bi bi-arrow-left-circle"></i></div>

            </div>
        </a>
    </div>

    <div class="container  ">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2>ALTAS DE NUEVOS PACIENTES</h2>
                    <p>Rellena cuidadosamente cada campo, todos son requeridos, suerte</p>
                </div>

                <div class="row">



                </div>

            </div>
        </section><!-- End Services Section -->

        <div class="row ">
            <div class="col-1"></div>
            <form action="../../controlador/php_insertar_pacientes.php" class="col-9" method="post" id="insertar">
                <div class="row ">
                    <div class="col-4">
                        <div class="form-group ">
                            <!-- DNI-->
                            <label for="dni " class="control-label">DNI</label>
                            <input id="dni" type="text" class="form-control alfa" id="dni" name="dni" placeholder="11111111N"><span class="charly" id="dni_error"> </span>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <!-- nombre -->
                            <label for="nombre" class="control-label">Nombre y apellidos</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y apellidos"><span class="charly" id="nombre_error"> </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <!-- telefono-->
                            <label for="telefono" class="control-label">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="969000000"><span class="charly" id="telefono_error"> </span>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <!-- DIRECCION -->
                            <label for="street2_id" class="control-label">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion"><span class="charly" id="direccion_error"> </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <!-- CIUDAD-->
                            <label for="city_id" class="control-label">Ciudad</label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Murcia"><span class="charly" id="ciudad_error"> </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <!-- MEDICOS -->
                            <label for="medico" class="control-label">Seleccione Médico</label>
                            <?php $query = "SELECT * FROM medicos";
                            $link = conexion();
                            $resu = mysqli_query($link, $query);
                            ?>
                            <select type="number" name="medico" id="medico" class="form-control">
                                <option type="number" value=>Seleccione Doctor</option>
                                <?php
                                while ($fila = mysqli_fetch_row($resu)) {
                                ?>
                                    <option type="number" required value=<?php echo $fila[0] ?>> <?php echo $fila[1] ?> </option>
                                <?php


                                }
                                ?>
                            </select>

                        </div>
                    </div>
                </div>
                <div class=row>



                    <div class="col-4">
                        <div class="form-group">
                            <!-- pass-->
                            <label for="contraseña" class="control-label">Contraseña</label>
                            <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="......."><span class="charly" id="contraseña_error"> </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <!-- pass-->
                            <label for="contrasña" class="control-label">Contraseña</label>
                            <input type="password" class="form-control" id="contraseña_1" name="contraseña_1" placeholder="......."><span class="charly" id="contraseña_1_error"> </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <!-- email -->
                            <label for="email" class="control-label">email </label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="abc@pepe.com"><span class="charly" id="email_error"> </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <!-- email -->
                            <label for="date" class="control-label">fecha Nacimiento</label>
                            <input type="date" class="form-control" onkeydown="return false" id="fecha" name="fecha" placeholder="1980/01/01"><span class="charly" id="fecha_error"> </span>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="date" class="control-label"></label>
                        <div class=""> <button id="verifica" type="button" class="btn btn-primary col-12 rounded-1">Verificar Formulario</button>

                        </div>



                    </div>
                    <div class="row">
                        <div class="col-3"> </div>
                        <div class="col-6">

                            <label for="date" class="control-label"></label>
                            <div class="form-group">
                                <!-- Enviar -->
                                <button type="submit" id="in" name="enviar" class=" col-12 btn btn-danger" disabled>Pulse para introducir al paciente</button><span class="charly" id="enviar_error"> </span>
                            </div>
                        </div>

                    </div>
                    <div class=row>
                        <div class="col-3"> </div>


                    </div>
                </div>



            </form>
            <div class="col-1"></div>
        </div>
    </div>
    </div>
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
    <?php


    include('../header/Medilab/footer.php'); ?>
    <script src="js/insertar_pacientes.js"></script>
    <script src="js/hora.js"></script>
</body>

</html>
<?php
