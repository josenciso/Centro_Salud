
<?php
require_once("../modelo/Paciente.php");

session_start();

if (empty($_SESSION['paciente0'])){

  header("Location: ../vista/pacientes/login_pacientes.php");
}
$usuario = new Paciente();

//usado en portal paciente boton anular cita

if (!empty($_POST['anula_paciente'])) { // SI CONTIENE DATOS EN SU INTERIOR  se elimina la cita y nos devuelve al origen 
 
  
  $dato= $_POST['anula_paciente'];
  $usuario = new Paciente();
  if($usuario->borrarCitas($dato)){
    $_SESSION['hay_citas']=false;
   //unset( $_SESSION['cita3']);
   //unset( $_SESSION['cita4']);
    ?>
    <script language="javascript">
    alert("BORRADO CON EXITO")
    </script>
 
<?php }
unset($usuario);

header("Location: http://localhost/PROYECTO_FINAL/vista/pacientes/portal_pacientes.php");
}
//---------------------------------HASTA AQUI---------------------------------------------------


//no usado, nunca pasa por aqui
if (!empty($_POST['citar'])) { 
  $dato = $_POST['citar'];
  $_SESSION['dato'] = $dato;
  header('Location: ../../calendario/calendario/index.php');
}

if (!empty($_POST['modificar']) || !empty($_POST['modificar1'])) {
  if (!empty($_POST['modificar'])) {
    $mod = $_POST['modificar'];
    echo $mod . ' vengo del modificar ';
  }
  if (!empty($_POST['modificar1'])) {
    $mod = $_POST['modificar1'];
    echo $mod;
    echo $mod . ' vengo del modificar 1';
  }
 
?>

  <form action="controlador/modificar_paciente.php" method="post">
    direccion
    <input type="text" name="direccion">
    telefono
    <input type="text" name="telefono">
    usuario
    <input type="text" name="usuario">
    contraseña
    <input type="password" name="contraseña">
    email
    <input type="email" name="email">
    <input type="text" name="mod" value="<?php echo  $mod; ?>" hidden="true">
    <input type="submit">
  </form>
<?php
}
