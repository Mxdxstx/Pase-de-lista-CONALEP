<?php
include("conexion.php");
date_default_timezone_set('America/Denver');
$fechaHoraActual = date("Y-m-d");

$sql = "SELECT 
    asistencias.matricula as matricula, 
    alumnos.primer_apellido as p_apellido, 
    alumnos.segundo_apellido as s_apellido,
    alumnos.nombres as nombres, 
    grupos.clave_grupo as grupo,
    fecha_hora
    FROM asistencias
    INNER JOIN alumnos
    ON asistencias.matricula=alumnos.matricula
    INNER JOIN grupos
    ON alumnos.id_grupo = grupos.id_grupo
    WHERE fecha_hora LIKE '%$fechaHoraActual%'
    ORDER BY fecha_hora DESC";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo "<tr class='encabezados'>
            <th>Matrícula</th>
            <th>Apellido(s)</th>
            <th>Nombre(s)</th>
            <th>Grupo</th>
            <th>Fecha y Hora</th>
      </tr>";
while ($fila = $resultado->fetch_assoc()) {
    echo "<tr class='datos-fila'>";
        echo "<td>" . $fila["matricula"] . "</td>";
        echo "<td>" . $fila["p_apellido"] . " " . $fila["s_apellido"] . "</td>";
        echo "<td>" . $fila["nombres"] . "</td>";
        echo "<td>" . $fila["grupo"] . "</td>";
        echo "<td>" . $fila["fecha_hora"] . "</td>";
    echo "</tr>";
    }
}else{
    echo "<p style='text-align: center;'>No se encontraron registros</p>";
}

$conexion->close();

?>
