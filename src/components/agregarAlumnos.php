<?php
session_start();
if(empty($_SESSION["id"])) {
    header("location: login.php");
}
include '../controllers/registrar-alumno.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Alumnos</title>
    <link rel="stylesheet" href="../css/agregarAlumno.css">
</head>
<body>
    <h2>Registro de Alumnos</h2>
    <form method="POST" action="">
        <label for="matricula">Matrícula:</label>
        <input type="text" id="matricula" name="matricula" required><br>

        <label for="nombres">Nombre(s):</label>
        <input type="text" id="nombres" name="nombres" required><br>

        <label for="apellidoP">Apellido Paterno:</label>
        <input type="text" id="apellidoP" name="apellidoP" required><br>

        <label for="apellidoM">Apellido Materno:</label>
        <input type="text" id="apellidoM" name="apellidoM" required><br>

        <label for="grupo">ID Grupo:</label>
        <select id="grupo" name="grupo" required>
            <option value="">Selecciona un grupo</option>
            <option value="1">INFORMATICA - 101 (Matutino)</option>
            <option value="2">INFORMATICA - 102 (Matutino)</option>
            <option value="3">MANTENIMIENTO DE SISTEMAS ELECTRÓNICOS - 103 (Matutino)</option>
            <option value="4">PRODUCTIVIDAD INDUSTRIAL - 104 (Matutino)</option>
            <option value="5">PLASTICOS - 105 (Matutino)</option>
            <option value="6">TURISMO - 106 (Matutino)</option>
            <option value="7">INFORMATICA - 101 (Vespertino)</option>
            <option value="8">MANTENIMIENTO DE SISTEMAS ELECTRONICOS - 108 (Vespertino)</option>
            <option value="9">MANTENIMIENTO DE SISTEMAS ELECTRONICOS - 109 (Vespertino)</option>
            <option value="10">SEGURIDAD, HIGIENE Y PROTECCION CIVIL - 110 (Vespertino)</option>
            <option value="11">TURISMO - 111 (Vespertino)</option>
            <option value="12">INFORMATICA - 301 (Matutino)</option>
            <option value="13">INFORMATICA - 302 (Matutino)</option>
            <option value="14">MANTENIMIENTO DE SISTEMAS ELECTRONICOS - 303 (Matutino)</option>
            <option value="15">PRODUCTIVIDAD INDUSTRIAL - 304 (Matutino)</option>
            <option value="16">SEGURIDAD E HIGIENE Y PROTECCION CIVIL - 305 (Matutino)</option>
            <option value="17">INFORMATICA - 306 (Vespertino)</option>
            <option value="18">MANTENIMIENTO DE SISTEMAS ELECTRONICOS - 307 (Vespertino)</option>
            <option value="19">MANTENIMIENTO DE SISTEMAS ELECTRONICOS - 308 (Vespertino)</option>
            <option value="20">PRODUCTIVIDAD INDUSTRIAL - 309 (Vespertino)</option>
            <option value="21">PLASTICOS - 310 (Vespertino)</option>
            <option value="22">SEGURIDAD, HIGIENE Y PROTECCION CIVIL - 311 (Vespertino)</option>
            <option value="23">TURISMO - 312 (Vespertino)</option>
            <option value="24">INFORMATICA - 501 (Matutino)</option>
            <option value="25">MANTENIMIENTO DE SISTEMA ELECTRONICOS - 502 (Matutino)</option>
            <option value="26">PRODUCTIVIDAD INDUSTRIAL - 503 (Matutino)</option>
            <option value="27">PLASTICOS - 504 (Matutino)</option>
            <option value="28">SEGURIDAD, HIGIENE Y PROTECCION CIVIL - 505 (Matutino)</option>
            <option value="29">TURISMO - 506 (Matutino)</option>
            <option value="30">INFORMATICA - 507 (Vespertino)</option>
            <option value="31">MANTENIMIENTO DE SISTEMA ELECTRONICOS - 508 (Vespertino)</option>
            <option value="32">PLASTICOS - 509 (Vespertino)</option>
            <option value="33">SEGURIDAD, HIGIENE Y PROTECCION CIVIL - 510 (Vespertino)</option>
            <option value="34">TURISMO - 511 (Vespertino)</option>
        </select>
        <?php if (!empty($mensaje)): ?>
            <div class="mensaje"><?= $mensaje ?></div>
        <?php elseif (!empty($mensajeError)): ?>
            <div class="mensaje-error"><?= $mensajeError ?></div>
        <?php endif; ?>

        <div class="btnAcciones">
            <input type="submit" name="Enviar" value="Enviar" >
            <a href="inicioAdministrador.php">Regresar al Inicio</a>
        </div>
        <?php
            if(isset($_POST['Enviar'])){
            include("../controllers/registrar-alumno.php");}
        ?>
    </form>
</body>
</html>
