
$(document).ready(function () {
    let cantidad = document.getElementById('cantidad');
    //Agregar notificaciones
    $("#formNotificacion").submit(function (e) {
        e.preventDefault();
        contenido = document.getElementById('contenido');
        fecha = document.getElementById('myLocalDate');

        let datos = new FormData();
        datos.append("contenido", contenido.value);
        datos.append("fecha", fecha.value);
        datos.append("opcion", 1)

        console.log("manda", fecha.value, contenido.value);
        fetch('../../controllers/notificaciones.php', {
            method: 'POST',
            body: datos
        }).then(res => res.json())
            .then(( agregado ) => {
                console.log(agregado)
                if (agregado.agregado === 1) {
                    swal("Agregado!", "Se guardo correctamente la notificacion", "success");
                    // cantidad.innerHTML = agregado.cantidad;
                    // $("#formNotificacion").trigger("reset");

                } else {
                    alert("Oops!", "Tu datos son incorrectos, intenta de nuevo.", "error");
                }

            });
            location.reload(true); 
    });


    
})