<?php
session_start();

//Solo acceso a medicos
if (!empty($_SESSION['medico'])) { //si ya existen la sesion


} else {
    header("location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/login_personal_sanitario.php");
}
//var_dump($_SESSION);

//echo "<hr>";

//var_dump($_POST);
include('../modelo/Historial.php');
//include('../modelo/conectar.php');



if(isset($_POST['enviar'])){
$historial = new Historial();
$link = conexion();

//$medicamento=$_POST['med'];
$paciente=$_SESSION['paciente_cita'];
$medico=$_SESSION['colegiado'];
$fecha=$_SESSION['fecha_cita1'];
//$posoligia = $_POST["unidades"]." cada ".$_POST['horas'];
$motivo = $_SESSION['motivo'];
$diagnostico = $_POST['diagnostico'];


 if( $historial->insertar_historial_sin($paciente,$medico,$fecha,$motivo,$diagnostico)){
    unset($historial);
   $query="DELETE FROM CITAS WHERE fk_paciente= '".$paciente."'";
    if(mysqli_query($link,$query))
     {
        header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_personal.php");

    }else {
        header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_personal.php");
    }


 }else{
    header("Location: http://localhost/PROYECTO_FINAL/vista/error/");
 }



 }





 
