<?php
session_start();
if(empty($_SESSION["id"])) {
    header("location: login.php");
}
include '../controllers/busqEditAlumno.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
    <link rel="stylesheet" href="../css/editarAlumno.css">
</head>
<body>
  <div class="container">
    <h2>Editar Información del Alumno</h2>

    <form method="post" action="">
    <div class="centrado">
        <label for="matricula">Escribe la matrícula del alumno:</label>
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
            <form method="post" action="">
                <h3>Editar datos</h3>
                <label>Matrícula:</label>
                <input type="text" name="matricula" value="<?= htmlspecialchars($alumno["matricula"]) ?>" required>

                <input type="hidden" name="matricula_original" value="<?= htmlspecialchars($alumno["matricula"]) ?>">

                <label>Nombres:</label>
                <input type="text" name="nombres" value="<?= htmlspecialchars($alumno["nombres"]) ?>" required>

                <label>Primer Apellido:</label>
                <input type="text" name="primer_apellido" value="<?= htmlspecialchars($alumno["primer_apellido"]) ?>" required>

                <label>Segundo Apellido:</label>
                <input type="text" name="segundo_apellido" value="<?= htmlspecialchars($alumno["segundo_apellido"]) ?>" required>

                <label>Grupo:</label>
                <select name="grupo" required>
                    <?php foreach ($grupos as $grupo): ?>
                        <?php 
                            $nombreCompleto = $grupo["carrera"] . " - " . $grupo["clave_grupo"] . " - ". $grupo["turno"]; 
                            $selected = ($alumno["id_grupo"] == $grupo["id_grupo"]) ? 'selected' : '';
                        ?>
                        <option value="<?= $grupo["id_grupo"] ?>" <?= $selected ?>>
                            <?= htmlspecialchars($nombreCompleto) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" name="guardar" value="Guardar Cambios">
            </form>
        </div>
    <?php endif; ?>
    <div class="a-centrado">
        <a href="inicioAdministrador.php" class="btn-primary">Regresar al Inicio</a>
    </div>
  </div>
</body>
</html>
