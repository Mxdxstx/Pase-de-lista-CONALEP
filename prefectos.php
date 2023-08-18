<?php
session_start();
if (empty($_SESSION["id"])) {
	header("location: index.php");
}
include 'controladores/conexion.php';
$consulta = "SELECT * FROM usuarios";
$guardar = $conexion->query($consulta);
date_default_timezone_set('America/Chihuahua');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/prefectos.css">
	<link rel="stylesheet" href="css/estilos.css">
	<title>Pase de lista</title>
</head>

<body>
	<header>
		<div class="img">
			<img src="img/LogoConalepJuarezI.png" alt="Logo plantel conalep Juarez I" />
		</div>
		<div class="date_time">

		</div>
		<div class="title_text">
			<h1>Prefectura</h1><br />
			<h2>Pase de lista</h2>
		</div>
		<div class="salir">
			<a href="controladores/controlador-cerrar-sesion.php" class="btn_salir">Cerrar sesión</a>
		</div>
	</header>
	<div class="main">
		<form class="tabla" action="prefectos.php" method="post">
			<input type="text" placeholder="Matricula" name="matricula" />
			<button type="submit" name="btnEnviar">Enviar</button>

		</form>
		<?php
		if(isset($_POST['btnEnviar'])){
		include("controladores/registrar-asistencia.php");}
		?>

		<table cellspacing="0" class="tabla">
			<?php
			include("controladores/cargar-asistencias.php");
			?>
		</table>

	</div>


</body>

</html>