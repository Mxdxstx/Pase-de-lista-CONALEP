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
	<link rel="stylesheet" href="css/estilosReportes.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/reportes.css">
	<link rel="stylesheet" href="css/prefectos.css">
	
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>

	<title>Pase de lista</title>
</head>

<body>
	<header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
		<div class="title_text">
			<h1>Pase de Lista</h1>
		</div>
		
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <img src="img/Img_Prefectos/logo.png" width="35">
			
        </div>
		
        <div class="options__menu">	
			
			<a href="inicioPrefectos.php" >
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>
            <a href="prefectos.php" class="selected">
                <div class="option">
                <i class="fa-solid fa-check" title="Pase De Lista"></i>
					<h4>Pase De Lista</h4>
                </div>
            </a>    
            <a href="reportesAlumnos.php" >
                <div class="option">
					<i class="fa-solid fa-user" title="Reporte Por Alumno"></i>
					<h4>Reportes Por Alumno</h4>
                </div>
            </a>
			
			<a href="reportesFecha.php" >
                <div class="option">
					<i class="fa-solid fa-calendar-days" title="Reporte Por Fecbas"></i>
					<h4>Reportes Por Fechas</h4>
                </div>
            </a>
			
			<a href="reportesPeriodo.php" >
                <div class="option">
					<i class="fa-solid fa-chart-simple" title="Reporte Por Periodo"></i>
					<h4>Reportes Por Periodo</h4>
                </div>
            </a>
			
			<a href="controladores/controlador-cerrar-sesion.php" >
                <div class="option">
					<i class="fa-solid fa-right-to-bracket" title="Cerrar Sesion"></i>
                    <h4>Cerrar Sesion</h4>
                </div>
            </a>
        </div>
    </div>

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