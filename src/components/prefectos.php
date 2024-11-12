<?php
session_start();
if (empty($_SESSION["id"])) {
	header("location: login.php");
}
include '../controllers/conexion.php';
$consulta = "SELECT * FROM usuarios";
$guardar = $conexion->query($consulta);
date_default_timezone_set('America/Chihuahua');

$fecha = date("d-m-Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pase de Lista</title>
    <link rel="stylesheet" href="../css/estiloPaseLista.css">
    <link rel="stylesheet" href="../css/prefectos.css">
</head>

<body id="body">
    <header>
        <div class="icon__menu">
            <img src="../../public/assets/img/Img_Iconos/bar.svg" id="btn_open" class="ic_barra"></i>
        </div>
        <div class="main_title">
            <h2>Pase De Lista</h2>
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
			<a href="inicioPrefectos.php">
                <div class="option">
                    <img src="../../public/assets/img/Img_Iconos/house.svg" class="ic_prefectos" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>
            <a href="prefectos.php" class="selected">
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
        <main class="main">
            <form class="tabla" action="prefectos.php" method="post">
                <div id="contenedor-formulario">
                    <textarea placeholder="Matricula" name="matricula" id="resultado"></textarea><br>			
                    <button type="submit" name="btnEnviar" class="btnEnviar">Enviar</button>
                </div>
            </form>
            <p id="resultado"></p>
            <?php
            if(isset($_POST['btnEnviar'])){
            include("../controllers/registrar-asistencia.php");}
            ?>
            <table cellspacing="0" class="tabla">
                <?php
                include("../controllers/cargar-asistencias.php");
                ?>
            </table>
        </main>
	<script src="../scripts/prefectos/barralateral.js"></script>
    <script src="../scripts/prefectos/registrarAsistencia.js"> </script>
</body>
</html>
