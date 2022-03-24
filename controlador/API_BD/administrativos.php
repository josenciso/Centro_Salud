<?php
header('Content-Type: application/json');
session_start();
if (empty($_SESSION['administrativo'])) { //SOLO ACCESO SANITARIO
    header("Location: ../vista/personal_sanitario/login_personal_sanitario.php");
}
require_once("../../modelo/conectar.php");

$con = conexion();
$query ="SELECT cod_id as title, email as jose from administrativos";

$datos  = mysqli_query($con,$query);
$respuesta = mysqli_fetch_all($datos, MYSQLI_ASSOC);
echo json_encode($respuesta);
