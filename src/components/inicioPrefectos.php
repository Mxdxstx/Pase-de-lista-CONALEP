<?php
session_start();
if(empty($_SESSION["id"])) {
    header("location: login.php");
}
include '../controllers/conexion.php';
date_default_timezone_set('America/Mazatlan');

$fecha = date("d-m-Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Prefectos</title>
    <link rel="stylesheet" href="../css/inicioPrefectos.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/reportes.css">
</head>

<body id="body">
    <header>
        <div class="icon__menu">
            <img src="../../public/assets/img/Img_Iconos/bar.svg" id="btn_open" class="ic_barra"></i>
        </div>
        <div class="main_title">
            <h2>Pantalla de Inicio de Prefectura</h2>
        </div>
        <div class="date"> 
            <h2> Fecha: <?php echo $fecha ?></h2>
        </div>
    </header>

    <div class="menu__side" id="menu_side">
        <div class="name__page">
            <img src="../../public/assets/img/Img_Prefectos/logo.png" width="35">
            <p>Conalep Juárez 1</p>
        </div>
        <div class="options__menu">	
			<a href="inicioPrefectos.php" class="selected">
                <div class="option">
                    <img src="../../public/assets/img/Img_Iconos/house.svg" class="ic_prefectos" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>
            <a href="prefectos.php" >
                <div class="option">
                    <img src="../../public/assets/img/Img_Iconos/check.svg" class="ic_prefectos" title="Pase De Lista"></i>
					<h4>Pase De Lista</h4>
                </div>
            </a>    
            <a href="visitas.php" >
                <div class="option">
                    <img src="../../public/assets/img/Img_Iconos/person.svg" class="ic_prefectos" title="Registro De Visitas"></i>
					<h4>Registro De Visitas</h4>
                </div>
            </a>    
            <a href="reportesAlumnos.php" >
                <div class="option">
					<img src="../../public/assets/img/Img_Iconos/student.svg" class="ic_prefectos" title="Reporte Por Alumno"></i>
					<h4>Reportes Por Alumno</h4>
                </div>
            </a>
			<a href="reportesFecha.php" >
                <div class="option">
					<img src="../../public/assets/img/Img_Iconos/calendar.svg" class="ic_prefectos"  title="Reporte Por Fechas"></i>
					<h4>Reportes Por Fechas</h4>
                </div>
            </a>
			<a href="reportesPeriodo.php" >
                <div class="option">
					<img src="../../public/assets/img/Img_Iconos/chart.svg" class="ic_prefectos" title="Reporte Por Periodo"></i>
					<h4>Reportes Por Periodo</h4>
                </div>
            </a>
			<a href="../controllers/controlador-cerrar-sesion.php" >
                <div class="option">
					<img src="../../public/assets/img/Img_Iconos/right.svg" class="ic_prefectos" title="Cerrar Sesión"></i>
                    <h4>Cerrar Sesion</h4>
                </div>
            </a>
        </div>
    </div>

    <div class="main">
        <br>
        <div id="imgPrefectos" class="img_prefectos"><img src="../../public/assets/img/conalepColours.png" alt="Conalep 026"></div>
		<div class="animated-title">
            <h1>Bienvenido(a)</h1>
            <p> Sistema de registro de entradas del CONALEP Juárez I</p><br>
            <div class="hora">
                <p class="hour_text">La hora actual es:</p>
                <p class='current_hour' id="horaActual"></p>
            </div>
        </div>
    </div>
	<script src="../scripts/prefectos/barralateral.js"></script>
    <script src="../scripts/prefectos/horaActual.js"></script>
    <script src="../scripts/prefectos/coinFlip.js"></script>
</body>
</html>
