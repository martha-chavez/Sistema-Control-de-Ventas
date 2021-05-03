<?php require_once "vistas/parte_superior.php" ?>
<!--INICIO del cont principal-->
<div class="container ">
    
    <?php
    include_once '../../models/coneccion.php';
    $consulta = "SELECT id, nombre, pais, ventas FROM personas";
    $data = mysqli_query($conexion, $consulta);
    ?>
    <div class="container d-flex  flex-row-reverse justify-content-end">
        <div class="row">
            <div class="col-3">
                <button id="btnNuevo" type="button" class="btn btn-outline-success btn-lg " data-toggle="modal">Nuevo</button>
            </div>
            
            
        </div>
        <div class="mx-auto " >
                <h1 > Ventas Totales</h1>
            </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>País</th>
                                <th>ventas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            foreach ($data as $dat) {
                            ?>
                                <tr>
                                    <td><?php echo $dat['id'] ?></td>
                                    <td><?php echo $dat['nombre'] ?></td>
                                    <td><?php echo $dat['pais'] ?></td>
                                    <td><?php echo $dat['ventas'] ?></td>
                                    <td></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--Modal para CRUD-->
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formPersonas">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="pais" class="col-form-label">País:</label>
                            <input type="text" class="form-control" id="pais">
                        </div>
                        <div class="form-group">
                            <label for="ventas" class="col-form-label">ventas:</label>
                            <input type="number" class="form-control" id="ventas">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-outline-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php" ?>