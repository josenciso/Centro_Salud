<?php
session_start();
//var_dump($_SESSION);

echo "<hr>";

//var_dump($_POST);
include('../modelo/Historial.php');
include('../modelo/años.php');
//include('../modelo/conectar.php');



if (isset($_POST['paciente'])) {
  $historial = new Historial();
  $link = conexion();
  $paciente = $_POST['paciente'];

  $query = "SELECT *  FROM historial Where fk_paciente = '" . $paciente . "' order by codigo_cita desc";
  $datos = mysqli_query($link, $query);
?>
  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <!-- Favicons -->


 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--LIBRERIAS NUEVA PARA AVISOS-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!--  <link href="../header/Medilab/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->

    <!-- Template Main CSS File 
   
    <link href="../vista/header/Medilab/assets/css/style.css" rel="stylesheet">-->

    <title>Historial medico</title>
  </head>

  <body>
    <?php
    if(isset($_SESSION['paciente0'])){//si viene de paciente, se identifica para volver
      echo '<a href="../vista/pacientes/portal_pacientes.php">Volver </a>';
    }
    if(isset($_SESSION['administrativo'])){//si viene de paciente, se identifica para volver
      echo '<a href="../vista/personal_sanitario/gestionar_pacientes.php">Volver </a>';
    }
    ?>

    <div class="container text-center">

      <h1>Centro de Salud</h1>
      <h3> Calle Porvenir, las Palas, Murcia CP. 30330</h3>
    </div>
    <div class="text-center">
    <h3> Historial clinico </h3>
<?php
if (isset($_SESSION['paciente0'])){
  $_POST['nombre']=$_SESSION['paciente1'];
  $_POST['direcion']=$_SESSION['paciente2'];
  $_POST['telefono']=$_SESSION['paciente3'];
  $_POST['email']=$_SESSION['paciente5'];
  $_POST['edad']=$_SESSION['paciente6'];
}


?>

    <h2>Paciente : <?php echo $_POST['nombre']; ?></h2>
    <h4>Direccion : <?php echo $_POST['direcion'] . "  Telefeno :" . $_POST['telefono'] . "  Email  :" . $_POST['email']."  fecha nacimiento :". verfecha($_POST['edad']) ; ?> </h4>
    </div>
    <div class="table-responsive">
      <table class="table container ">

        <thead>
          <tr>
            <th scope="col">CODIGO</th>
            <th scope="col">FECHA CONSULTA</th>
            <th scope="col">MOTIVO</th>
            <th scope="col">DIAGNOSTICO</th>
            <th scope="col">RECETA</th>
            <th scope="col">POSOLOGIA</th>
          </tr>
        </thead>
        <tbody>


          <?php
          while ($fila = mysqli_fetch_row($datos)) {
            // echo $fila[1];

          ?>

            <tr>

              <th scope="row">
                <?php echo $fila[0]; ?></th>
              <td> <?php echo $fila[3]; ?></td>
              <td> <?php echo $fila[5]; ?></td>
              <td> <?php echo $fila[7]; ?></td>
              <td> <?php echo $fila[4]; ?></td>
              <td> <?php echo $fila[6]; ?></td>

            </tr>

          <?php

          }



          ?>

        </tbody>
      </table>
    </div>
 <!-- ======= Footer ======= -->
 <footer id="footer">

<div class="footer-top">
  <div class="container text-center">
    <h5> Fin del historial médico</h5>

  </div>
</div>




  </body>

  </html>

<?php




}
?>