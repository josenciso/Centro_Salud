<?php

header('Content-Type: application/json');



//var_dump($_SESSION);
session_start();
if (!empty($_SESSION['administrativo']))  { //si ya existen la sesion


} else {
    header("location: http://localhost/PROYECTO_FINAL/");
}


//require("conexion.php");
$server="localhost";
$usuario="root";
$clave="";
$base="proyecto_fp";
$con=mysqli_connect($server,$usuario,$clave,$base) or die("problemas") ;
//$query="select * FROM pacientes WHERE dni='12121212M'";
//$resul=mysqli_query($con, $query);
//if($fila= mysqli_fetch_row($resul)){
    
     
//}

$fk_medico=$_SESSION['fk'];

switch ($_GET['accion']) {
    case 'listar':
        
        $datos = mysqli_query($con, "select hora as title
        ,fecha_cita as start,fecha_cita as end  from citas where fk_medico='$fk_medico'");
        $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    
        echo json_encode($resultado);
        break;

    case 'agregar': 
        $fk_medico= mysqli_query($con,"SELECT fk_medico from pacientes where dni='".$_POST['paciente']."'");
        $respuesta = mysqli_query($con, "insert into eventos(fk_paciente,fk_medico,fecha_cita) values 
                                     ('$_POST[paciente]','$fk_medico','$_POST[fecha]','$_POST[hora]')");
                                    
                                    //echo($_POST['paciente']);
        //echo json_encode($respuesta);
        header('Location : listartodos.php');
        break;

    case 'modificar':
        $respuesta = mysqli_query($con, "update eventos set titulo='$_POST[titulo]',
                                                                 descripcion='$_POST[descripcion]',
                                                                 inicio='$_POST[inicio]',
                                                                 fin='$_POST[fin]',
                                                                 colortexto='$_POST[texto]',
                                                                 colorfondo='$_POST[fondo]'
                                                            where codigo=$_POST[codigo]");
        //echo json_encode($respuesta);
        true;
        break;

    case 'borrar':
        $respuesta = mysqli_query($con, "delete from eventos where codigo=$_POST[codigo]");
        echo json_encode($respuesta);
        break;
}
?>