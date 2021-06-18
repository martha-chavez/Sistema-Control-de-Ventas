<?php
include ('../models/coneccion.php');
session_start();

$id = $_SESSION["id"];
$fecha_actual = date("Y-m-d");
$date_future = date("Y-m-d",strtotime($fecha_actual."+ 15 days"));
$date_past = date ("Y-m-d",strtotime($fecha_actual."- 6 days"));

$consulta = "SELECT fecha, notificacion FROM notificaciones WHERE id_usuario = '$id' AND fecha BETWEEN '$date_past' AND  '$date_future'";
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
