<?php

session_start();
if (empty($_SESSION['administrativo'])) {

  header("Location: ../vista/personal_sanitario/login_personal_sanitario.php");
} 
include '../modelo/Personal_sanitario.php';
var_dump($_POST);

$codigo = $_POST['codigo'];
$es_medico = $_POST['es_medico'];
$borrado=0;



if(isset($_POST['codigo'])){
 
    $nuevo = new Personal_Sanitario($codigo,$codigo);
   
    
if ($nuevo->delete_personal($codigo,$es_medico)){
    header("Location: ../vista/personal_sanitario/gestionar_personal.php");
}else{
    header("Location: http://localhost/PROYECTO_FINAL/vista/error/error_conexiones.html");
}



}