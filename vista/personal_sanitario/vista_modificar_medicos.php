<?php
session_start();
if (!empty($_SESSION['administrativo'])) { //si ya existen la sesion


} else {
    header("location: login_personal_sanitario.php");
}
include('../header/Medilab/header.php');
?>



<link rel="stylesheet" href="css/styles.css">
<body>
    <p></p>
    <?php
    include('../header/Medilab/top_bar.php');
     ?>
    
        <?php
        if (!empty($_POST['modificar'])) {
            $modi = $_POST['modificar'];

        ?><div class="container inicio_personal"><?php
        include("informacion.php");
        ?></div>
       
        <div class="col-1 services">
            <a href="../personal_sanitario/gestionar_personal.php">
                <div id=flecha_back>
                    <div class="icon"><i class="bi bi-arrow-left-circle"></i></div>

                </div>
            </a>
        </div>
     
 <!-- ======= Services Section ======= -->
 <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2>MODIFICAR MEDICO</h2>
                    <p>Marque las casillas que quiere cambiar</p>
                </div>

                <div class="row">









                </div>

            </div>
        </section>


            <?php


            ?>
            <div class="container" id="formulario">
            
            <h1></h1>
            <h2>Esta modificando :  <?php echo $_POST['nombre_a'];?></h2>
            <form action="../../controlador/mod_medicos.php" method="post" id="insertar">
                <div class=row>
                    <div class="col-6">
                        <div class="col-5">
                            <div class="form-group form-">
                                <!-- telefono-->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="casilla_telefono">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Telefono
                                    </label>
                                </div>

                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="969000000" disabled><span class="charly" id="telefono_error"> </span><span class="badge badge-warnings">Primary</span>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group col-5">
                                <!-- pass-->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="casilla_contrase??a">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Contrase??a
                                    </label>
                                </div>
                                <input type="password" class="form-control col-3" id="contrase??a" name="contrase??a" placeholder="......." disabled><span class="charly" id="contrase??a_error"> </span>
                                <input type="password" class="form-control" id="contrase??a_1" name="contrase??a_1" placeholder="......." disabled><span class="charly" id="contrase??a_1_error"> </span>                           
                            </div>

                        </div>
                        
                          
                
                        <div class="col-12">
                            <div class="form-group col-5">
                                <!-- email -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="casilla_email">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Email
                                    </label>
                                </div>

                                <input type="text" class="form-control" id="email" name="email" placeholder="abc@pepe.com" disabled><span class="charly" id="email_error"> </span>
                                <input type="text" name="modi" value="<?php echo  $modi; ?>" hidden="true">
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-3"> </div>
                        <div class="col-3">

                            <label for="date" class="control-label"></label>
                            <div class="form-group">
                                <!-- Enviar -->
                                <button type="submit" id="in" name="enviar" class="col-12 btn btn-warning" disabled>Pulse para modificar</button><span class="charly" id="enviar_error"> </span>
                            </div>
                        </div>
                    </div>


                    <div class=row>
                        <div class="col-3"> </div>
                        <div class="col-3"> <button id="verifica" type="button" class="btn btn-primary col-12" >Verificar Formulario</button>

                        </div>
                    </div>
            </form>
    </div>
    </div>

    <?php
    ?>
     <a>
        <section id="services" class="services ">
          <div class="col-1 " data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Disabled popover">
            <a id="cierre" href="../../controlador/logout.php">
              <div id=cierre_sesion>
                <div class="icon"><i class="bi bi-x-circle-fill "> </i></div>

              </div>
            </a>
          </div>

        </section>

      </a>
  <?php
    include('../header/Medilab/footer.php');
     ?>
    <script src="js/modificar_personal.js"></script>
    <script src="js/hora.js"></script>
</body>

</html>
<?php
        }
