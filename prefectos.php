<?php
session_start();
if(empty($_SESSION["id"])) {
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prefectura</title>
</head>
<body>
    <h1>PREFECTURA</h1><br/>
    <h2>
    <?php 
        echo $_SESSION["id_cargo"];
        ?>
    </h2>
    <a href="controladores/controlador-cerrar-sesion.php">Salir</a>
</body>
</html>