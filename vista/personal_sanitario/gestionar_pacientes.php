<?php

include('../../modelo/conectar.php');
session_start();
//var_dump($_SESSION);
if (empty($_SESSION['administrativo'])) {
    header("Location: login_personal_sanitario.php");
}

$conectar = conexion();
$pacientes = "SELECT  * FROM pacientes";
$resultado = mysqli_query($conectar, $pacientes);

include("../header/Medilab/header.php");


?>

<body>




    <p></p>
    <?php include("../header/Medilab/top_bar.php") ?>
    <div class="container inicio_personal">
        <?php
        include("informacion.php");
        ?>
        </div>

    <div class="col-1 services">
        <a href="../personal_sanitario/portal_administrativo.php">
            <div id=flecha_back>
                <div class="icon"><i class="bi bi-arrow-left-circle"></i></div>

            </div>
        </a>
    </div>

    </>
    <div class="loading" id="loader"><img alt="loading">
      </div>
    <div class="container-fluid">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2 class="text-white">GESTION DE PACIENTES</h2>
                    <p class="text-white">Aqui puede realizar desde insertar un nuevo paciente, realizar citas y modificaciones sobre pacientes</p>
                </div>

                <div class="row">









                </div>

            </div>
        </section>
        <!-- End Services Section -->


        <div class=row>


            <!--  <div class="col-3">
               <div class="col-lg-12 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0 services text-center">
                        <a href="insertar_pacientes.php">
                            <div class="icon-box-box justify-content-center">
                                <div class="icon"><i class="fas fa-hospital-user"></i></div>
                                <h4> Insertar nuevos pacientes</h4>
                                <p>Ingrese todos los datos</p>
                            </div>
                        </a>
                    
                    </div>-->
            <div class="insert col-3">
                <a href="insertar_pacientes.php">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-journal-plus"></i></div>
                        <h4 class="title text-white">Insertar </h4>
                        <p class="description text-white">Nuevos pacientes</p>
                    </div>
                </a>
            </div>









            <div class="col-3 roll-in-blurred-right-1">
                <div class="card text-white bg-primary mb-3 rounded-1" style="max-width: 18rem;">
                    <div class="card-header">CITAR</div>
                    <div class="card-body">
                        <h5 class="card-title">Boton citas</h5>
                        <p class="card-text">Agendar cita.</p>
                    </div>
                </div>
            </div>
            <div class="col-3 roll-in-blurred-right-2">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">ANULAR</div>
                    <div class="card-body">
                        <h5 class="card-title">Boton borrar</h5>
                        <p class="card-text">Borra la cita directamente.</p>
                    </div>
                </div>
            </div>
            <div class="col-3 roll-in-blurred-right-3">
                <div class="card text-white bg-warning mb-3 " style="max-width: 18rem;">
                    <div class="card-header">MODIFICAR</div>
                    <div class="card-body">
                        <h5 class="card-title">Boton modificar</h5>
                        <p class="card-text">Permite modificar al paciente.</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-11">

            <table class=" table table-hover table-responsive-lg">
                <thead>
                    <tr>
                        <th  scope="col bg-primary"></th>
                        <th  class="text-white"scope="col">DNI</th>
                        <th  class="text-white"scope="col">NOMBRE</th>
                        <th  class="text-white" scope="col">DIRECCION</th>
                        <th  class="text-white" scope="col">TELEFONO</th>
                        <!--    <th scope="col">USUARIO</th>-->
                        <th class="text-white" scope="col">EMAIL</th>
                        <th class="text-white" scope="col">MEDICO</th>
                        <th class="text-white" scope="col">CITAR/ANULAR/MODIFICAR</th>

                    </tr>
                </thead>
                <tbody>


                    <?php $contador = 1;
                    while ($fila = mysqli_fetch_row($resultado)) {
                    ?>




                        <tr>
                            <th  class="text-white"scope="row"> <?php echo $contador; ?></th>
                            <th><?php echo $fila[0]; //DNI

                                ?><form action="../../controlador/historial_consultar" method="post">
                                    <input type="text" name="paciente" value="<?php echo $fila[0]  ?>" hidden>
                                    <input type="text" name="nombre" value="  <?php echo $fila[1]  ?>" hidden>
                                    <input type="text" name="direcion" value="<?php echo $fila[2]  ?>" hidden>
                                    <input type="text" name="telefono" value="<?php echo $fila[3]  ?>" hidden>
                                    <input type="text" name="email" value="   <?php echo $fila[6]  ?>" hidden>
                                    <input type="text" name="edad" value="   <?php echo $fila[7]  ?>" hidden>

                                    <input type="submit" class="btn btn-success" value="Consultar historial">
                                </form>
                            </th>

                            <td > <?php echo $fila[1]; //NOMBRE
                                    ?> </td>
                            <td> <?php echo $fila[2]; //DIRECCION
                                    ?> </td>
                            <td> <?php echo $fila[3]; //TELEFONO
                                    ?> </td>
                            <!--  <td> <?php echo $fila[4] //PASS
                                        ?> </td>-->
                            <td> <?php echo $fila[6]; //email 
                                    ?></td>


                            <td>
                                <?php
                                $query1 = "SELECT nombre FROM medicos where numero_colegiado=" . $fila[5] . "";
                                //echo $query1;
                                $med = mysqli_query($conectar, $query1);

                                if ($tiene_medico = mysqli_fetch_row($med)) {
                                    echo $tiene_medico[0];
                                    $medico_ = $tiene_medico[0];
                                }



                                ?>


                            </td>



                            <td>

                                <!--Si tiene cita o no, se podra cancelar -->
                                <?php
                                $query = "SELECT cod_id,fecha_cita,fk_medico,hora,fk_paciente FROM citas where fk_paciente='" . $fila[0] . "'";

                                $si = mysqli_query($conectar, $query);

                                if ($tiene_cita = mysqli_fetch_row($si)) {
                                    //guardo en una sesion por problemas de enviar datos despues del else

                                ?>




                                    <div class=row>
                                        <form action="../../controlador/borrar_cita.php" class="col-6" method="POST">
                                            <div class="services">
                                                <button type="submit" name="anular" value="<?php echo $tiene_cita[4]; ?>" class="btn btn-danger rounded-circle icon-box-box swirl-out-bck" id="cita">A</button>
                                            </div>
                                        </form>

                                        <form action="vista_modificar_pacientes.php" class="col-6" method="POST">
                                            <button type="submit" name="modificar" value="<?php echo $tiene_cita[4]; ?>" class="btn btn-warning  rounded-circlE  " hidden>M</button>
                                            <input type="text" name="nombre_a" value="<?php echo $fila[1]; ?>" hidden>
                                            <input type="text" name="medico_" value="<?php echo $medico_; ?>" hidden>
                                            <div class="alert  heartbeat" role="alert"><?php echo "Dia-" . substr($tiene_cita[1], 8, 4) . "-" . substr($tiene_cita[1], 5, 2) .  " " . $tiene_cita[3]; ?></div>



                                        </form>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class=row>
                                        <form action="../../calendario/calendario/index.php" class="col-6" method="POST">

                                            <div class="services">
                                                <button id="jose" type="submit" name="citar" value="<?php echo $fila[0];
                                                                                                    $_SESSIO['fk_me_ad'] = $fila[0] ?>" aria-hidden="true" class="btn btn-primary  rounded-circle icon-box-box">C</button>
                                            </div>
                                            <?php $fila[0];
                                            $_SESSIO['fk_me_ad'] = $fila[0] ?>
                                        </form>

                                        <form action="vista_modificar_pacientes.php" class="col-6" method="POST">
                                            <div class="services">
                                                <button type="submit" name="modificar1" value="<?php echo $fila[0]; ?>" aria-hidden="true" class="btn btn-warning rounded-circle icon-box-box ">M</button>
                                            </div>

                                            <input type="text" name="nombre_a" value="<?php echo $fila[1]; ?>" hidden>
                                            <input type="text" name="medico_" value="<?php echo $medico_; ?>" hidden>
                                        </form>
                                    </div>
                            </td>


                        </tr>



                <?php if (isset($_POST['citar'])) {
                                        sleep(10);
                                    }
                                }

                                $contador++;
                            } ?>
                </tbody>
            </table>
        </div>




    </div>
    <div class="container">
        <div class="row" id="leyenda">




        </div>

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

    include("../header/Medilab/footer.php"); ?>
    <script src="js/mod_pacientes.js"></script>
    <script src="js/hora.js"></script>
</body>

</html>