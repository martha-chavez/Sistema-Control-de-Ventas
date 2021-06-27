$(document).ready(function () {
    tablaArchivos = $("#tablaArchivos").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><button class='btn btn-danger btnBorrarArchivo'><i class='far fa-trash-alt'></i></button></div>"
        }],

        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });
listararchivos();

    $("#archivoform").submit(function (e) {
        e.preventDefault();
        archivo = document.getElementById('archivo');
        let datos = new FormData();
        datos.append("archivo", archivo.files[0]);
        console.log(archivo.files[0].name);
        datos.append("opcion", 1)

        fetch('../../controllers/archivos.php', {
            method: 'POST',
            body: datos
        }).then(res => res.json())
            .then(({ agregado }) => {
                if (agregado === 1) {

                    swal("Agregado!", "Se agrego correctamente el archivo " + archivo.files[0].name, "success");

                    $("#archivoform").trigger("reset");

                } else {
                    swal("Oops!", "Tu datos son incorrectos, intenta de nuevo.", "error");
                }
            });
    });

    
    function listararchivos(){
            let datos = new FormData();
            datos.append("opcion", 2);
            fetch('../../controllers/archivos.php', {
                method: 'POST',
                body: datos
            }).then(res => res.json())
                .then((datos) => {
                    datos.forEach(data => {
                        id = data.id;
                        nombre = data.nombre_archivo;
                        fecha = data.fecha;
                        tablaArchivos.row.add([id, nombre, fecha]).draw();
    
                    });
                });
    
    
        
    }

    //Borrar 
    $(document).on("click", ".btnBorrarArchivo", function () {
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        archivo = $(this).closest("tr").find('td:eq(1)').text();
        let datos = new FormData();
        datos.append("opcion", 3)
        datos.append("id", id)
        datos.append("nombre_archivo", archivo)
        var respuesta = confirm("¿Está seguro de eliminar el archivo: " + archivo + "?");
        if (respuesta) {
            fetch('../../controllers/archivos.php', {
                method: 'POST',
                body: datos
            }).then(res => res.json())
                .then((datos) => {
                    datos.forEach(data => {
                        id = data.id;
                        nombre = data.nombre_archivo;
                        fecha = data.fecha;
                        tablaArchivos.row(fila.parents('tr')).remove().draw();

                    });
                });
        }
    });
})