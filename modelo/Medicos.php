<?php

require_once 'Personal_sanitario.php';


    class Medico extends Personal_Sanitario{

       
        
         
    
            public function actualizarTelefono($dato,$medico){
    
                
                $link = conexion();
                $consulta= 'UPDATE medicos SET telefono ='.$dato.'  WHERE numero_colegiado ='.$medico.'';
                //echo $consulta;
                return  mysqli_query($link, $consulta);

                //if( mysqli_query($link, $consulta)){
                //    header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_personal.php");
                //}
                //else{
                //    echo "error";    
               // }
    
    
            }
    
            public function actualizarUsu($dato,$medico){
    
                
                $link = conexion();
                $consulta= "UPDATE medicos SET user ='". $dato."'  WHERE numero_colegiado ='$medico'";
               // echo $consulta;
                if( mysqli_query($link, $consulta)){
                    echo "hola";
                }else{
                    echo "error";
                }
    
    
            }
    
            
            
            
            public function actualizarPass($dato,$medico){
    
                
                $link = conexion();
                $consulta= "UPDATE medicos SET pass = $dato WHERE numero_colegiado =$medico";
                //echo $consulta;
                return mysqli_query($link, $consulta);
                /*
                if( mysqli_query($link, $consulta)){
                    header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_personal.php");
                }
                    */
    
            }
    
            public function actualizarEmail($dato,$medico){
    
                
                $link = conexion();
                $consulta= 'UPDATE medicos SET email ="'.$dato.'" WHERE numero_colegiado ='.$medico.'';
                //echo $consulta;
                return mysqli_query($link, $consulta);
               /* 
                if( mysqli_query($link, $consulta)){
                    header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_personal.php");
                }else{
                    return    "no";
                }
                */
    
            }

            public function actualizarCentro($dato,$medico){
    
                
                $link = conexion();
                $consulta= 'UPDATE medicos SET fk_centro ="'. $dato.'"   WHERE numero_colegiado ='.$medico.'';
                
                if( mysqli_query($link, $consulta)){
                   
                }
    
    
            }
        
            public function insertar_nuevo_medico($num,$nombre,$telefono,$contraseña,$email){
           
           
               $query="INSERT INTO MEDICOS (numero_colegiado,nombre,telefono,pass,fk_centro,email)
               values (".$num.",'".$nombre."',".$telefono.",".$contraseña.",1,'".$email."')";
                $link = conexion();
                if( mysqli_query($link, $query)){
                    header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_personal.php");
                }
                else{
                   echo "ocurrio un error en el intento";
                }
            }
      

    }