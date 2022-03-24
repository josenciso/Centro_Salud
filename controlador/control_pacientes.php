
<?php


require '../modelo/Paciente.php';


//acceso desde login paciente

//******pte de modificar las pass por los dni */
session_start();


 //debe de esistir el envio de post 
if (isset($_POST['enviar'])) {
    $usu = $_POST['dni'];
    $pass = $_POST['pass']; // los tengo de la pagina
   // var_dump(($_POST));
    $usuario1 = new Paciente();
    //$usuario1->verificar($usu, $pass);
    //verificar sesion ya iniciada






    if ($usuario1->conectarse($pass, $usu)) { // conectarse a base de datos y verificar si existe
        $_SESSION['paciente'] = "existe";
        $array = $usuario1->datos_paciente($usu); // guardar en Sesion info para portal paciente
       // var_dump($array);
        $dato = "jose";
        foreach ($array as $key => $value) { //guardando todos los datos en sesion
            $dato1 = (string)$key;
            $dato = "paciente" . $dato1;
            echo $dato . "<br>";
            $_SESSION[$dato] = $value;
        }

        $_SESSION['medico'] = $usuario1->Nombre_medico($_SESSION['paciente4']); //medico
 
        $_SESSION['medicoTLF'] = $usuario1->getTelefonoME($_SESSION['paciente4']);//tlf y email
        $_SESSION['medicoEMAIL'] = $usuario1->getemailME($_SESSION['paciente4']);
        //ver si tiene citas
        // $array1 = $usuario1->citas($usu); // recuperar info de citas
   
        //if(empty ($array1)){
        //    $_SESSION['hay_citas']=false;
        //}
        //else{
        //     foreach ($array1 as $key => $value) {//recupero fecha y hora
        //    $dato1 = (string)$key;
        //    $dato = "cita" . $dato1;
        //    echo $dato . "<br>";
        //    $_SESSION[$dato] = $value;
        //}$_SESSION['hay_citas']=true;
        // }
        //var_dump($_SESSION);
        header("Location: http://localhost/PROYECTO_FINAL/vista/pacientes/portal_pacientes.php");
        //$usuario1->controlar_accesos($_SESSION['paciente']);
        unset($usuario1);
    //var_dump($_SESSION);
    } else {
        header("Location: ../vista/error/error.html");
        die();
    }
}else
{
    header("Location: /PROYECTO_FINAL/");

}




?>
        
    
   



