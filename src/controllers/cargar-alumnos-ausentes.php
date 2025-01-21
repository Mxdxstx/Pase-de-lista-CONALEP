<link rel="stylesheet" href="../css/docentes.css">
<?php

include("conexion.php");

$grupoSeleccionado = $_GET["grupo"];
date_default_timezone_set('America/Mazatlan');
$fechaHoraActual = date("Y-m-d");

$sql = "SELECT alumnos.matricula, primer_apellido, nombres, asistencias.fecha_hora 
AS fecha, grupos.clave_grupo AS grupo
FROM alumnos
INNER JOIN grupos ON alumnos.id_grupo = grupos.id_grupo
LEFT JOIN asistencias ON alumnos.matricula = asistencias.matricula
AND DATE(asistencias.fecha_hora) = CURDATE()
WHERE grupos.id_grupo = '$grupoSeleccionado'
AND asistencias.fecha_hora IS NULL
ORDER BY primer_apellido;";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) { 
    echo "<h2>Alumnos ausentes  </h2>";    
    echo "<button id='btnExportar' class='btn btn-success'>
            <i class='fas fa-file-excel'></i> Exportar Datos a Excel
        </button> ";
    echo "<table id='datos' class='table-container'>";
    echo "<tr class='table_header'>
                <td>Matricula</td>
                <td>P. Apellido</td>
                <td>Nombre(s)</td>
                <td>Grupo</td>
                <td>Fecha</td>
            </tr>";
    while ($fila = $resultado->fetch_assoc()) {
        
        echo "<tr class = 'ausentes'>";
        echo "<td>" . $fila["matricula"] . "</td>";
        echo "<td>" . $fila["primer_apellido"] . "</td>";
        echo "<td>" . $fila["nombres"] . "</td>";
        echo "<td>" . $fila["grupo"] . "</td>";
        echo "<td>Ausencia</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

$conexion->close();
?>
