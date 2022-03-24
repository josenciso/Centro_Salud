<?php
include 'conectar.php';

 

    class Medico{

        protected $usuario;
        protected $pass;
        
         public function __construct($usuario,$pass)
        {
            $this->usuario = $usuario;
            $this->pass = $pass;


 ;

         
        }

        function conectarse(){
            
          
            $link = conexion();
            $consulta= 'SELECT nombre FROM medicos WHERE pass='."$this->pass".'';
                        
            $result = mysqli_query($link,$consulta);
            
            
            echo $consulta."<br>";
            if($FILA=mysqli_fetch_row($result))
            {
                echo 'estas conectado como  paciente';
                echo $FILA[0];
            }
            else
            {
               header("Location: ../vista/error/error.html");
               die();
            }

        }

        

      

    }