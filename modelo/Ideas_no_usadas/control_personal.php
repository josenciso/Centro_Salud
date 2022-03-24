<?php
//EN DESUSO
include '../modelo/Medicos.php';//ve si se usa


//si llegamos aqui previa verificacion de js de user y pass
session_start();
var_dump($_SESSION);
$usu = $_POST['usu'];
$pass = $_POST['pass']; // los tengo de la pagina

$empleado = new Medico($usu, $pass);

$_SESSION['empleado']= $empleado;
$es= $empleado->conectarse($usu,$pass);//controla la entrada si es medico o administrativo

//verificando las sesiones
if (!empty($_SESSION['usu'])) {//si no esta vacia la sesion te lleva 
    
    if($es==1){
        $_SESSION['administrativo']=1;
        echo 'ya pasaste administrador';
        header("Location: ../vista/personal_sanitario/portal_administrativo.php");
    }
    elseif($es==2){
        $_SESSION['medico']=2;
        echo 'ya pasaste medico';
        header("Location: ../vista/personal_sanitario/portal_medico.php");
    }
   

}else{
    header("Location: ../vista/personal_sanitario/login_personal_sanitario.php");
}





    if ($empleado->conectarse($usu, $pass) == 1) {
        session_start();
        $_SESSION['usu'] = $usu;
        $_SESSION['pass'] = $pass;// debe de ser su id para rescatarlo en portal paciente o portal 
        $_SESSION['administrativo']=1;
        $_SESSION['true']= true;
      //  header("Location: ../vista/personal_sanitario/portal_administrativo.php");
    }
    elseif ($empleado->conectarse($usu, $pass) == 2) 
    
    {
        $_SESSION['usu'] = $usu;
        $_SESSION['pass'] = $pass;
        $_SESSION['medico']=2;
        $_SESSION['true']= true;
        header("Location: ../vista/personal_sanitario/portal_medico.php");
    }
    

    

