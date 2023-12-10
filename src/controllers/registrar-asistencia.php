<?php
include("conexion.php");
    if(isset($_POST['btnEnviar'])){
        if (!empty($_POST["matricula"])) {
            date_default_timezone_set('America/Chihuahua');
            $matricula = trim($_POST["matricula"]);
            $fechaHoraActual = date("Y-m-d H:i:s");
            
            $sql_verificar = "SELECT matricula FROM alumnos 
            WHERE matricula = '$matricula'";
            $resultado_verificar = $conexion->query($sql_verificar);

            $sql="INSERT INTO asistencias(matricula,fecha_hora) 
            VALUES ('$matricula', '$fechaHoraActual')";

        if ($resultado_verificar->num_rows > 0) {
            if ($conexion->query($sql) === TRUE) {
                echo "<p class='ok'>¡Registro exitoso!</p>";
            } else {
                echo "<p class='bad'>Error al insertar el registro: " . $conexion->error."</p>";
            }
        }else {
            echo "<p class='alert'>La matricula ingresada no existe en la base de datos.</p>";
        }
    }else{
        echo "<p class='alert'>No se ha ingresado ninguna matricula.</p>";
    }
        $conexion->close();
    }
?>