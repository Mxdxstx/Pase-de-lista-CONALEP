<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Administrador</title>
    <link rel="stylesheet" href="../css/administradorVista.css">
</head>
<body>

    <h1>Menú de Opciones</h1>
    <nav>
        <ul>
            <li>
                <a href="agregarAlumnos.php" data-title="Agregar nuevos alumnos">
                    <img src="../../public/assets/img/Img_Iconos/person.svg" alt="Agregar">
                    Agregar Alumnos
                </a>
            </li>
            <li>
                <a href="eliminarAlumnos.php" data-title="Eliminar alumnos existentes">
                    <img src="../../public/assets/img/Img_Iconos/person-x.svg" alt="Eliminar">
                    Eliminar Alumnos
                </a>
            </li>
            <li>
                <a href="editarAlumnos.php" data-title="Editar datos de alumnos">
                    <img src="../../public/assets/img/Img_Iconos/edit.svg" alt="Editar">
                    Editar Alumnos
                </a>
            </li>
            <li>
                <a href="../controllers/controlador-cerrar-sesion.php" data-title="Cerrar sesión del sistema">
                    <img src="../../public/assets/img/Img_Iconos/right.svg" alt="Cerrar">
                    Cerrar Sesión
                </a>
            </li>
        </ul>
    </nav>

</body>
</html>
