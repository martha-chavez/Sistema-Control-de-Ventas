
$(document).ready(function () {
    tablaAdministradores = $("#tablaAdministradores").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><button class='btn btn-danger btnBorrarAdmin'><i class='far fa-trash-alt'></i></button></div>"
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
    listaAdministradores();

    //listar administradores
    function listaAdministradores() {
        let datos = new FormData();
        datos.append("opcion", 2);
        fetch('../../controllers/administrador.php', {
            method: 'POST',
            body: datos
        }).then(res => res.json())
            .then((datos) => {
                datos.forEach(data => {
                    id = data.id_usuario;
                    nombre = data.nombre;
                    usuario = data.usuario;
                    tablaAdministradores.row.add([id, nombre, usuario]).draw();

                });
            });


    }
    
    //agregar administrador
    $("#n-administrador").submit(function (e) {
        e.preventDefault();
        nombre = document.getElementById('nombre');
        password = document.getElementById('password');
        usuario = document.getElementById('usuario');
        let datos = new FormData();
        datos.append("nombre", nombre.value);
        datos.append("password", password.value);
        datos.append("usuario", usuario.value);
        datos.append("opcion", 1)

        fetch('../../controllers/administrador.php', {
            method: 'POST',
            body: datos
        }).then(res => res.json())
            .then(({ agregado }) => {
                if (agregado === 1) {

                    swal("Agregado!", "Se agrego correctamente a " + nombre.value, "success");

                    $("#n-administrador").trigger("reset");

                } else {
                    swal("Oops!", "Tu datos son incorrectos, intenta de nuevo.", "error");
                }
            });
    });

    //Borrar Administradoe
    $(document).on("click", ".btnBorrarAdmin", function () {
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        let datos = new FormData();
        datos.append("opcion", 3)
        datos.append("id", id)
        var respuesta = confirm("¿Está seguro de eliminar el registro: " + id + "?");
        if (respuesta) {
            fetch('../../controllers/administrador.php', {
                method: 'POST',
                body: datos
            }).then(res => res.json())
                .then((datos) => {
                    datos.forEach(data => {
                        id = data.id_usuario;
                        nombre = data.nombre;
                        usuario = data.usuario;
                        tablaAdministradores.row(fila.parents('tr')).remove().draw();

                    });
                });
        }
    });
})