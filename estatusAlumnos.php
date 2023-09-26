<link rel="stylesheet" href="css/docentes.css">
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/estatusAlumnos.css">
<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estatus Alumno</title>
</head>
<body>
<header>
        <div class="img">
            <img src="img/LogoConalepJuarezI.png" alt="Logo plantel conalep Juarez I" />
        </div>
        <div class="date_time">

        </div>
        <div class="title_text">
            <h1>Docentes y Orientación</h1><br> 
            <h2>Estatus Alumnos</h2>
        </div>
        <div class="salir">
            <a href="controladores/controlador-cerrar-sesion.php" class="btn_salir">Cerrar sesión</a>
        </div>
    </header>

    <div class="alumnos">
        <table class="estatus">
            <tr>
                <td>Matricula</td>
                <td>Nombre</td>
                <td>Grupo</td>
                <td>Estatus</td>
                <td>Comentarios</td>
            </tr>
            <tr>
                <td>160260192-2</td>
                <td>Modesto Angel</td>
                <td>101-i</td>
                <td>Buen desempeño!</td>
                <td>Ha entregado todas las tareas.</td>
            </tr>
        </table>
    </div>
</body>
</html>