<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilosReportes.css">
    <link rel="stylesheet" href="../css/visitas.css">

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>

    <title>Registro de visitas</title>
</head>
<body>
    
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
        
        <div class="main_text"><h1>Registro De Visitas</h1></div>
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
                <i class="fa-solid fa-check" title="Pase De Lista"></i>
					<h4>Pase De Lista</h4>
                </div>
            </a>    
            <a href="visitas.php" class="selected">
                <div class="option">
                <i class="fa-solid fa-book" ></i>
					<h4>Registro De Visitas</h4>
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
					<i class="fa-solid fa-calendar-days" title="Reporte Por Fechas"></i>
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
                    <h4>Cerrar Sesion</h4>
                </div>
            </a>
        </div>
    </div>

    <div class="main">
        <form class="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Por favor llene los siguientes campos <br/> 
            <input type="text" name="nombre" class="input_nombre" placeholder="Ingrese su nombre" /><br>
            <input type="text" name="motivo" class="input_motivo" placeholder="Motivo de visita" /><br>

            <button id="enviar" class="btn btn-enviar">
                Enviar
            </button> 
        </form>

        <table cellspacing="0" class="tabla_visitas">
			<tr class="encabezados">
                <th>Nombre</th>
                <th>Asunto</th>
                <th>Fecha y hora de entrada</th>
            </tr>
            <tr class="table_data">
                <td>ANGEL IVÁN MODESTO HERNÁNDEZ</td>
                <td>SERVICIO SOCIAL</td>
                <td>2024-02-17 14:07:14</td>
            </tr>
            <tr class="table_data">
                <td>GAEL ESQUIVEL</td>
                <td>PROYECTO PASE DE LISTA</td>
                <td>2024-01-17 09:22:22</td>
            </tr>
		</table>
    </div>

    <script src="../scripts/prefectos/barralateral.js"></script>
    <script src="../scripts/prefectos/horaActual.js"></script>
</body>
</html>