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
    <script src="scripts/docentes/EstatusEstilosDinamicos.js"></script>
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
            <tr class='table_header'>
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
                <td><select id="miSelect" class="miSelect">
                        <option class='estatus_regular'>Sin observaciones</option>
                        <option class='estatus_regular'>Rendimiento promedio</option>
                        <option class='estatus_bueno'>¡Entrega todas las tareas!</option>
                        <option class='estatus_malo'>No entrega tareas</option>
                        <option class='estatus_malo'>Corajudo</option>
                    </select>
                    
                </td>
                <td>Sin comentarios.</td>
            </tr>
        </table>
    </div>
</body>
</html>