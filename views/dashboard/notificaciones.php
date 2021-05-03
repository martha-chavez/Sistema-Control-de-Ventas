<?php require_once "vistas/parte_superior.php" ?>

<!--INICIO del cont principal-->
<div class="container">
    <div class="mx-5">
        <form method="POST" id="formNotificacion">
            <div class="card border-primary mx-auto mt-5" style="max-width: 28rem;">
                <div class="card-body text-primary">
                    <h5 class="card-title">Nueva Notificacion</h5>
                    <textarea type="text" class="form-control" aria-label="With textarea" id="contenido" placeholder="Escribe tu notificació o recordatorio" autocomplete="off" required></textarea>
                </div>
                <div class="card-footer bg-transparent border-primary">
                    <label class="card-text text-primary fw-bold">Fecha</label>
                    <input type="datetime-local" id="myLocalDate">
                </div>

                <button class="btn btn-primary" style="max-width: 28rem;" type="submit" class="btn btn-outline-primary btn-lg">Guardar</button>

        </form>
    </div>
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php" ?>