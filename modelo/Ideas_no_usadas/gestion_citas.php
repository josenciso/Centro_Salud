<?php
session_start();// por  borrar, 
 
 include_once('../controlador/control_citas_medicos.php');
 ?>

<section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Gestion de citas pacientes</h2>
          <p> Es necesario rellene todos los campos, si tiene que recetar un medicamento, pulse siguiente para avanzar a la pantalla de m. </p>
        </div>

        <form action="" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
            <div class="col-md-3 form-group">
               <label for="name"> Nombre del paciente</label>
              <input type="text" name="name" class="form-control" id="name" value="<?php echo $_POST['nombre']    ?>" disabled>
            </div>
             <div class="col-md-1 form-group mt-3 mt-md-0">
            <label for="name"> Edad</label>
              <input type="number" class="form-control" name="edad" value="<?php echo $_POST['edad']    ?>" disabled >
            </div>
            <div class="col-md-2 form-group mt-3 mt-md-0">
            <label for="name"> telefono</label>
              <input type="tel" class="form-control" name="phone" id="telefono" value="<?php echo $_POST['telefono']    ?>" disabled  >
            </div>
          </div>
          <div class="row">
            <div class="col-md-2 form-group mt-3">
              <input type="datetime" name="date" class="form-control datepicker" id="date" value="<?php echo $_POST['fecha']    ?>" disabled >
            </div>
          
         

          <div class="form-group col-12">
            <textarea class="form-control" name="message" rows="5" placeholder="Tratamiento"></textarea>
           
          </div>
       
          <div class="text-center col-4"><button type="submit">CONTINUAR</button></div>
       
       
         <div> </div>
         <?php include_once("../Api/index.php") ;?>
         </form>

      </div>
    </section><!-- End Appointment Section -->

    <?php
   var_dump($_SESSION);

   echo "<hr>";

   var_dump($_POST);