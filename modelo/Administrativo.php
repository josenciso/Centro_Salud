<?php

require_once 'Personal_sanitario.php';


    class Administrativo extends Personal_Sanitario{

       
        
         
    
            public function actualizarTelefono($dato,$administrativo){
    
                
                $link = conexion();
                $consulta= 'UPDATE administrativos SET telefono ='.$dato.'  WHERE cod_id ='.$administrativo.'';
                
                return mysqli_query($link, $consulta);

                if( mysqli_query($link, $consulta)){
                   header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_personal.php");
                  
                }else{
                    return false;
               }
    
            }
    
    
            
            
            
            public function actualizarPass($dato,$administrativo){
    
                
                $link = conexion();
                $consulta= 'UPDATE administrativos SET pass ='.$dato.' WHERE cod_id ='.$administrativo.'';
               
                return mysqli_query($link, $consulta);//devuelve 1
                   // header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_personal.php");
                
    
    
            }
    
            public function actualizarEmail($dato,$administrativo){
    
                
                $link = conexion();
                $consulta= 'UPDATE administrativos SET email ="'.$dato.'" WHERE cod_id ='.$administrativo.'';
                return mysqli_query($link, $consulta);
                //return( mysqli_query($link, $consulta));//{


                  //  header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_personal.php");
                //}else{
                    
                //}
    
    
            }

            public function actualizarCentro($dato,$administrativo){
    
                
                $link = conexion();
                $consulta= 'UPDATE administrativos SET fk_centro ="'.$dato.'"   WHERE cod_id ='.$administrativo.'';
                echo $consulta;
                if( mysqli_query($link, $consulta)){
                    echo "hola";
                }else{
                    return    false;
                }
    
    
            }

            public function insertar_nuevo_administrativo($num,$nombre,$telefono,$contraseña,$email){
           
           
                $query="INSERT INTO administrativos (cod_id,nombre,telefono,pass,centro_trabajo,email)
                values (".$num.",'".$nombre."',".$telefono.",".$contraseña.",1,'".$email."')";
                 $link = conexion();
                 if( mysqli_query($link, $query)){
                     header("Location: http://localhost/PROYECTO_FINAL/vista/personal_sanitario/gestionar_personal.php");
                 }
                 else{
                    
                    return    false;
                 }
             }
        

      

    }