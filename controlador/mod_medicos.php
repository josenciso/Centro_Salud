<?php
require('../modelo/Medicos.php');


session_start();
var_dump($_SESSION);
if (empty($_SESSION['administrativo'])) {//si esta vacio 
    echo 'se esta metiendo';
    header("Location: /PROYECTO_FINAL/");
}




if (isset($_POST['modi'])) { //numero de colegiado medico
    

    $tele=1;
    $email =1;
    $pass=1;
    
    $medico = new Medico($_SESSION['usu'], $_SESSION['pass']);
    //("Location: /../vista/personal_sanitario/gestionar_pacientes.php");
   // echo $_POST['modi'];

    if (!empty($_POST['telefono'])) {
     $tele=   $medico->actualizarTelefono($_POST['telefono'], $_POST['modi']);
    }
    if (!empty($_POST['email'])) {
        $email= $medico->actualizarEmail($_POST['email'], $_POST['modi']);
    }

    if (!empty($_POST['contraseña'])) {
        $pass= $medico->actualizarPass($_POST['contraseña'], $_POST['modi']);
    }
    unset($medico);
    if(!$tele==1 || !$email==1 || !$pass==1){ //si no ok error
        header("Location: http://localhost/PROYECTO_FINAL/vista/error/error_conexiones.html");
    }else{
        header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_personal.php");
    }



    //header("Location: /../vista/personal_sanitario/gestionar_medicos.php");
}
