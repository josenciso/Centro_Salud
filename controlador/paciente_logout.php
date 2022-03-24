
<?php
session_start();
if(!empty($_SESSION['paciente'])){//SI NO ESTA VACIA DESTRUIR
    session_destroy();
    header("Location: ..");
}else{
    header("Location: ../vista/pacientes/login_pacientes.php");
}



