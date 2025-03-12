<?php
include("conexion.php");
date_default_timezone_set('America/Mazatlan');
$fechaHoraActual = date("Y-m-d H:i:s");


if (isset($_POST['btnEnviar'])) {
    if (!empty($_POST["matriculaAuto"])) {
        $codigo = str_replace("'", "-", trim($_POST["matriculaAuto"]));
        $mtrValid = "SELECT * FROM alumnos WHERE matricula = '$codigo'";
        $mtrcons = mysqli_query($conexion, $mtrValid);

        if (mysqli_num_rows($mtrcons) > 0) {
            $sql = "INSERT INTO asistencias (matricula, fecha_hora) VALUES ('$codigo', '$fechaHoraActual')";
            if ($conexion->query($sql) === TRUE) {
                echo "<script>
                        window.onload = function() {
                            document.getElementById('modalMessage').innerText = 'Asistencia Registrada.';
                            document.getElementById('customAlert').classList.add('show');
                            setTimeout(() => { window.location = 'prefectos.php'; }, 1000);
                        };
                    </script>";
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

    echo "<script>
        history.replaceState(null, null, location.pathname);
    </script>";
?>
