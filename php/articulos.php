<?php
header('Content-Type: application/json');
require("conexion.php");

$conexion = retornarConexion();

switch ($_GET['accion']) {
    case 'listar':
        $datos = mysqli_query($conexion, "SELECT codigo, descripcion, precio FROM articulos");
        $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;

    case 'agregar':
        $respuesta = mysqli_query($conexion, "INSERT INTO articulos (descripcion, precio) VALUES ('$_POST[descripcion]', $_POST[precio])");
        echo json_encode($respuesta);
        break;

    case 'borrar':
        $respuesta = mysqli_query($conexion, "DELETE FROM articulos WHERE codigo = $_GET[codigo]");
        echo json_encode($respuesta);
        break;

    case 'consultar':
        $datos = mysqli_query($conexion, "SELECT codigo, descripcion, precio FROM articulos WHERE codigo = $_GET[codigo]");
        $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;

    case 'modificar':
        $respuesta = mysqli_query($conexion, "UPDATE articulos SET descripcion = '$_POST[descripcion]', precio = $_POST[precio] WHERE codigo = $_GET[codigo]");
        echo json_encode($respuesta);
        break;
}
?>
