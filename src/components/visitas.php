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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de visitas</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/reportes.css">
    <link rel="stylesheet" href="../css/visitas.css">
</head>
<body id="body">
    
    <header>
        <div class="icon__menu">
        <img src="../../public/assets/img/Img_Iconos/bar.svg" id="btn_open" class="ic_barra"></i>
        </div>
        <div class="main_title">
            <h2>Registro de Visitas</h2>
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
			<a href="inicioPrefectos.php" >
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
            <a href="visitas.php" class="selected">
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

    <main>
        <h3 class="text-center">
            <form class="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label class="instrucciones">Por favor, llene los siguientes campos</label> <br/> 
                <input type="text" name="nombre" class="input_nombre" pattern="[a-zA-Z]+" title="Solo se permiten letras" placeholder=" Ingrese su nombre completo" />
                <input type="text" name="motivo" class="input_motivo" placeholder=" Motivo de visita" />
                <select name="identificacion" id="id_select" class="id_select">
                    <option value="Identificación">Identificación</option>
                    <option value="INE">INE</option>
                    <option value="Credencial">Credencial</option>
                    <option value="Licencia de conducir">Licencia de conducir</option>
                    <option value="Otro">Otro</option>
                </select>
                <button id="enviar" name="btnEnviar" class="btnEnviar" onclick="validarVisita(event)">
                    Enviar
                </button> 
                <div id="customAlert" class="modal">
                    <div class="modal-content">
                        <p id="modalMessage"></p>
                    </div>
                </div>
            </form>
        </h3>
        <?php
		if(isset($_POST['btnEnviar'])){
		    include("../controllers/registrar-visitas.php");}
		?>
        <div style="overflow: auto; width: 1120px; height: 600px">
        <table cellspacing="0" class="tabla_visitas">
        <?php
            include('../controllers/cargar-visitas.php')            
        ?>
		</table>
        </div>
    </main>

    <script src="../scripts/prefectos/barralateral.js"></script>
    <script src="../scripts/prefectos/horaActual.js"></script>
    <script src="../scripts/prefectos/validacionesReportes.js"></script>

</body>
</html>
