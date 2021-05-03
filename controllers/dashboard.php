<?php
include ('../models/coneccion.php');
session_start();
$id = $_SESSION["id"];
$consulta = "SELECT fecha, notificacion FROM notificaciones WHERE id_usuario = '$id'";
$resultado = mysqli_query($conexion, $consulta);
$cantidad = $resultado->num_rows;

        $arreglo = array();
        while($rows = $resultado->fetch_array()) {
            $arreglo []= array(
                        'fecha' => $rows['fecha'],
                        'notificacion' => $rows['notificacion'],
                        'cantidad' => $cantidad
                        );
        }
        $data = $arreglo;
        print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS


?>
