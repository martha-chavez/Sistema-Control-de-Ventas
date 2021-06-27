<?php
session_start();
include('../models/coneccion.php');
$opcion = $_POST['opcion'];
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
switch ($opcion) {
    case '1': //agregar
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $usuario = $_POST['usuario'];
        $nuevoUsuario = "INSERT INTO Usuarios (nombre, usuario, password) VALUES ('$nombre', '$usuario','$password')  ";
        $resultado = mysqli_query($conexion, $nuevoUsuario);
        if ($resultado) {
            echo json_encode(array('agregado' => 1));
        } else {
            echo json_encode(array('agregado' => 0));
        }
        break;
    case '2': //listar
        $administradores = "SELECT id_usuario, nombre, usuario FROM Usuarios";
        $admin = mysqli_query($conexion, $administradores);
        $arreglo = array();
        while ($rows = $admin->fetch_array()) {
            $arreglo[] = array(
                'id_usuario' => $rows['id_usuario'],
                'nombre' => $rows['nombre'],
                'usuario' => $rows['usuario']
            );
        }

        if ($admin) {
            echo json_encode($arreglo);
        } else {
            echo json_encode(array('agregado' => 0));
        }


        break;
    case '3': //eliminar
        $consulta = "DELETE FROM Usuarios WHERE id_usuario='$id' ";
        $eliminar = mysqli_query($conexion, $consulta);
        $consulta = "SELECT id_usuario, nombre, usuario FROM Usuarios";
        $admin = mysqli_query($conexion, $consulta);
        $arreglo = array();
        while ($rows = $admin->fetch_array()) {
            $arreglo[] = array(
                'id_usuario' => $rows['id_usuario'],
                'nombre' => $rows['nombre'],
                'usuario' => $rows['usuario']
            );
        }

        if ($admin) {
            echo json_encode($arreglo);
        } else {
            echo json_encode(array('agregado' => 0));
        }
        break;
}
