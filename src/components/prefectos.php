<?php
session_start();
if (empty($_SESSION["id"])) {
	header("location: login.php");
}
include '../controllers/conexion.php';
$consulta = "SELECT * FROM usuarios";
$guardar = $conexion->query($consulta);
date_default_timezone_set('America/Chihuahua');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pase de Lista</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estiloPaseLista.css">
</head>

<body id="body">
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
		<div class="hora">
			<p class='title'><?php echo date('Y-m-d H:i:s'); ?></p> 
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
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>
            <a href="prefectos.php"  class="selected">
                <div class="option">
                <i class="fa-solid fa-check" title="Reporte Por Alumno"></i>
					<h4>Pase De Lista</h4>
                </div>
            </a>
            <a href="visitas.php" >
                <div class="option">
                <i class="fa-solid fa-book" title="Registro De Visitas"></i>
					<h4>Registro De Visitas</h4>
                </div>
            </a>     	 			
            <a href="reportesAlumnos.php">
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
			
			<a href="../controllers/controlador-cerrar-sesion.php" >
                <div class="option">
					<i class="fa-solid fa-right-to-bracket" title="Cerrar Sesión"></i>
                    <h4>Cerrar Sesión</h4>
                </div>
            </a>
        </div>
        </div>
        <main class = "main">
		<form class="tabla" action="prefectos.php" method="post">
            <div id="contenedor-formulario">
				<textarea placeholder="Matricula" name="matricula" id="resultado"></textarea><br>			
				<button type="submit" name="btnEnviar" class="btnEnviar">Enviar</button>
			</div>
		</form>
		<p id="resultado"></p>
		<div id="contenedor"></div>
		<!-- Cargamos Quagga y luego nuestro script -->
		<script src="https://unpkg.com/quagga@0.12.1/dist/quagga.min.js"></script>
		<script src="../scripts/prefectos/script.js"></script>
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
    <script>
        document.getElementById('resultado').addEventListener('input', function() {
            var matricula = document.getElementById('resultado').value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../controllers/registrar-asistencia.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                    } else {
                        console.error('Hubo un problema al realizar la solicitud.');
                    }
                }
            };
            xhr.send('matricula=' + matricula);
        });
    </script>
</body>
</html>
