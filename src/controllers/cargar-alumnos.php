<link rel="stylesheet" href="../css/docentes.css">
<?php

include("conexion.php");

$grupoSeleccionado = $_GET["grupo"];
date_default_timezone_set('America/Denver');
$fechaHoraActual = date("Y-m-d");

$sql = "SELECT alumnos.matricula, primer_apellido, nombres, asistencias.fecha_hora AS fecha, grupos.clave_grupo AS grupo
FROM alumnos
INNER JOIN grupos ON alumnos.id_grupo = grupos.id_grupo
INNER JOIN asistencias ON alumnos.matricula = asistencias.matricula
WHERE grupos.id_grupo = '$grupoSeleccionado' AND asistencias.fecha_hora LIKE '%$fechaHoraActual%'
ORDER BY primer_apellido";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) { 
    echo "<div align='center'>
            <h2>Alumnos Presentes</h2>
        </div>";
    echo "<table id='datos' class='table-container'>
            <thead>
                <tr class='table_header'>
                    <th>Matricula</th>
                    <th>P. Apellido</th>
                    <th>Nombre(s)</th>
                    <th>Grupo</th>
                    <th>Estatus</th>
                    <th>Fecha</th>
                </tr>
            </thead>
        <tbody>";
    while ($fila = $resultado->fetch_assoc()) {
        
        echo "<tr class='presentes'>";
        echo "<td>" . $fila["matricula"] . "</td>";
        echo "<td>" . $fila["primer_apellido"] . "</td>";
        echo "<td>" . $fila["nombres"] . "</td>";
        echo "<td>" . $fila["grupo"] . "</td>";
        echo "<td>Presente</td>";
        echo "<td>" . $fila["fecha"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<div align='center'>
            <p>No se encontraron registros</p>
        </div>";
}

$conexion->close();
?>
