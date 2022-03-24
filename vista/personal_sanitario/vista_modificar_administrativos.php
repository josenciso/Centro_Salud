<?php
session_start();
if (empty($_SESSION['administrativo'])) { //si ya existen la sesion
    header("location: login_personal_sanitario.php");
}
include('../header/Medilab/header.php');
?>
<!--<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    LIBRERIAS NUEVA PARA AVISOS
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>Portal administrativo</title>
</head>-->
<link rel="stylesheet" href="css/styles.css">

<body>
    <p></p>
    <?php
    include('../header/Medilab/top_bar.php');
    ?>
   
        <?php
        if (!empty($_POST['modificar'])) {
            $modi = $_POST['modificar'];

        ?>
            <div class="container inicio_personal">
                <?php
                include("informacion.php");
                ?></div>
                    <div class="col-1 services">
            <a href="../personal_sanitario/gestionar_personal.php">
                <div id=flecha_back>
                    <div class="icon"><i class="bi bi-arrow-left-circle"></i></div>

                </div>
            </a>
        </div>

            <!-- ======= Services Section ======= -->
            <section id="services" class="services">
                <div class="container">

                    <div class="section-title">
                        <h2>MODIFICAR ADMINISTRATIVO</h2>
                        <p>Marque las casillas que quiere cambiar</p>
                    </div>

                    <div class="row"> </div>
                </div>
            </section>



            <?php


            ?>
             <div class="container" id="formulario">
            <h1></h1>
            <h2>Esta modificando : <?php echo $_POST['nombre_a']; ?></h2>



            <form action="../../controlador/mod_administrativos.php" method="post" id="insertar">
                <div class=row>
                    <div class="col-6">
                        <div class="col-5">
                            <div class="form-group form-">
                                <!-- telefono-->
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="casilla_telefono">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Telefono
                                    </label>
                                </div>

                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="969000000" disabled><span class="charly" id="telefono_error"> </span><span class="badge badge-warnings">Primary</span>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group col-5">
                                <!-- pass-->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="casilla_contraseña">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Contraseña
                                    </label>
                                </div>
                                <input type="password" class="form-control col-3" id="contraseña" name="contraseña" placeholder="......." disabled><span class="charly" id="contraseña_error"> </span>
                                <input type="password" class="form-control" id="contraseña_1" name="contraseña_1" placeholder="......." disabled><span class="charly" id="contraseña_1_error"> </span>
                            </div>

                        </div>



                        <div class="col-12">
                            <div class="form-group col-5">
                                <!-- email -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="casilla_email">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Email
                                    </label>
                                </div>

                                <input type="text" class="form-control" id="email" name="email" placeholder="abc@pepe.com" disabled><span class="charly" id="email_error"> </span>
                                <input type="text" name="modi" value="<?php echo  $modi; ?>" hidden="true">
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-3"> </div>
                        <div class="col-3">

                            <label for="date" class="control-label"></label>
                            <div class="form-group">
                                <!-- Enviar -->
                                <button type="submit" id="in" name="enviar" class="col-12 btn btn-warning" disabled>Pulse para modificar</button><span class="charly" id="enviar_error"> </span>
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

    <?php
    ?>
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
    <script src="js/modificar_admin.js"></script>
    <script src="js/hora.js"></script>

</body>

</html>
<?php
        }
