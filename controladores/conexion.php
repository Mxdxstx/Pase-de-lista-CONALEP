<?php
$conexion = mysqli_connect("localhost", "root", "", "pase_lista");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>