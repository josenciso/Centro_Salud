<?php
//esta no se usa 

include '../modelo/PersonalSanitario.php';

include_once '../modelo/conectar.php';

session_start();
if(empty($_SESSION['pass'])){
  header("Location: ../vista/personal_sanitario/login_personal_sanitario.php");
}
$conectar=conexion(); 
//si intentan acceder a la pagina directamente, sin estar logeado


if (!empty ($_POST['pacientes'])){
    echo "vista para gestionar pacientes";
//ESTA PAGINA NO VA A SER USADA
   ?> 
   <div class="dropdown">;
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      SELECIONE PACIENTE
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

      <?php $pacientes = "SELECT  * FROM pacientes";
        $resultado = mysqli_query($conectar, $pacientes);
        while ($fila = mysqli_fetch_row($resultado)) {
         echo "<li class='dropdown-item'>" . $fila[1] . "</li>";
  }   ?>
    </ul>
  </div>
</div>
  <?php







}
if (!empty ($_POST['medicos'])){
    echo "vista para gestionar medico";

}




