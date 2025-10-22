<?php
session_start();
if(empty($_SESSION["id"])) {
    header("location: login.php");
}
include '../controllers/busqElimAlumno.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Alumno</title>
    <link rel="stylesheet" href="../css/eliminarAlumno.css">
</head>
<body>
  <div class="container">
    <h2>Eliminar Alumno</h2>

    <form method="post" action="">
        <div class="centrado">
            <label for="matricula"><strong>Escribe la matrícula del alumno:</strong></label>
        </div> 
        <input type="text" name="matricula" id="matricula" required>
        <?php if (!empty($mensaje)): ?>
            <div class="mensaje"><?= $mensaje ?></div>
        <?php elseif (!empty($mensajeError)): ?>
            <div class="mensaje-error"><?= $mensajeError ?></div>
        <?php endif; ?>
        <input type="submit" name="buscar" value="Buscar Alumno">
    </form>


    <?php if ($alumno): ?>
        <div class="datos">
            <p><strong>Matrícula:</strong> <?= htmlspecialchars($alumno["matricula"]) ?></p>
            <p><strong>Nombre:</strong>
                <?= htmlspecialchars($alumno["nombres"]) ?>
                <?= htmlspecialchars($alumno["primer_apellido"]) ?>
                <?= htmlspecialchars($alumno["segundo_apellido"]) ?>
            </p>
            <form method="post" action="">
                <input type="hidden" name="matricula" value="<?= htmlspecialchars($alumno["matricula"]) ?>">
                <input type="submit" name="eliminar" value="Eliminar Alumno" class="btnBorrar">
            </form>
        </div>
    <?php endif; ?>

    <div class="a-centrado">
        <a href="inicioAdministrador.php" class="btn-primary">Regresar al Inicio</a>
    </div>
</div>
</body>
</html>
