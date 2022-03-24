<?php


function conexion() {
    $host = 'localhost';
    $username = 'root';
    $passwd = "";
    $dbname = "proyecto_fp";
    $link = new mysqli($host, $username, $passwd, $dbname);
    $link->set_charset("utf8");

    if (!$link) {//si no conecta da null
        echo  mysqli_connect_error();
        exit;
    }else{
        
        }
    return $link;
}$num=0;
$resulado = 1;
$query =  "SELECT * FROM citas WHERE fk_medico=3 and fecha_cita='2021-11-29'";
$link = conexion();

$resu = mysqli_query($link, $query);
var_dump($resu);
while ($resulado = mysqli_fetch_row($resu)) {
    echo $resulado[1]."<br>";
    $num++;
}if($num==0){
    echo "<h2> Sin citas para dia de hoy</h2>";

}

$paciente = array();
$contador = 0;
$consulta = 'SELECT    *
    FROM pacientes where dni = "12121212M"';
//return  $consulta;
$resultado = (mysqli_query($link, $consulta));
while ($fila = mysqli_fetch_row($resultado)) {
   echo  $fila[$contador];
   $contador++;
   echo $contador;
}