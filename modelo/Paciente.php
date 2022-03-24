<?php
include 'conectar.php';



class Paciente
{
    protected $usuario;
    protected $pass;

    public function __construct()
    {
    }


    public function verificar($usuario, $pass)
    {
        $this->usuario = $usuario;
        $this->pass = $pass;
    }

    public function conectarse($dato1,$dato2)
    {
        $link = conexion();
        $consulta = 'SELECT dni FROM pacientes WHERE pass=' . "$dato1" . ' and dni= "' . $dato2. '"';
        $result = mysqli_query($link, $consulta);


        
        if (mysqli_fetch_row($result)) {
            return true;
        } else {
            return false;
        }
    }

    public function controlar_accesos($paciente)
    {
        if (!empty($paciente)) { //si ya existen la sesion

            header("Location: ../vista/pacientes/portal_pacientes.php");
        } else {
            include_once('../vista/pacientes/login_pacientes.php');
        }
    }


    public function borrarCitas($fk_paciente)
    { //borrando citas
        $link = conexion();
        $consulta = "delete from citas where fk_paciente='" . $fk_paciente . "'";
        if ($result = mysqli_query($link, $consulta)) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarDireccion($dato, $paciente)
    {
        $link = conexion();
        $consulta = 'UPDATE pacientes SET direccion ="' . $dato . '" WHERE dni ="' . $paciente . '"';
        //echo $consulta;
        return mysqli_query($link, $consulta);
       /* {
            header("Location:   http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_pacientes.php");
        } else {
            echo "error";
        }*/
    }



    public function actualizarTelefono($dato, $paciente)
    {
        $link = conexion();
        $consulta = 'UPDATE pacientes SET telefono ="' . $dato . '" WHERE dni ="' . $paciente . '"';
        return mysqli_query($link, $consulta);
        
    }

    public function actualizarUsu($dato, $paciente)
    {
        $link = conexion();
        $consulta = 'UPDATE pacientes SET user ="' . $dato . '" WHERE dni ="' . $paciente . '"';

        if (mysqli_query($link, $consulta)) {
            echo "hola";
        }
    }

    public function actualizarPass($dato, $paciente)
    {
        $link = conexion();
        $consulta = 'UPDATE pacientes SET pass ="' . $dato . '" WHERE dni ="' . $paciente . '"';
        return mysqli_query($link, $consulta);
    }

    public function actualizarEmail($dato, $paciente)
    {
        $link = conexion();
        $consulta = 'UPDATE pacientes SET email ="' . $dato . '" WHERE dni ="' . $paciente . '"';
        return mysqli_query($link, $consulta);
    }

    public function Cambiar_medico($dato, $paciente)
    {
        $link = conexion();
        $consulta = 'UPDATE pacientes SET fk_medico =' . $dato . ' WHERE dni ="' . $paciente . '"';

        return mysqli_query($link, $consulta);
    }

    public function Nombre_medico($dato){

        $link = conexion();
        $consulta = 'SELECT nombre from medicos where  numero_colegiado =' . $dato . '';

        $resultado =  (mysqli_query($link, $consulta));
        if($fila =mysqli_fetch_row($resultado)) {
           return $fila[0];
            // header("Location:   http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_pacientes.php");
        } else {
            echo "error";
        }



        
    }





    public function insertarNuevoPaciente($dni, $nombre, $direccion, $telefono, $contraseña, $fk_medico, $email, $fecha_nac)
    {
        $link = conexion();


        $consulta = 'insert into  pacientes (dni,nombre,direccion,telefono,pass,fk_medico,email,fecha_nacimiento,fk_centro_medico)
            values("' . $dni . '","' . $nombre . '","' . $direccion . '",' . $telefono . ',' . $contraseña . ',' . $fk_medico . ',"' . $email . '","' . $fecha_nac . '",1)';
         return mysqli_query($link, $consulta);

       /* if (mysqli_query($link, $consulta)) {
            header("Location: ../vista/personal_sanitario/gestionar_pacientes.php");
        } else {
                         
        }*/
    }

    public function datos_paciente($dni)
    {
        $link = conexion();
        $paciente = array();
        $contador = 0;
        $consulta = 'SELECT    dni,nombre,direccion,telefono,fk_medico,email,fecha_nacimiento 
            FROM pacientes where dni = "' . $dni . '"';
       
        $resultado = (mysqli_query($link, $consulta));
        while ($fila = mysqli_fetch_row($resultado)) {
            $paciente[0] = $fila[0];
            $paciente[1] = $fila[1];
            $paciente[2] = $fila[2];
            $paciente[3] = $fila[3];
            $paciente[4] = $fila[4];
            $paciente[5] = $fila[5];
            $paciente[6] = $fila[6];
            
        }
        return $paciente;
    }


    public function getTelefonoME($dato)
    {
         $consulta_medicos= 'SELECT telefono FROM medicos WHERE numero_colegiado='.$dato.'';
          $link= conexion();
           $paciente = array();
          $result_medicos= mysqli_query($link, $consulta_medicos);
          if($fila= mysqli_fetch_row($result_medicos)){
              return $fila [0];
          }
    }

    public function getemailME($dato)
    {
         $consulta_medicos= 'SELECT email FROM medicos WHERE numero_colegiado='.$dato.'';
          $link= conexion();
          $result_medicos= mysqli_query($link, $consulta_medicos);
          if($fila= mysqli_fetch_row($result_medicos)){
              return $fila [0];
          }
    }

    public function citas($dato){
        $citas= 'SELECT * FROM citas WHERE fk_paciente="'.$dato.'"';
        $link= conexion();
        $paciente = array();
        $result= mysqli_query($link, $citas);
        while ($fila = mysqli_fetch_row($result)) {
            
            $paciente[3] = $fila[3];//hora
            $paciente[4] = $fila[4];//fecha_Cita
          
            
        }
        return $paciente;
        
    }
}
