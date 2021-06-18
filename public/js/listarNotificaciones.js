// (document).ready(function () {
    listarNotificaciones = $("#listarNotificaciones").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><button class='btn btn-danger btnBorrarNot'><i class='far fa-trash-alt'></i></button></div>"
        }],

        "language": {
            "lengthMenu": "Mostrar _MENU_ notificaciones",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando notificaciones del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando notificaciones del 0 al 0 de un total de 0 registros",
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
    listarnotificaciones();
    //listar administradores
    function listarnotificaciones() {
        let datos = new FormData();
        datos.append("opcion", 2);
        fetch('../../controllers/notificaciones.php', {
            method: 'POST',
            body: datos
        }).then(res => res.json())
            .then((datos) => {
                // console.log("DATOS")
                datos.forEach(data => {

                    id = data.id_notificacion;
                    fecha = data.fecha;
                    notificacion = data.notificacion;
                    listarNotificaciones.row.add([id, fecha, notificacion]).draw();

                });
            });
    }


    $(document).on("click", ".btnBorrarNot", function () {
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        let datos = new FormData();
        datos.append("opcion", 3)
        datos.append("id", id)
        var respuesta = confirm("¿Está seguro de eliminar el notificacion: " + id + "?");
        if (respuesta) {
            fetch('../../controllers/notificaciones.php', {
                method: 'POST',
                body: datos
            }).then(res => res.json())
                .then((datos) => {
                    datos.forEach(data => {
                        id = data.id_notificacion;
                        fecha = data.fecha;
                        notificacion = data.notificacion;
                        listarNotificaciones.row.add([id, fecha, notificacion]).draw();

                    });
                });
        }
        location.reload(true); 
    });

    
// })