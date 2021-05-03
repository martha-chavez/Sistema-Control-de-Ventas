<?php require_once "vistas/parte_superior.php";
?>

<!--INICIO del cont principal-->
<div class="container">
    <div class="alert alert-success none" role="alert" id="alertNo" style="display :none">
        Se agrego correctamente a  <a href="#" class="alert-link" id="n-usuario"></a>.
    </div>
    <h1>Agregar Administrador</h1>

    <div class="mx-5">
        <form id="n-administrador" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class=" fw-bold ">Nombre del Administrador</label>
                <input type="text" class="form-control" id="nombre" autocomplete="off" required >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class=" fw-bold ">Usuario</label>
                <input type="text" class="form-control" id="usuario" autocomplete="off" required >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-lg ">Agregar</button>
        </form>
    </div>


</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php" ?>