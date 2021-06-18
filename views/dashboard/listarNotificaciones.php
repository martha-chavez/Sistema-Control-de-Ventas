<?php require_once "vistas/parte_superior.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="listarNotificaciones" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Notificacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="contenidoNotificacion"> 
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once "vistas/parte_inferior.php" ?>