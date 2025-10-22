<?php
include("conexion.php");

$mensaje = "";
$mensajeError = "";

$alumno = null;
$grupos = [];

$result = $conexion->query("SELECT id_grupo, carrera, turno, clave_grupo  FROM grupos");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $grupos[] = $row;
    }
}

if (isset($_POST["guardar"])) {
    $matricula_original = $_POST["matricula_original"];
    $matricula_nueva = $_POST["matricula"];
    $nombres = $_POST["nombres"];
    $primer_apellido = $_POST["primer_apellido"];
    $segundo_apellido = $_POST["segundo_apellido"];
    $id_grupo = $_POST["grupo"];

    $stmt = $conexion->prepare("UPDATE alumnos SET matricula=?, nombres=?, primer_apellido=?, segundo_apellido=?, id_grupo=? WHERE matricula=?");
    $stmt->bind_param("ssssss", $matricula_nueva, $nombres, $primer_apellido, $segundo_apellido, $id_grupo, $matricula_original);

    if ($stmt->execute()) {
        $mensaje = "Datos actualizados correctamente.";
    } else {
        $mensajeError = "Error al actualizar los datos: " . $stmt->error;
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
