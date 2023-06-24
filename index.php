<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/index.css">
	<title>Login</title>
</head>
<body>
    <div class="login-container">
        <form method="post" action="">
            <h1>Inicio de sesión</h1>
            <?php
            include("controladores/conexion.php");
            include("controladores/controlador-login.php");
            ?>
            <div class="input">
                <input type="text" name="usuario" placeholder="Nombre de usuario">
            </div class="input">
            <div class="input">
                <input type="password" name="password" placeholder="Contraseña">
            </div>
            <div class="view">
                
            </div class="input">
            <div>
                <input class="btn" type="submit" value="INICIAR SESIÓN" name="btningresar">
            </div>

        </form>

    </div>

</body>
</html>