
<?php
   

    if (empty($_SESSION['paciente'])) { //portal paciente, si tiene cita guarda la cita en un array, usado en 
      header("Location: /PROYECTO_FINAL/");
    }

//controlamos si el paciente inserta cita, $_SESION A TRUE
//session_start();
require ('/wamp64/www/PROYECTO_FINAL/modelo/Paciente.php');
//var_dump($_SESSION);
$usuario1 = new Paciente();

//ver si tiene citas usado en C:\wamp64\www\PROYECTO_FINAL\vista\pacientes\portal_pacientes.php linea 104
    $array1 = $usuario1->citas($_SESSION['paciente0']); // recuperar info de citas 
   
  

   
    if(empty ($array1)){
        $_SESSION['hay_citas']=false;
    }
    else{
        foreach ($array1 as $key => $value) {//recupero fecha y hora
            $dato1 = (string)$key;
            $dato = "cita" . $dato1;
            echo $dato . "<br>";
            $_SESSION[$dato] = $value;
        }
        $_SESSION['hay_citas']=true;
    }
?>
        
  
   
