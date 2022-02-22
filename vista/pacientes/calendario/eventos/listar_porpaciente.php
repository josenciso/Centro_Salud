<?php
session_start();
//var_dump($_SESSION);

if (!empty($_SESSION['paciente']))  { //si ya existen la sesion


} else {
    header("location: http://localhost/PROYECTO_FINAL/vista/pacientes/login_pacientes.php");
}
header('Content-Type: application/json');


$server="localhost";
$usuario="root";
$clave="";
$base="proyecto_fp";
$con=mysqli_connect($server,$usuario,$clave,$base) or die("problemas") ;




        $datos = mysqli_query($con, "select cod_id as id,
                                                 fk_paciente as title,
                                                 fk_medico as descripcion,
                                                 fecha_cita as start,
                                                 fecha_cita as end,
                                                 texto as textColor,
                                                 fondo as backgroundColor
                                             from citas");
        $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
        echo json_encode($resultado);



     