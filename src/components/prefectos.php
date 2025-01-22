<?php
session_start();
if (empty($_SESSION["id"])) {
	header("location: login.php");
}
include '../controllers/conexion.php';

$consulta = "SELECT * FROM usuarios";
$guardar = $conexion->query($consulta);
date_default_timezone_set('America/Mazatlan');
$fecha = date("d-m-Y");

$sql = "
SELECT 
    COUNT(asistencias.matricula) AS total_alumnos
FROM asistencias
INNER JOIN alumnos ON asistencias.matricula = alumnos.matricula
INNER JOIN grupos ON alumnos.id_grupo = grupos.id_grupo
WHERE DATE(fecha_hora) = CURDATE();
";

$resultado = $conexion->query($sql);

$totalAlumnos = 0;

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $totalAlumnos = $fila['total_alumnos'];
}
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
    <link rel="stylesheet" href="../css/estilos.css">
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
            
            <form action="prefectos.php" method="post">
                <div id="contenedor-formulario">
                <p class="contador">Total de alumnos registrados hoy: <strong><?php echo $totalAlumnos; ?></strong></p>
  
                <h2 for="codigo">Escanea o Captura el código de barras</h2><br>
                <input type="text" id="matriculaAuto" name="matriculaAuto" autofocus>
                <!-- Agregar la seccion de comentarios-->
                <div class="contenedor-principal">
                    <button type="submit" name="btnEnviar" class="btnEnviar">Enviar</button>
                </div> <br>
            </form>
            <p id="mensajeAlerta"></p>
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
</body>
</html>
