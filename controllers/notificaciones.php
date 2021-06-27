<?php
session_start();
include('../models/coneccion.php');

$id_usuario =  $_SESSION["id"];
$opcion = $_POST['opcion'];


switch ($opcion) {
    case '1':
        $contenido = $_POST['contenido'];
        $fecha = $_POST['fecha'];
        $nuevoUsuario = "INSERT INTO notificaciones (id_usuario, fecha, notificacion) 
            VALUES ('$id_usuario', '$fecha','$contenido')  ";
        $resultado = mysqli_query($conexion, $nuevoUsuario);
        if ($resultado) {
            echo json_encode(array('agregado' => 1));
        } else {
            echo json_encode(array('agregado' => 0));
        }
        break;
    case '2':
        $notificaciones = "SELECT * FROM notificaciones WHERE id_usuario ='$id_usuario'";
        $notificacion = mysqli_query($conexion, $notificaciones);
        $arreglo = array();
        // print_r($arreglo);
        while($rows = $notificacion->fetch_array()) {
                    // print_r($arreglo);

            $arreglo []= array(
                        'id_notificacion' => $rows['id_notificacion'],
                        'fecha' => $rows['fecha'],
                        'notificacion' => $rows['notificacion']
                        );
        } 
        
        if ($notificacion) {
            echo json_encode($arreglo);
        } else {
            echo json_encode(array('agregado' => 0));
        }
        break;
    case '3'://eliminar
            $id = (isset($_POST['id'])) ? $_POST['id'] : ''; 
            $consulta = "DELETE FROM notificaciones WHERE id_notificacion='$id' ";	
            $eliminar = mysqli_query($conexion, $consulta);
            $consulta = "SELECT * FROM notificaciones WHERE id_usuario ='$id_usuario'";
            $notificacion = mysqli_query($conexion, $consulta);
            $arreglo = array();
            while($rows = $notificacion->fetch_array()) {
                $arreglo []= array(
                    'id_notificacion' => $rows['id_notificacion'],
                    'fecha' => $rows['fecha'],
                    'notificacion' => $rows['notificacion']
                    );
            }
            
            if ($notificacion) {
                echo json_encode($arreglo);
            } else {
                echo json_encode(array('agregado' => 0));
            }           
             break;
}