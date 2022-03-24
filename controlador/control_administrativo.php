<?php

include '../modelo/Administrativo.php';


//si llegamos aqui previa verificacion de js de user y pass HAY QUE MEJORAR LA ENTRADA Y REFRESCO
session_start();
var_dump($_SESSION);

if(empty($_SESSION['true'])){
    header("Location: ../vista/personal_sanitario/login_personal_sanitario.php");
}

if (!empty($_POST['usu'])&&$_POST['pass']|$_SESSION['usu']) { //solo entra si es enviado el desde el formualio
    $usu = $_POST['usu'];
    $pass = $_POST['pass']; // los tengo de la pagina
    //verificando las sesiones
    $administrativo = new Administrativo($usu, $pass);

    if ($administrativo->conectarse($usu, $pass) == 1) {  //controla la entrada si es medico o administrativo
        $conectar = conexion();
        $_SESSION['administrativo'] = 1;
        $_SESSION['usu'] = $usu;
        $_SESSION['pass'] = $pass; // debe de ser su id para rescatarlo en portal paciente o portal
        $_SESSION['true'] = true;
        $_SESSION['nombre'] = $administrativo->getName();
        //VAMOS A GESTIONAR DESDE VISTA
        header("Location: ../vista/personal_sanitario/portal_administrativo.php");
        
    }
}
?>
