<?php
include 'conectar.php';


    class Personal_Sanitario
    {
        private $usuario;
        private $contraseña;
        
        //usuario es email

        public function __construct($usuario, $contraseña)
        {
            $this->usuario= $usuario;
            $this->contraseña = $contraseña;
        }

        public function conectarse()
        {
            $link = conexion();
            //distingue entre si es administrativo o medico
            $consulta_administrativo= 'SELECT nombre FROM administrativos WHERE pass='."$this->contraseña".' and email ="'."$this->usuario".'"';
            $consulta_medicos= 'SELECT nombre FROM medicos WHERE pass='."$this->contraseña".' and numero_colegiado ="'."$this->usuario".'"';
            echo $consulta_medicos;
        
            $result_admi= mysqli_query($link, $consulta_administrativo);
       
            $result_medicos= mysqli_query($link, $consulta_medicos);
           
            if ($admin=mysqli_fetch_row($result_admi)) {
                return 1;
            } elseif ($med=mysqli_fetch_row($result_medicos)) {
                return 2;
            } else {
                header("Location: ../vista/error/error_personal.html");
                die();
                session_destroy();
            }
        }


        /**
         * Get the value of contraseña
         */
        public function getContraseña()
        {
            return $this->contraseña;
        }

        /**
         * Set the value of contraseña
         *
         * @return  self
         */
        public function setContraseña($contraseña)
        {
            $this->contraseña = $contraseña;

            return $this;
        }

        /**
         * Get the value of usuario
         */
        public function getUsuario()
        {
            return $this->usuario;
        }

        /**
         * Set the value of usuario
         *
         * @return  self
         */
        public function setUsuario($usuario)
        {
            $this->usuario = $usuario;

            return $this;
        }

        public function getName()
        {
            $consulta_administrativo= 'SELECT nombre FROM administrativos WHERE pass='."$this->contraseña".' and email ="'."$this->usuario".'"';
            $consulta_medicos= 'SELECT nombre FROM medicos WHERE pass='."$this->contraseña".' and numero_colegiado ="'."$this->usuario".'"';
            //echo $consulta_medicos;
            $link= conexion();
            $result_admi= mysqli_query($link, $consulta_administrativo);
               
            $result_medicos= mysqli_query($link, $consulta_medicos);
                   
            if ($admin=mysqli_fetch_row($result_admi)) {
                return $admin[0];
            } elseif ($med=mysqli_fetch_row($result_medicos)) {
                return $med[0];
            }
        }



        public function delete_personal($codigo, $rol)//recibe el codigo de medico o admin, boolan
        {
            $link =conexion();
            if ($rol=="true") {
                $query = "delete from medicos where numero_colegiado=".$codigo." ";
                if ($link->query($query)) {
                    return true;
                }
            }
            if ($rol=="false") {
                $query = "delete from administrativos where cod_id=".$codigo." ";
                if ($link->query($query)) 
                    return true;
                
            }
            return false;
        }
        public function getTelefonoME($dato)
        {
             $consulta_medicos= 'SELECT telefono FROM medicos WHERE numero_colegiado='.$dato.'';
              $link= conexion();
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
    }