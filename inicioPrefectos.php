<?php
session_start();
if(empty($_SESSION["id"])) {
    header("location: index.php");
}
include 'controladores/conexion.php';
date_default_timezone_set('America/Chihuahua');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prefectos</title>

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/reportes.css">
    <link rel="stylesheet" href="css/estilosReportes.css">

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>

<body id="body">

    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <img src="img/Img_Prefectos/logo.png" width="35">
        </div>
		
        <div class="options__menu">	
			
			<a href="inicioPrefectos.php" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>
            <a href="prefectos.php" >
                <div class="option">
                <i class="fa-solid fa-check" title="Reporte Por Alumno"></i>
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

    <main>
		<h1 style="text-align: center;">Bienvenido(a)</h1>
		<div class="hora">
			<p class="title" style="text-align: center;">La Hora Actual es:</p>
			<p class='title' style="text-align: center;"><?php echo date('Y-m-d H:i:s'); ?></p> 
        </div>	
    </main>
	<script src="js/script.js"></script>

</body>
</html>