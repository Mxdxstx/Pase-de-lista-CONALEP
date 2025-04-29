<?php
$consulta = "SELECT * FROM usuarios";
$guardar = $conexion->query($consulta);
date_default_timezone_set('America/Denver');
$fecha = date("d-m-Y");

$sql = "
SELECT 
    COUNT(asistencias.matricula) AS total_alumnos
FROM asistencias
INNER JOIN alumnos ON asistencias.matricula = alumnos.matricula
INNER JOIN grupos ON alumnos.id_grupo = grupos.id_grupo
WHERE DATE(fecha_hora) = CURDATE();
";

$resultado = $conexion->query($sql);

$totalAlumnos = 0;

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $totalAlumnos = $fila['total_alumnos'];
}
?>
