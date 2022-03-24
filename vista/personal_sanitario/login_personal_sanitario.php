<?php
@session_start();

if (!empty($_SESSION['usu'])) { //si ya existen la sesion, se comprueba si es medico =2 o administrativo =1; y los redirige a su pagina

  header("Location: portal_administrativo.php");
}
if (!empty($_SESSION['medico'])) {
  header("Location: portal_medico/portal_medico.php");
} else {
 

//cabeceras
include("../header/Medilab/header.php");?>

<!--<link rel="stylesheet" href="../../vista/css/styles_vista.css">-->
<body id="login_per">

</body>  <div></div>
  <p></p>
<?php include("../header/Medilab/top_bar.php")?>

<section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2 class="text-white">Acceso a personal sanitario </h2>
                <p class="text-white">Incicia sesion para acceder a las difefentes opciones</p>
            </div>
</section>



  <div class="container">
    <div class="row ">
      <div class="card col-6 cartas_inicio text-center" style="width:400px">
        <img class="card-img-top" src="../../img/admin.jpg" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">ACCESO  ADMINISTRATIVO</h4>
          <p class="card-text">
          <form action="../../controlador/control_administrativo.php" method="POST">
            <input class="entrada_personal" id="email" type="text" name="usu" placeholder="Su usuario">
            <input  class="entrada_personal cont" id="pass" type="password" name="pass" placeholder="Su contraseña">
            </p>
            <input type="submit" name="enviar"  class="entrada_personalenviar">
        </form>
        </div>
      </div>
      <div class="col-4"></div>
      <div class="card col-6 cartas_inicio text-center" style="width:400px">
        <img class="card-img-top" src="../../img/c1.jpg" alt="Card image">
        <div class="card-body">
          <h4 class="card-title">ACCESO PERSONAL MEDICO</h4>
          <p class="card-text">
          <form action="../../controlador/control_medico.php" method="POST">
            <input type="text"  id="medico" class="entrada_personal" name="usu" placeholder="Su usuario">
            <input type="password" class="entrada_personal " id="pass1" name="pass" placeholder="Su contraseña">
            </p>
            <input type="submit" name="enviar"  class="entrada_personalenviar">
            </form>
        </div>
      </div>
    </div>
  </div>



 <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="../personal_sanitario/js/login_personal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  







<?php


}
include("../header/Medilab/footer.php"); ?>



</body>
</html>
