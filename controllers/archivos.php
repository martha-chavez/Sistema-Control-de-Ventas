<?php
session_start();
include('../models/coneccion.php');
$id_usuario =  $_SESSION["id"];
$opcion = $_POST['opcion'];


$carpeta = '../public/archivos/';


switch ($opcion) {
    case '1'://agregar
        $nombre_archivo= $_FILES["archivo"]["name"];
        $uscarpeta = $carpeta.'usuario_'.$id_usuario.'/';
        
        //si no existe la catpeta la crea
        if (!file_exists($uscarpeta)) {
            mkdir($uscarpeta, 0777, true);
        }
        // adjunta el archivo a la  direccion de la carpeta
        $archivo = $uscarpeta.basename($_FILES["archivo"]["name"]);

        //mueve el archivo a la carpeta
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo)) {
            // echo  " se movio";
            $guardar_archivo = "INSERT INTO archivos (id_usuario, nombre_archivo, ubicacion, fecha_agrego) VALUES ('$id_usuario', '$nombre_archivo','$uscarpeta',NOW())";
            $resultado = mysqli_query($conexion, $guardar_archivo);
            if ($resultado) {
                echo json_encode(array('agregado' => 1));
            } else {
                echo json_encode(array('agregado' => 0));
            }
        }else {
            echo json_encode(array('agregado' => 0));
        }
        break;
        case '2': //listar
            $archivos = "SELECT nombre_archivo, id_archivo, fecha_agrego FROM archivos WHERE id_usuario = '$id_usuario'";
            $arch = mysqli_query($conexion, $archivos);
            $arreglo = array();
            while ($rows = $arch->fetch_array()) {
                $arreglo[] = array(
                    'nombre_archivo' => $rows['nombre_archivo'],
                    'id' => $rows['id_archivo'],
                    'fecha' => $rows['fecha_agrego']
                );
            }
    
            if ($arch) {
                echo json_encode($arreglo);
            } else {
                echo json_encode(array('agregado' => 0));
            }
    
    
            break;
            case '3': //eliminar
                $id = (isset($_POST['id'])) ? $_POST['id'] : ''; 
                $nombre_archivo = $_POST['nombre_archivo'];
                $uscarpeta = $carpeta.'usuario_'.$id_usuario.'/';
                $consulta = "DELETE FROM archivos WHERE id_archivo='$id' ";
                $eliminar = mysqli_query($conexion, $consulta);
                if ($eliminar) {
                    unlink($uscarpeta.$nombre_archivo);
                }
                $consulta = "SELECT nombre_archivo, id_archivo, fecha_agrego FROM archivos WHERE id_usuario = '$id_usuario'";
                $nueArchivo = mysqli_query($conexion, $consulta);
                $arreglo = array();
                while ($rows = $nueArchivo->fetch_array()) {
                    $arreglo[] = array(
                        'nombre_archivo' => $rows['nombre_archivo'],
                        'id' => $rows['id_archivo'],
                        'fecha' => $rows['fecha_agrego']
                    );
                }
        
                if ($nueArchivo) {
                    echo json_encode($arreglo);
                } else {
                    echo json_encode(array('agregado' => 0));
                }
                break;
        }
?>