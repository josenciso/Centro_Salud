<?php
require_once("../modelo/Paciente.php");

session_start();
if (empty($_SESSION['administrativo'])) {

  header("Location: ../vista/personal_sanitario/login_personal_sanitario.php");
}
$usuario = new Paciente();



if (!empty($_POST['anular'])) { // SI CONTIENE DATOS EN SU INTERIOR  

  $dato= $_POST['anular'];
  $usuario = new Paciente();
  if($usuario->borrarCitas($dato)){
    ?>
    <script language="javascript">
    alert("BORRADO CON EXITO")
    </script>
 
<?php }

  header("Location: ../vista/personal_sanitario/gestionar_pacientes.php");
}

if (!empty($_POST['citar'])) { // SI CONTIENE DATOS EN SU INTERIOR  
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
