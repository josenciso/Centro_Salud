<?php

include('../modelo/Medicos.php');
include('../modelo/Administrativo.php');
//include('../modelo/Personal_sanitario.php');

session_start();
if (empty($_SESSION['administrativo'])) { //SOLO ACCESO SANITARIO
    header("Location: ../vista/personal_sanitario/login_personal_sanitario.php");
}

var_dump($_POST);
if($_POST['rol']=='administrativo'){
    $alfa= new Administrativo("1","2");
    $numero= $_POST['num'];
    $nombre = $_POST['nombre'];
    $telefono= $_POST['telefono'];
    $pass = $_POST['contraseña'];
    $email = $_POST['email'];
    $alfa->insertar_nuevo_administrativo($numero,$nombre,$telefono,$pass,$email);

}

if($_POST['rol']=='medico'){
    $alfa= new Medico("1","2");
    $numero= $_POST['num'];
    $nombre = $_POST['nombre'];
    $telefono= $_POST['telefono'];
    $pass = $_POST['contraseña'];
    $email = $_POST['email'];
    $alfa->insertar_nuevo_medico($numero,$nombre,$telefono,$pass,$email);
}