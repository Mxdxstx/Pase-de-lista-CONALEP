<!DOCTYPE html>
<html>
<head>
	<title>Registrar Usuarios</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<form method="post">
		<h1>Pase de Lista Conalep Juarez 1</h1>
		<input type="text" name="name" placeholder="Nombre Completo">
		<input type="email" name="email" placeholder="Email">
		<input type="submit" name="register">
	</form>
		 <?php 
        include("registrar.php");
        ?>
</body>
</html>
