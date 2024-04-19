<?php
session_start();
if(empty($_SESSION["id"])) {
    header("location: login.php");
}
include '../controllers/conexion.php';

$where ="";
if(!empty($_POST)){
	$valor = $_POST['buscar'];
	if(!empty($valor)){
		$where = "WHERE alumnos.matricula LIKE '%$valor%'";
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
    <title>Reportes por matrícula</title>

	<link rel="stylesheet" href="../css/reportes.css">
    <link rel="stylesheet" href="../css/estilosReportes.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	
	<script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/5.2.0/js/tableexport.min.js"></script>

    <script>
        function validarBusqueda(event) {
            var inputValor = document.querySelector('input[name="buscar"]').value.trim();
            if (inputValor === '') {
                alert('Ingrese una matricula.');
                event.preventDefault(); 
                return; 
            }
            if (!/^[\d-]+$/.test(inputValor)) {
                alert('Ingrese solo números o guiones para la búsqueda.');
                event.preventDefault(); 
            }
        }
    </script>

    <style type="text/css">
        .text-center {
            text-align: left;
            margin-left: 20px;
        }
        .form_control, .text-center h3 {
            margin: 10px 5px;
            padding: 8px;
            display: inline-flex; 
            align-items: center; 
            font-size: 16px;
        }
        .btn-success {
            padding: 8px 15px;
            margin: 10px 5px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-block, .btn-sm {
            display: inline-flex;
            align-items: center; 
            padding: 5px 10px;
            font-size: 0.875rem;
        }
        /* Estilo para el botón de exportar */
        #btnExportar {
            display: inline-flex; 
            vertical-align: middle;
            align-items: center; 
        }
        #btnExportar i {
            margin-right: 5px;
        }
    </style>
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
            <a href="prefectos.php" >
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
            <a href="reportesAlumnos.php" class="selected">
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
                    <h4>Cerrar Sesión</h4>
                </div>
            </a>
        </div>
        </div>
    <main>
        <h3 class="text-center">
			<form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				Buscar Matricula de Alumno 
				<input type="text" name="buscar" class="form_control" placeholder="" />
				<input type="submit" name="buscador" value="Buscar" class="btn-block btn-sm btn-success" onclick="validarBusqueda(event)">
				<button id="btnExportar" class="btn btn-success">
					<i class="fas fa-file-excel"></i> Exportar Datos a Excel
				</button> 
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
	<script src="../scripts/prefectos/barralateral.js"></script>
	<script src="../scripts/prefectos/excel.js"></script>
</body>
</html>
