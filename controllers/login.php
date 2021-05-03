<?php
    session_start();
    include ('../models/coneccion.php');
    if (isset($_POST['usuario']) && !empty($_POST['usuario'])) {
        $usuario = $_POST ['usuario'];
        $password = $_POST ['password'];
        $consulta = "SELECT * FROM Usuarios where usuario = '$usuario' and password = '$password' ";
        $resultado = mysqli_query($conexion, $consulta);
        $sql ="SELECT id_usuario FROM Usuarios where usuario = '$usuario' and password = '$password' ";
        $result = mysqli_query($conexion, $sql);
        $id=$result->fetch_array()[0] ;

        $filas = mysqli_num_rows($resultado);
        if ($filas > 0) {
            $_SESSION["usuario"] = $usuario;
            $_SESSION["id"] = $id;
            
            echo json_encode(array('success'=>1));
            
        }else{
            echo json_encode(array('success'=>0));
        }
    }
?>