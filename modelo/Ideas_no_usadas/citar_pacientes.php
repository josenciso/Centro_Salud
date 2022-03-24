<?php


//ESTA TAMPOCO VA A SER USADA
include_once('../inicio.php');
include('../../modelo/conectar.php');
session_start();
var_dump($_SESSION);
if (empty($_SESSION['administrativo'])) {

  header("Location: login_personal_sanitario.php");
}

$conectar = conexion();
$pacientes = "SELECT  * FROM pacientes";
$resultado = mysqli_query($conectar, $pacientes);
while ($fila = mysqli_fetch_row($resultado)) {
  echo "<li class='dropdown-item'>" . $fila[1] . "</li>";
} ?>
<div class="callout">...</div>
<a href=".././../controlador/logout.php">cerrar sesion</a>
<?php
