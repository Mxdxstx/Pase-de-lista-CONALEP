<?php
include("conexion.php");
    if(isset($_POST['btnEnviar'])){
        if (!empty($_POST["nombre"] && (!empty($_POST["motivo"])) )) {
            date_default_timezone_set('America/Chihuahua');
            $nombre = trim($_POST["nombre"]);
            $motivo = trim($_POST["motivo"]);
            $fechaHoraActual = date("Y-m-d H:i:s");
            $fechaHoraSalida = date("Y-m-d H:i:s");
            $identificacion = trim($_POST["identificacion"]);

            $sql="INSERT INTO visitas(nombre, asunto, fecha_hora_entrada, fecha_hora_salida, identificacion) 
            VALUES ('$nombre', '$motivo', '$fechaHoraActual', '$fechaHoraSalida','$identificacion')";
        if ($conexion->query($sql) === TRUE) {
            header("Location: " . $_SERVER['PHP_SELF']);
            echo "<p class='ok'>¡Registro exitoso!</p><br/>";
            exit;
        } else {
            echo "<p class='bad'>Error al insertar el registro: " . $conexion->error."</p>";
        }
    }else{
        echo "<p class='alert'>Favor de llenar los campos correctamente.</p>";
    }
        $conexion->close();
    }
?>
