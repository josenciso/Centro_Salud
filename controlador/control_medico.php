<?php

include '../modelo/Medicos.php';


//si llegamos aqui previa verificacion de js de user y pass HAY QUE MEJORAR LA ENTRADA Y REFRESCO
session_start();
//var_dump($_SESSION);
//var_dump($_POST);


if (!empty($_POST['usu'])&&$_POST['pass']) { //solo entra si es enviado el desde el formualio
    $usu = $_POST['usu'];
    $pass = $_POST['pass']; // los tengo de la pagina
    //verificando las sesiones
    $medico = new Medico($usu, $pass);

    if ($medico->conectarse($usu, $pass) == 2) {  //controla la entrada si es medico o administrativo
        $conectar = conexion();
        $_SESSION['medico'] = 2;
        $_SESSION['numero_colegiado'] = $usu;
        $_SESSION['pass'] = $pass; // debe de ser su id para rescatarlo en portal paciente o portal
        $_SESSION['true'] = true;
        //VAMOS A GESTIONAR DESDE VISTA
        header("Location: ../vista/personal_sanitario/portal_medico/portal_medico.php");
    }//gestionado el erro desde la clase
}else{
    header("Location: ../vista/personal_sanitario/login_personal_sanitario.php");
}
?>
