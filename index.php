<!DOCTYPE html>
<html>
<head>
	<title>Inicio de Sesion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<form method="post">
		<h1>Pase de Lista Conalep Juarez 1</h1>
		<input type="text" name="usuario" placeholder="Nombre Completo">
		<input type="text" name="contraseña" placeholder="Contraseña">
		<input type="submit" name="register">
	</form>
		 <?php 
        include("validar.php");
        ?>
</body>
</html>
