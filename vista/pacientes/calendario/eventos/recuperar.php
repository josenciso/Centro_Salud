<?php
session_start();
var_dump($_SESSION);

if (!empty($_SESSION['paciente']))  { //si ya existen la sesion


} else {
    header("location: http://localhost/PROYECTO_FINAL/vista/pacientes/login_pacientes.php");
}
header('Content-Type: application/json');
$server = "localhost";
$usuario = "root";
$clave = "";
$base = "proyecto_fp";
$con = mysqli_connect($server, $usuario, $clave, $base) or die("problemas");






$query="select nombre as title,fecha_cita as start,fecha_cita as end,texto as 
textColor, fondo as backgroundColor from citas,pacientes where dni=fk_paciente";
//$datos = mysqli_query($con, "select cod_id as title,fecha_cita as start,fecha_cita as end,texto as textColor, fondo as backgroundColor from citas,pacientes where dni=fk_paciente");
$datos1 =mysqli_query($con,"select  cod_id as title, fecha_cita as start from citas");
$resultado=  mysqli_fetch_all($datos1, MYSQLI_ASSOC);
  
     // echo json_encode($resultado);

$datos = mysqli_query($con, "select nombre as title,fecha_cita as start,fecha_cita as end,texto as textColor, fondo as backgroundColor from citas,pacientes where dni=fk_paciente");
$resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
  
      echo json_encode($resultado);
              
        //var_dump($datos);
     //$salida= array();

     //$salida= $datos->fetch_all(MYSQLI_ASSOC);
     //echo json_encode($salida);
     //var_dump($salida);
  
     $result = mysqli_query($con,$query);

      $rows = array();
$i=0;
//retrieve and print every record
while ($r = mysqli_fetch_assoc($result)) {
    // $rows[] = $r; has the same effect, without the superfluous data attribute
    $rows[] = array();
   
}
var_dump($rows);

echo json_encode($rows);
   