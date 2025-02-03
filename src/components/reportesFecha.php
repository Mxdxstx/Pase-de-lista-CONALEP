<?php
session_start();
if(empty($_SESSION["id"])) {
    header("location: login.php");
}
include '../controllers/conexion.php';

$where ="";

if(!empty($_POST)){
	$valor = $_POST['fecha'];
	if(!empty($valor)){
		$where = "WHERE asistencias.fecha_hora LIKE '%$valor%'";
	}
}

$consulta = "SELECT asistencias.matricula, alumnos.primer_apellido, alumnos.segundo_apellido, alumnos.nombres, fecha_hora FROM asistencias INNER JOIN alumnos ON asistencias.matricula = alumnos.matricula $where";

$guardar = $conexion->query($consulta);
date_default_timezone_set('America/Mazatlan');
$fecha = date("d-m-Y");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prefectos</title>

	<link rel="stylesheet" href="../css/reportes.css">	
    <script src="../scripts/prefectos/jspdf.umd.min.js"></script>
    <script src="../scripts/prefectos/jspdf.plugin.autotable.min.js"></script>

</head>

<body id="body">

    <header>
        <div class="icon__menu">
            <img src="../../public/assets/img/Img_Iconos/bar.svg" id="btn_open" class="ic_barra"></i>
        </div>
		<div class="main_title">
            <h2>Reportes por Fecha</h2>
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
            <a href="prefectos.php">
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
            <a href="reportesAlumnos.php">
                <div class="option">
					<img src="../../public/assets/img/Img_Iconos/student.svg" class="ic_prefectos" title="Reporte Por Alumno"></i>
					<h4>Reportes Por Alumno</h4>
                </div>
            </a>
			<a href="reportesFecha.php" class="selected">
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
    <main>
		<h3 class="text-center">
        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="fecha">Selecciona una fecha:</label>
            <input type="date" id="fecha" name="fecha" oninput="validarFecha()">
            <button type="submit" id="btnBuscar" disabled>Buscar</button>
            <button type="submit" onclick="recargarTabla()">Recargar Tabla</button>
            <button id="exportarPDF" class="btn btn-success">Exportar Datos a PDF</button>
        </form>
		</h3>
        <div class="table-container">
            <table id="datos">
                <thead class="text-muted">
                <tr>
                    <th class="text-center">Matricula</th>
                    <th class="text-center">Nombre(s)</th>
                    <th class="text-center">Primer Apellido</th>
                    <th class="text-center">Segundo Apellido</th>
                    <th class="text-center">Fecha y Hora de Ingreso</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = $guardar->fetch_assoc()){?>
                    <tr>
                    <td><?php echo $row['matricula']; ?></td>
                    <td><?php echo $row['nombres']; ?></td>
                    <td><?php echo $row['primer_apellido']; ?></td>
                    <td><?php echo $row['segundo_apellido']; ?></td>
                    <td><?php echo $row['fecha_hora']; ?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>			
    </main>	
	<script src="../scripts/prefectos/barralateral.js"></script>
	<script src="../scripts/prefectos/exportarPDF.js"></script>
    <script src="../scripts/prefectos/validacionesReportes.js"></script>
</body>
</html
