<?php

header('Content-Type: application/json');


$server="localhost";
$usuario="root";
$clave="";
$base="proyecto_fp";
$con=mysqli_connect($server,$usuario,$clave,$base) or die("problemas") ;


    $query="select hora as id,from citas where fecha_cita in '2021-12-12'";

        //$datos = mysqli_query($con, "select hora as id,from citas where fecha_cita in ='".$_POST['fecha']."'");
        $datos = mysqli_query($con, "select hora as id,from citas where fecha_cita in '2021-12-12'");
        //$resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
        echo  $query;
        //echo json_encode($resultado);
