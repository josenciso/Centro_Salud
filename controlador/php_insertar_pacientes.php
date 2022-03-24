
<?php
session_start();
//var_dump($_SESSION);
if (empty($_SESSION['administrativo'])) {

   header("Location: ../vista/personal_sanitario/login_personal_sanitario.php");

  }
include('../modelo/Paciente.php');
$vale=0;
$paciente = new Paciente();
    ;
    $medico= intval($_POST['medico']);
  $vale=  $paciente->insertarNuevoPaciente($_POST['dni'],$_POST['nombre'],$_POST['direccion'].' Ciudad de '.$_POST['ciudad'],$_POST['telefono'],$_POST['contraseña'],$medico,$_POST['email'],$_POST['fecha']);

  if(!$vale==1){
    header("Location: http://localhost/PROYECTO_FINAL/vista/error/error_conexiones.html");
  }else{
    header("Location: ../vista/personal_sanitario/gestionar_pacientes.php");
  }