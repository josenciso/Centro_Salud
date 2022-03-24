<?php
include 'conectar.php';


class Historial
{


    public function __construct()
    {
    }


    public function insertar_historial($paciente, $medico, $fecha, $medicamento, $motivo, $posologia, $diagnostico)
    {

        $link = conexion();
        $query = "INSERT into historial (fk_paciente,fk_medico,fecha_cita,medicamento,motivo_consulta,posologia,diagnostico)
        values ('" . $paciente . "'," . $medico . ",'" . $fecha . "','" . $medicamento . "','" . $posologia . "','" . $motivo . "','" . $diagnostico . "')";
        if (mysqli_query($link, $query)) {
            return true;
        } else {
            return false;
        }
    }

    public function insertar_historial_sin($paciente, $medico, $fecha, $motivo, $diagnostico)
    {

        $link = conexion();
        $query = "INSERT into historial (fk_paciente,fk_medico,fecha_cita,motivo_consulta,diagnostico)
        values ('" . $paciente . "'," . $medico . ",'" . $fecha . "','" . $motivo . "','" . $diagnostico . "')";


        if (mysqli_query($link, $query)) {
            return true;
        } else {
            return false;
        }
    }




    public function consultar_historial($paciente)
    {
        $link = conexion();
        $query = "SELECT *  FROM historial Where fk_paciente = '" . $paciente . "'";
        return $query;
    }
}
