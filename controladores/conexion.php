<?php
$conexion = mysqli_connect("localhost", "root", "", "conalep");

if ($conexion->connect_error) {
    echo die("Error de conexión: " . $conexion->connect_error);
}
?>