<?php
include("conexion.php");

$grupoSeleccionado = $_GET["grupo"];

$sql = "SELECT matricula, primer_apellido, nombres, grupos.clave_grupo AS grupo
        FROM alumnos
        INNER JOIN grupos ON alumnos.id_grupo = grupos.id_grupo
        WHERE grupos.id_grupo = '$grupoSeleccionado'
        ORDER BY a_paterno";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>Matricula</td>
                <td>P. Apellido</td>
                <td>Nombre(s)</td>
                <td>Grupo</td>
            </tr>";
        echo "<tr>";
        echo "<td>" . $fila["matricula"] . "</td>";
        echo "<td>" . $fila["primer_apellido"] . "</td>";
        echo "<td>" . $fila["nombres"] . "</td>";
        echo "<td>" . $fila["grupo"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "No se encontraron resultados.";
}

$conexion->close();
?>