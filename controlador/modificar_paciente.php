
<?php
session_start();


if (empty($_SESSION['administrativo'])) {

    header("Location: ../vista/personal_sanitario/login_personal_sanitario.php");
  }
  require_once("../modelo/Paciente.php");

var_dump($_POST);

$dir=1;
$tel=1;
$med=1;
$pas=1;
$ema=1;

if (isset($_POST['modi'])) {//numero personal administrativo
    $usuario = new Paciente();
   //("Location: /../vista/personal_sanitario/gestionar_pacientes.php");
    //echo $_POST['modi'];
    if (!empty($_POST['direccion'])) {
       $dir=  $usuario->actualizarDireccion($_POST['direccion'], $_POST['modi']);
    }
    if (!empty($_POST['telefono'])) {
        $usuario->actualizarTelefono($_POST['telefono'], $_POST['modi']);
    }
    if (!empty($_POST['medico'])) {
        $usuario->Cambiar_medico($_POST['medico'], $_POST['modi']);
    }
    if (!empty($_POST['contraseña'])) {
        $usuario->actualizarPass($_POST['contraseña'], $_POST['modi']);
    }
    if (!empty($_POST['email'])) {
        $usuario->actualizarEmail($_POST['email'], $_POST['modi']);
    }

    if(!$dir==1 || !$tel==1 || !$med==1 || !$pas==1 || !$ema==1){ //si no vale uno a los errores, no se realizo cambio 
        header("Location: http://localhost/PROYECTO_FINAL/vista/error/error_conexiones.html");
    }
    header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_pacientes.php");//cambio ok 
}
   
  
