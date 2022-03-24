<?php
session_start();
//var_dump($_SESSION);

//echo "<hr>";

//var_dump($_POST);

if (!empty($_SESSION['medico'])) { //solo acesso a medicos


} else {
    header("location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/login_personal_sanitario.php");
}
include('../modelo/Historial.php');
//include('../modelo/conectar.php');



if(isset($_POST['med']))       {
$historial = new Historial();
$link = conexion();

$medicamento=$_POST['med'];
$paciente=$_POST['fk_p'];
$medico=$_POST['fk_m'];
$fecha=$_POST['fecha_'];
$posoligia = $_POST["unidades"]." cada ".$_POST['horas'];
$motivo = $_POST['motivo'];
$diagnostico = $_POST['diagnostico'];

 if($historial->insertar_historial($paciente,$medico,$fecha,$medicamento,$posoligia,$motivo,$diagnostico)){
    unset($historial);
    $query="DELETE FROM CITAS WHERE fk_paciente= '".$paciente."'";
    if(mysqli_query($link,$query))
     {
       header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_personal.php");

    }else {
        echo "pagina de erro en la consulta de borrado de citas";
    }


 }else{
     echo "pagina errores error en insertar el historial";
 }






}