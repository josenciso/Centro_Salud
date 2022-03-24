<?php
session_start();
var_dump($_SESSION);

if (!empty($_SESSION['paciente']))  { //si ya existen la sesion


} else {
    header("location: http://localhost/PROYECTO_FINAL/vista/pacientes/login_pacientes.php");
}
header('Content-Type: application/json');

//require("conexion.php");
$server = "localhost";
$usuario = "root";
$clave = "";
$base = "proyecto_fp";
$con = mysqli_connect($server, $usuario, $clave, $base) or die("problemas");

$fk_paciente= $_POST['fk_paciente'];
$fk_medico= $_POST['fk_medico'];
$hora = $_POST['hora'];
$fecha_cita = $_POST['fecha_cita'];
$texto = $_POST['texto'];



$query1= "select hora as title
,fecha_cita as start,fecha_cita as end  from citas where fk_medico='$fk_medico'";
$datos = mysqli_query($con,$query1);
$resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);


$respuesta  = mysqli_query($con,$query1);

echo json_encode($respuesta);
