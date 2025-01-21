<?php
include("conexion.php");
date_default_timezone_set('America/Mazatlan');
$fechaHoraActual = date("Y-m-d H:i:s");


if (isset($_POST['btnEnviar'])) {
    if (!empty($_POST["matriculaAuto"])) {
        $codigo = str_replace("'", "-", $_POST["matriculaAuto"]);
        $mtrValid = "SELECT * FROM alumnos WHERE matricula = '$codigo'";
        $mtrcons = mysqli_query($conexion, $mtrValid);

        if (mysqli_num_rows($mtrcons) > 0) {
            $sql = "INSERT INTO asistencias (matricula, fecha_hora) VALUES ('$codigo', '$fechaHoraActual')";
            if ($conexion->query($sql) === TRUE) {
                header("Location: " . $_SERVER['PHP_SELF']);   
                echo "<p class='ok'>Se ingresó la matrícula correctamente.</p>";             
                exit();
            } else {
                echo "<p class='bad'>Error al insertar el registro: " . $conexion->error . "</p>";
            }
        } else {
            echo "<p class='alert'>La matrícula ingresada no existe en la base de datos.</p>";
        }
    } else {
        echo "<p class='alert'>No se ha ingresado ninguna matrícula.</p>";
    }
        $conexion->close();
    }
?>
