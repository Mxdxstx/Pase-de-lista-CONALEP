<?php
include("conexion.php");
date_default_timezone_set('America/Chihuahua');
$fechaHoraActual = date('Y-m-d H:i:s'); 

if ($conexion->connect_error) {
    echo die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["matriculaAuto"])) {
    $codigo = trim($_POST["matriculaAuto"]);

    $sql = "INSERT INTO asistencias (matricula, fecha_hora) VALUES ('$codigo', '$fechaHoraActual')";
    
    if (mysqli_query($conexion, $sql)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>
