<?php
session_start();
if(empty($_SESSION["id"])) {
    header("location: index.php");
}
include 'controladores/conexion.php';

$where ="";

if(!empty($_POST)){
	$valor = trim($_POST['fecha']);
	$valorD = trim($_POST['fechaD']);

	if(!empty($valor) && !empty($valorD)){
		$fechaInicio = $valor . ' 00:00:00';
		$fechaFin = $valorD . ' 23:59:59';
		$where = "WHERE asistencias.fecha_hora BETWEEN '$fechaInicio' AND '$fechaFin'";
	}
}

$consulta = "SELECT asistencias.matricula, alumnos.primer_apellido, alumnos.segundo_apellido, alumnos.nombres, fecha_hora FROM asistencias INNER JOIN alumnos ON asistencias.matricula = alumnos.matricula $where";
$guardar = $conexion->query($consulta);
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
	<script>
        function validarFormulario() {
            var fechaInput = document.getElementById("fecha");
            var fechaFinInput = document.getElementById("fechaD");

            if (fechaInput.value === "" || fechaFinInput.value === "") {
            alert("Falta Una Fecha Por Seleccionar");
                return false; // Evita que el formulario se envíe
            }
        }
    </script>
	
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
            <img src="img/Img_Prefectos/logo.png" width="35">
        </div>
		
        <div class="options__menu">	
			
			<a href="inicioPrefectos.php" >
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
			
			<a href="reportesPeriodo.php" class="selected">
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
        <h3 class="text-center">
			<form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<label for="fecha">Fecha Inicio:</label>
					<input type="date" id="fecha" name="fecha">
					<label for="fecha">Fecha Fin:</label>
					<input type="date" id="fechaD" name="fechaD">
					<button type="submit" onclick="validarFormulario()">Buscar</button>
					<button id="btnExportar" class="btn btn-success">
					<i class="fas fa-file-excel"></i> Exportar Datos a Excel
					</button>
					<button type="button" onclick="Limpiar()">Limpiar</button>

			</form>
		</h3>
			<div style="overflow: auto; width: 1120px; height: 600px">
				<table id="datos">
					<thead class="text-muted">
						<th class="text-center">Matricula</th>
						<th class="text-center">Nombre(s)</th>
						<th class="text-center">Primer Apellido</th>
						<th class="text-center">Segundo Apellido</th>
						<th class="text-center">Fecha y Hora de Ingreso</th>

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
	<script src="js/script.js"></script>
	<script src="scripts/prefectos/excel.js"></script>

</body>
</html>
