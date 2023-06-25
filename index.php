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
    <header>
            <img src="img/LogoConalepJuarezI.png" alt="Logo plantel conalep Juarez I"/>
        </header>
        <form method="post" action="">
       
            <h1>¡Bienvendido!</h1>
            
            <h2>Inicio de sesión</h2>
            <?php
            include("controladores/conexion.php");
            include("controladores/controlador-login.php");
            ?>
            <div class="inputs">
                <div><input class="txt" type="text" name="usuario" placeholder="Nombre de usuario"></div>
                <div><input class="txt" type="password" name="password" placeholder="Contraseña"></div>
                <div><input class="btn" type="submit" value="Iniciar sesión" name="btningresar"></div>
            </div>
        </form>

    </div>

</body>
</html>