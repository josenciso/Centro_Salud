<?php

header('Content-Type: application/json');

//require("conexion.php");
$server = "localhost";
$usuario = "root";
$clave = "";
$base = "proyecto_fp";
$con = mysqli_connect($server, $usuario, $clave, $base) or die("problemas");

$fk_paciente= $_POST['fk_paciente'];
$fk_medico= $_POST['fk_medico'];
$hora = $_POST['hora'];
$fecha_cita = $_POST['fecha_cita'];
$texto = $_POST['texto'];


$query ="insert into citas  (fk_paciente,fk_medico,hora,fecha_cita,texto)  
                        VALUES ( '".$fk_paciente."'
                                 , ".$fk_medico."
                                  , '".$hora."'
                                  , '".$fecha_cita."'
                                  , '".$texto."')";


                                  
//$query ="insert into pr   VALUES ( '".$fk_paciente."'
//, '".$fk_medico."'
//, '".$hora."'
//, '".$fecha_cita."'
//, '".$texto."')";

//$query1="insert into pr values ('2', '2','2','2','2')";


                 
//                    '".$_POST["hora"]."',
//                    '".$_POST["fecha"]."'
//                    )";
//
//$query ="insert into pr  values  ('14141414Z','10.00','fecha')";




$respuesta  = mysqli_query($con,$query);

echo json_encode($respuesta);
