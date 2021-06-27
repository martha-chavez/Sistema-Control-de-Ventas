<?php require_once "vistas/parte_superior.php" ?>


<!--INICIO del cont principal target="_blank"-->
<div class="container">
    <div class="mx-5">
        <form id="archivoform" method="POST" enctype="multipart/form-data" >            
            <div class="card border-primary mx-auto mt-5" style="max-width: 80%;">
                <div class="card-body text-primary">
                    <h5 class="card-title">Subir archivo</h5>
                </div>
                <div class="card-footer bg-transparent border-primary">
                    <div>
                        <label class="form-label">Agregue nuevo archivo</label>
                        <input class="form-control form-control-lg" id="archivo" type="file" accept="application/pdf, .doc, .docx, .odf">
                   
                        <button type="submit" class="btn btn-outline-primary btn-lg mt-3 mx-auto">Guardar</button>

                    </div></div>
            </div>

        </form>
    </div>
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php" ?>