<?php
session_start();
include('../models/coneccion.php');
$contenido = $_POST['contenido'];
$fecha = $_POST['fecha'];
$id_usuario =  $_SESSION["id"];
$opcion = $_POST['opcion'];


switch ($opcion) {
    case '1':
        $nuevoUsuario = "INSERT INTO notificaciones (id_usuario, fecha, notificacion) 
            VALUES ('$id_usuario', '$fecha','$contenido')  ";
        $resultado = mysqli_query($conexion, $nuevoUsuario);
        if ($resultado) {
            echo json_encode(array('agregado' => 1));
        } else {
            echo json_encode(array('agregado' => 0));
        }
        break;
}
