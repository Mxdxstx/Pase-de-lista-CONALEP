<?php
include ("conexion.php");

$mensaje = "";
$mensajeError = "";
$alumno = null;

if (isset($_POST["eliminar"])) {
    $matricula = $_POST["matricula"];
    $stmt = $conexion->prepare("DELETE FROM alumnos WHERE matricula = ?");
    $stmt->bind_param("s", $matricula);
    if ($stmt->execute()) {
        $mensaje = "Alumno con matrícula <strong>$matricula</strong> eliminado correctamente.";
    } else {
        $mensajeError = "Error al eliminar el alumno.";
    }
    $stmt->close();
}

if (isset($_POST["buscar"])) {
    $matricula = $_POST["matricula"];
    $stmt = $conexion->prepare("SELECT * FROM alumnos WHERE matricula = ?");
    $stmt->bind_param("s", $matricula);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0) {
        $alumno = $resultado->fetch_assoc();
    } else {
        $mensajeError = "No se encontró al alumno con matrícula <strong>$matricula</strong>.";
    }
    $stmt->close();
}
$conexion->close();

echo "<script>
        history.replaceState(null, null, location.pathname);
    </script>";
?>