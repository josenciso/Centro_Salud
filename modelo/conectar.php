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
}

