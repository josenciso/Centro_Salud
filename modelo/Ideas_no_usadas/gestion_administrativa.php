
<?php
// ¿En desuso, directamente gestionado desde vista?
include '../modelo/conectar.php';
$conectar=conexion();
 if (!empty($_POST['pacientes'])) { //SI PULSA PACIENTES O MEDICO LLEVA A UNA PAGINA U OTRA

//header("Location: gestionar_pacientes.php");

$pacientes = "SELECT  * FROM pacientes";
$resultado = mysqli_query($conectar, $pacientes);




?>
<<!--
<div class="row">
    <div class="form-outline mb-5 ">
        <label class="form-label center" for="datatable-search-input">Buscar</label>
        <input type="search" class="form-control " id="datatable-search-input">

    </div>
    <div id="datatable">
    </div>
</div>
<table class="table table-striped">

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>NOMBRE</th>
                    <th>DIRECCION</th>
                    <th>TELEFONO</th>
                    <th>USUARIO</th>
                    <th>EMAIL</th>
                </tr>
            </thead>
            <?php while ($fila = mysqli_fetch_row($resultado)) {
            ?>

                <tbody>
                    <tr>

                        <td><?php echo $fila[0]; ?></td>

                        <td> <?php echo $fila[1]; ?> </td>
                        <td> <?php echo $fila[2]; ?> </td>
                        <td> <?php echo $fila[3]; ?> </td>
                        <td> <?php echo $fila[4]; ?> </td>
                        <td> <?php echo $fila[7]; ?></td>
                        <td>
                            Si tiene cita o no, se podra cancelar 
                            <?php
                            $query = "SELECT cod_id,fecha_cita,fk_medico,hora,fk_paciente FROM citas where fk_paciente='" . $fila[0] . "'";

                            $si = mysqli_query($conectar, $query);

                            if ($tiene_cita = mysqli_fetch_row($si)) {
                                //guardo en una sesion por problemas de enviar datos despues del else

                            ?>
                              <form action="../../controlador/borrar_citas_pacientes.php" method="POST">
                                    <button type="submit" name="anular" value="<?php echo $tiene_cita[4]; ?>" class="btn btn-danger col-3">ANULAR</button>
                                    <button type="submit" name="modificar" value="<?php echo $tiene_cita[4]; ?>" class="btn btn-warning col-3">MODIFICAR</button>
                            

                            <?php     } else {
                            ?>

                              
                                    <button type="submit" name="citar" value="<?php echo $fila[0]; ?>" aria-hidden="true" class="btn btn-primary col-3 ">CITAR</button>
                       

                             
                                    <button type="submit" name="modificar1" value="<?php echo $fila[0]; ?>" aria-hidden="true" class="btn btn-warning col-3">MODIFICAR</button>
                                </form>



                        </td>
                    </tr>

            <?php    }
                        } ?>

        </table>-->

  <!--   <?php } else if (!empty($_POST['medicos'])) { //

        $personal = "SELECT  * FROM medicos";
        $resultado = mysqli_query($conectar, $personal); ?>
        <div class="row">
            <div class="form-outline mb-5 ">
                <label class="form-label center" for="datatable-search-input">Buscar</label>
                <input type="search" class="form-control " id="datatable-search-input">

            </div>
            <div id="datatable">
            </div>
        </div>
        <table class="table table-striped">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Numero de Colegiado</th>
                            <th>NOMBRE</th>
                            <th>TELEFONO EXT</th>
                            <th>USER</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php while ($fila = mysqli_fetch_row($resultado)) {
            ?>

                        <tbody>
                            <tr>

                                <td><?php echo $fila[0]; ?></td>

                                <td> <?php echo $fila[1]; ?> </td>
                                <td> <?php echo $fila[2]; ?> </td>
                                <td> <?php echo $fila[3]; ?> </td>
                                <!--
            <td> //<?php echo $fila[4]; ?> </td>
            <td> //<?php echo $fila[7]; ?></td>-->
                                <td>
                                   Si tiene cita o no, se podra cancelar

                                    <form action="vista_modificar_medicos.php" method="POST">
                                        <!-- <button type="submit" name="anular" value ="<?php echo $tiene_cita[4]; ?>" class="btn btn-danger col-3"></button>-->
                                        <button type="submit" name="modificar" value="<?php echo $fila[0]; ?>" class="btn btn-warning col-3">MODIFICAR</button>
                                    </form>

                                    <?php


                                    ?>




                                </td>
                            </tr>

                        <?php
        } ?>

                </table> -->
    <?php
    }else header("Location: /PROYECTO_FINAL/");