<?php
include("conexion.php");

$mensaje = "";
$mensajeError = "";

if (isset($_POST['Enviar'])) {
    $matricula = $_POST['matricula'];
    $nombres = $_POST['nombres'];
    $primer_apellido = $_POST['apellidoP'];
    $segundo_apellido = $_POST['apellidoM'];
    $id_grupo = $_POST['grupo'];

    $stmt = $conexion->prepare("INSERT INTO alumnos (matricula, nombres, primer_apellido, segundo_apellido, id_grupo) VALUES (?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("ssssi", $matricula, $nombres, $primer_apellido, $segundo_apellido, $id_grupo);

        try {
            $stmt->execute();
            $mensaje = "Alumno con matrícula <strong>$matricula</strong> agregado correctamente.";
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                $mensajeError = "Error: Ya existe un alumno con la matrícula <strong>$matricula</strong>.";
            } else {
                $mensajeError = "Error al registrar: " . $e->getMessage();
            }
        }

        $stmt->close();
    } else {
        $mensajeError = "Error al preparar la consulta: " . $conexion->error;
    }

    $conexion->close();
}

echo "<script>
      history.replaceState(null, null, location.pathname);
</script>";
?>
