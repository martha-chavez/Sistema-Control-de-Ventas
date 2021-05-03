<?php
include ('../models/coneccion.php');

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$pais = (isset($_POST['pais'])) ? $_POST['pais'] : '';
$ventas = (isset($_POST['ventas'])) ? $_POST['ventas'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : ''; 

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO personas (nombre, pais, ventas) VALUES('$nombre', '$pais', '$ventas') ";			
        $resultado = mysqli_query($conexion, $consulta);
        $consulta = "SELECT id, nombre, pais, ventas FROM personas ORDER BY id DESC LIMIT 1";
        $resultado = mysqli_query($conexion, $consulta);
        $arreglo = array();
        while($rows = $resultado->fetch_array()) {
            $arreglo []= array(
                        'id' => $rows['id'],
                        'nombre' => $rows['nombre'],
                        'pais' => $rows['pais'],
                        'ventas' => $rows['ventas']
                        );
        }
        $data = $arreglo;
        break;

    case 2: //modificación
        $consulta = "UPDATE personas SET nombre='$nombre', pais='$pais', ventas='$ventas' WHERE id='$id' ";		
        $resultado = mysqli_query($conexion, $consulta);
        $consulta = "SELECT id, nombre, pais, ventas FROM personas WHERE id='$id' ";  
        $resultado = mysqli_query($conexion, $consulta);
        $arreglo = array();
        while($rows = $resultado->fetch_array()) {
            $arreglo []= array(
                        'id' => $rows['id'],
                        'nombre' => $rows['nombre'],
                        'pais' => $rows['pais'],
                        'ventas' => $rows['ventas']
                        );
        }
        $data = $arreglo;
        break;        

    case 3://baja
        $consulta = "DELETE FROM personas WHERE id='$id' ";		
        $resultado = mysqli_query($conexion, $consulta); 
        $consulta = "SELECT id, nombre, pais, ventas FROM personas WHERE id='$id' ";  
        $resultado = mysqli_query($conexion, $consulta);
        $arreglo = array();
        while($rows = $resultado->fetch_array()) {
            $arreglo []= array(
                        'id' => $rows['id'],
                        'nombre' => $rows['nombre'],
                        'pais' => $rows['pais'],
                        'ventas' => $rows['ventas']
                        );
        }
        $data = $arreglo;                          
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
