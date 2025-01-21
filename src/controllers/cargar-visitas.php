<?php
include("conexion.php");
date_default_timezone_set('America/Mazatlan');
$fechaHoraActual = date("Y-m-d");

$sql = "SELECT * FROM `visitas`  
        WHERE fecha_hora_entrada LIKE '%$fechaHoraActual%'
        ORDER BY fecha_hora_entrada DESC";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo "<tr class='encabezados'>
            <th>Nombre</th>
            <th>Asunto</th>
            <th>Fecha y hora de entrada</th>
            <th>Tipo de identificación</th>
         </tr>";
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
            echo "<td>" . $fila["nombre"] . "</td>";
            echo "<td>" . $fila["asunto"] . "</td>";
            echo "<td>" . $fila["fecha_hora_entrada"] . "</td>";
            echo "<td>" . $fila["identificacion"] . "</td>";
        echo "</tr>";
    }
}else{
    echo "<p style='text-align: center;'>No se encontraron registros</p>";
}

$conexion->close();

?>
