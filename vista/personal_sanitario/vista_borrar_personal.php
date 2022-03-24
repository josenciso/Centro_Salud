<?php
session_start();
if (!empty($_SESSION['administrativo'])) { //si ya existen la sesion


} else {
    header("location: login_personal_sanitario.php");
}
include('../header/Medilab/header.php');

//var_dump($_POST);
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
       <div class="container inicio_personal"><?php
  include("informacion.php");
  ?></div>
    <div class="container-fluid">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2>BOORAR PERSONAL</h2>
                    <p>Va a elimina del centro de salud</p>
                </div>

                <div class="row">









                </div>

            </div>
        </section>
        <div class="container" id="formulario">
            <?php
            if (!empty($_POST['modificar'])) {
                $modi = $_POST['modificar'];
                $codigo =$_POST['codigo'];
                $medico= $_POST['medico']

            ?>



                <?php


                ?>

                <h1>Marque las casilla para borrar = <?php echo $_POST['nombre_a']; ?> </h1>

                <form action="../../controlador/borrado_personal.php" method="post" id="insertar">
                    <div class=row>
                        <div class="col-6">
                            <div class="col-5">
                                <div class="form-group form-">
                                    <!-- telefono-->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="confirmar">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Confimar borrado
                                        </label>
                                    </div>

                                   <a  href="gestionar_personal.php" class="col-8" id="" type="button" class="btn btn-danger col-12">CANCELAR BORRAR</a> 


                                 





                                </div>
                            </div>





                        </div>



                        <div class="row">

                            <div class="col-3">

                                <label for="date" class="control-label"></label>
                                <div class="form-group">
                                    <!-- Enviar -->
                                    <input type="text" name="codigo" value="<?php echo $codigo ?>" hidden>
                                    <input type="text"  name="es_medico" value="<?php echo $medico ?>" hidden>
                                    <button type="submit" id="eliminar" name="enviar" class="col-5 btn btn-danger" disabled>Eliminar</button><span class="charly" id="enviar_error"> </span>
                                </div>
                            </div>
                        </div>



                </form>
        </div>
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
                include('../header/Medilab/footer.php');
    ?>
    <script src="js/borrar_personal.js"></script>
    <script src="hora.js"></script>

</body>

</html>
<?php
            }
