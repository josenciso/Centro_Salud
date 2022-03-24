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


<body id="gestion_personal">

    <p></p>
    <?php
    include("../header/Medilab/top_bar.php");
    ?>
    <div class="container inicio_personal">
        <?php
        include("informacion.php");
        ?></div>

    <a>
        <div class="col-1 services">
            <a href="../personal_sanitario/portal_administrativo.php">
                <div id=flecha_back>
                    <div class="icon"><i class="bi bi-arrow-left-circle"></i></div>

                </div>
            </a>
        </div>


    </a>
    <div class="container">


        <section id="services" class="services">

            <div class="section-title">
                <h2 class="text-white">GESTION DE PERSONAL DE SANITARIO</h2>
                <p></p>
            </div>
        </section>

        <!--<div class="container">

            <div class="row align-items-center">
                <div class="col">
                    <section id="services" class="services">
                        <div class="col-lg-12 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                            <a href="insertar_personal.php">
                                <div class="icon-box">
                                    <div class="icon"><i class="bi bi-person-plus-fill"></i></div>
                                    <h4> INSERTAR NUEVO PERSONAL</h4>
                                    <p>Ingrese todos los datos</p>
                                </div>
                            </a>
                        </div>
                     </section>
                 </div>-->
                <div class="insert col-3">
                <a href="insertar_personal.php">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-journal-plus"></i></div>
                        <h4 class="title text-white ">Insertar </h4>
                        <p class="description text-white">Nuevo personal</p>
                    </div>
                </a>
            </div>
                
           
            <div class="col-3"> </div>
            <div class="2"> </div>

            <div class="row">
                 <div class="section-title">
                    <h2  class="text-white">MEDICO</h2>
                    <p></p>
                </div>
                <div id="datatable"> </div>

                <table class="table ">


                    <table class="table table-striped col-4">
                        <thead>
                            <tr>
                                <th>Numero de Colegiado</th>
                                <th>NOMBRE</th>
                                <th>TELEFONO</th>
                                <th>EMAIL</th>
                                <th>MODIFICAR</th>
                                <th>BORRAR</th>
                                <!-- <th></th>
                        <th></th>-->

                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($fila = mysqli_fetch_row($resultado)) {
                            ?>


                                <tr>

                                    <td><?php echo $fila[0]; ?></td>
                                    <!--NUMERO COLEGIADO -->

                                    <td> <?php echo $fila[1]; ?> </td>
                                    <!--NOMBRE-->
                                    <td> <?php echo $fila[2]; ?> </td>
                                    <!--TELEFONO-->
                                    <td> <?php echo $fila[5]; ?> </td>
                                    <!--email -->
                                    <!--    <td> <?php  ?> </td>
                            EMAIL-->



                                    <td>
                                        <!--BOTON PARA MODIFICAR  -->

                                        <form action="vista_modificar_medicos.php" method="POST">
                                            <!-- <button type="submit" name="anular" value ="<?php echo $tiene_cita[4]; ?>" class="btn btn-danger col-3"></button>-->
                                            <input type="text" name="nombre_a" value="<?php echo $fila[1]; ?>" hidden>

                                            <div class="services">
                                                <button type="submit" name="modificar" value="<?php echo $fila[0]; ?>" class="btn btn-warning rounded-circle icon-box-box" id="cita">M</button>

                                            </div>
                                        </form>
                                    <td>
                                        <!--BOTON PARA MODIFICAR  -->

                                        <?php
                                        $query = "select dni from pacientes where fk_medico= " . $fila[0] . "";
                                        $resultado1 = mysqli_query($conectar, $query);
                                        while ($aun_tiene_pacientes = mysqli_fetch_row($resultado1)) {
                                            $contador++;
                                        }




                                        if ($contador == 0) {
                                        ?>

                                            <form action="vista_borrar_personal.php" method="POST">
                                                <!-- <button type="submit" name="anular" value ="<?php echo $tiene_cita[4]; ?>" class="btn btn-danger col-3"></button>-->
                                                <input type="text" name="nombre_a" value="<?php echo $fila[1]; ?>" hidden>
                                                <input type="text" name="codigo" value="<?php echo $fila[0]; ?>" hidden>
                                                <input type="text" name="medico" value="true" hidden>
                                                <div class="services">
                                                    <button type="submit" name="modificar" value="<?php echo $fila[0]; ?>" class="btn btn-danger rounded-circle icon-box-box" id="cita">B</button>
                                                </div>
                                                <div class="services">

                                                <?php
                                            }
                                            $contador = 0;



                                                ?>


                                                <?php  ?>


                                                </div>
                                            </form>
                                    </td>





                                    </td>
                                </tr>

                            <?php

                            }   ?>
                        </tbody>
                    </table>

                    <div class="section-title">
                        <h2  class="text-white"> ADMINISTRATIV@</h2>
                        <p></p>
                    </div>
                    <table class="table table-striped col-4">



                        <thead>
                            <tr>

                                <th>COD EMPLEADO</th>
                                <th>NOMBRE</th>
                                <th>TELEFONO</th>
                                <th>EMAIL</th>
                                <th>MODIFICAR</th>
                                <th>BORRAR</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $personal1 = "SELECT  * FROM administrativos";
                            $resultado1 = mysqli_query($conectar, $personal1);
                            while ($fila1 = mysqli_fetch_row($resultado1)) { //POR ORDENAR
                            ?>


                                <tr>

                                    <td><?php echo $fila1[0]; ?></td>
                                    <!--NUMERO EMPLEADO -->

                                    <td> <?php echo $fila1[1]; ?> </td>
                                    <!--NOMBRE-->
                                    <td> <?php echo $fila1[2]; ?> </td>
                                    <!--TELEFONO-->
                                    <td> <?php echo $fila1[5]; ?> </td>
                                    <!--USER -->

                                    <!--   <td> <?php  ?></td>
                          EMAIL-->
                                    <td>
                                        <!--BOTON PARA MODIFICAR  -->

                                        <form action="vista_modificar_administrativos.php" method="POST">
                                            <input type="text" name="nombre_a" value="<?php echo $fila1[1]; ?>" hidden>
                                            <div class="services">
                                                <button type="submit" name="modificar" value="<?php echo $fila1[0]; ?>" class="btn btn-warning rounded-circle icon-box-box" id="cita">M</button>


                                            </div>
                                    <td>
                                        </form>
                                        <form action="vista_borrar_personal.php" method="POST">
                                            <input type="text" name="nombre_a" value="<?php echo $fila1[1]; ?>" hidden>
                                            <input type="text" name="codigo" value="<?php echo $fila1[0]; ?>" hidden>
                                            <input type="text" name="medico" value="false" hidden>
                                            <div class="services">

                                                <button type="submit" name="modificar" value="<?php echo $fila1[0]; ?>" class="btn btn-danger rounded-circle icon-box-box" id="cita">B</button>

                                            </div>
                                        </form>
                                    </td>

                                    <?php


                                    ?>




                                    </td>
                                </tr>

                            <?php

                            }   ?>


                        </tbody>
                    </table>
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
      <div class="loading" id="loader"><img alt="loading">
      </div>
    <?php
    include("../header/Medilab/footer.php"); ?>
      <script src="js/hora.js"></script>
      <script src="../../vista/personal_sanitario/js/loader.js"></script>
</body>

</html>