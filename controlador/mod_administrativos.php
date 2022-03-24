<?php
 session_start();
require('../modelo/Administrativo.php');



 var_dump($_SESSION);
 if (empty($_SESSION['administrativo'])) {
    if (empty($_SESSION['administrativo'])) {//si esta vacio 
        echo 'se esta metiendo';
        header("Location: /PROYECTO_FINAL/");
    }
 }

   
   

    if (isset($_POST['modi'])) {

        $tele=1;
        $email =1;
        $pass=1;
        
        
        $administrativo = new Administrativo($_SESSION['usu'], $_SESSION['pass']);
        //($_SESSION['usu'], $_SESSION['pass']);
        //("Location: /../vista/personal_sanitario/gestionar_pacientes.php");
      

        if (!empty($_POST['telefono'])) {
           $tele= $administrativo->actualizarTelefono($_POST['telefono'], $_POST['modi']);
        }
        if (!empty($_POST['email'])) {
           $email=  $administrativo->actualizarEmail($_POST['email'], $_POST['modi']);
        }
     
        if (!empty($_POST['contraseña'])) {
          $pass=  $administrativo->actualizarPass($_POST['contraseña'], $_POST['modi']);
        }
       
              //header("Location: http://localhost/PROYECTO_FINAL/vista/error/error_conexiones.html"); 
         
        if(!$tele==1 || !$email==1 || !$pass==1){ //si no ok error
            header("Location: http://localhost/PROYECTO_FINAL/vista/error/error_conexiones.html");
        }else{
            header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_personal.php");
        }
              unset($administrativo);

        
    
        //header("Location: /../vista/personal_sanitario/gestionar_medicos.php");
    }
        
      