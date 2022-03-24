<?php

header('Content-Type: application/json');
session_start();
//var_dump($_SESSION);
if (!empty($_SESSION['administrativo']))  { //si ya existen la sesion


} else {
    header("location: http://localhost/PROYECTO_FINAL/");
}
//require("conexion.php");
$server = "localhost";
$usuario = "root";
$clave = "";
$base = "proyecto_fp";
$con = mysqli_connect($server, $usuario, $clave, $base) or die("problemas");

$paciente= ($_POST['paciente']);
$fecha=  ($_POST['fecha']);



$fk_medico= mysqli_query($con,"SELECT fk_medico from pacientes where dni='".$paciente."'");
$respuesta = mysqli_query($con, "insert into eventos(fk_paciente,fk_medico,fecha_cita) values   ('$paciente','$fk_medico','$cita')");
//insertamos la cita seleccionada. 
echo json_encode($respuesta);          


