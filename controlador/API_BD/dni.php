<?php
header('Content-Type: application/json');
session_start();
if (empty($_SESSION['administrativo'])) { //SOLO ACCESO SANITARIO
    header("Location: ../vista/personal_sanitario/login_personal_sanitario.php");
}
function conexion() {
    $host = 'localhost';
    $username = 'root';
    $passwd = "";
    $dbname = "proyecto_fp";
    $link = new mysqli($host, $username, $passwd, $dbname);
    $link->set_charset("utf8");

    if (!$link) {//si no conecta da null
        echo  mysqli_connect_error();
        exit;
    }else{
        
        }
    return $link;
}



$con = conexion();
$query ="SELECT dni as title,email as jose from pacientes";

$datos  = mysqli_query($con,$query);
$respuesta = mysqli_fetch_all($datos, MYSQLI_ASSOC);
echo json_encode($respuesta);

