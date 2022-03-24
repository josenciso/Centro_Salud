
<?php


session_start();
//var_dump($_SESSION);
//devuelve las todos los datos del medico son usados para la mostrar la info, 

if (!empty($_SESSION['medico'])) { //si ya existen la sesion


} else {
    header("location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/login_personal_sanitario.php");
}


function conexion() {
    $host = 'localhost';
    $username = 'root';
    $passwd = "";
    $dbname = "proyecto_fp";
    $link = mysqli_connect($host, $username, $passwd, $dbname);

    if (!$link) {//si no conecta da null
        echo  mysqli_connect_error();
        exit;
    }else{
        
        }
    return $link;
}


    $link=conexion();
  
   
    $consulta_medicos= "SELECT * FROM medicos WHERE pass='${_SESSION['pass']}'  and numero_colegiado = '${_SESSION['numero_colegiado']}'";
  
    $result_medicos= mysqli_query($link, $consulta_medicos);
       
    if($med=mysqli_fetch_row($result_medicos)){

        $_SESSION['colegiado'] =$med[0];
        $_SESSION['nombre'] = $med[1];
        $_SESSION['telefono'] = $med[2];
        $_SESSION['centro'] = $med[5];

    }
        

      
  

   
    ;
    