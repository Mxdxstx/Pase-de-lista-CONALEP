<?php
    include("../controllers/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/login.css">
	<title>Login</title>
</head>
<body>
    <div class="login-container">
        <header>
            <div>
                <img src="../../public/assets/img/LogoConalepJuarezI.png" alt="Logo plantel conalep Juarez I"/>
            </div>
        </header>
        <form method="post" action="">
       
            <h1>¡Bienvenido(a)!</h1>
            
            <h2>Inicio de sesión</h2>
            
            <div class="inputs">
                <div><input class="txt" type="text" name="usuario" placeholder="Nombre de usuario"></div>
                <div><input class="txt" type="password" name="password" placeholder="Contraseña"></div>
                <?php include("../controllers/controlador-login.php");?>
                <div><input class="btn" type="submit" value="Iniciar sesión" name="btningresar"></div>
            </div>
        </form>

    </div>

</body>
</html>
