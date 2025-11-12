<?php
include("conexion.php");
date_default_timezone_set('America/Denver');
$sql = "SELECT * FROM visitas ORDER BY fecha_hora_entrada DESC";
$resultado = $conexion->query($sql);
$conexion->close();

?>
