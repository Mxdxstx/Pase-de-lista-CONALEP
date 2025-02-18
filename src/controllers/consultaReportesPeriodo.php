<?php 

$where = "";
if (!empty($_POST)) {
    $valor = trim($_POST['fechaI']);
    $valorD = trim($_POST['fechaD']);

    if (!empty($valor) && !empty($valorD)) {
        $fechaInicio = $valor . ' 00:00:00';
        $fechaFin = $valorD . ' 23:59:59';
        $where = "WHERE asistencias.fecha_hora BETWEEN '$fechaInicio' AND '$fechaFin'";
    }

    $_SESSION['fechaI'] = $valor;
    $_SESSION['fechaD'] = $valorD;

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_SESSION['fechaI']) && isset($_SESSION['fechaD'])) {
    $valor = $_SESSION['fechaI'];
    $valorD = $_SESSION['fechaD'];

    if (!empty($valor) && !empty($valorD)) {
        $fechaInicio = $valor . ' 00:00:00';
        $fechaFin = $valorD . ' 23:59:59';
        $where = "WHERE asistencias.fecha_hora BETWEEN '$fechaInicio' AND '$fechaFin'";
    }

    unset($_SESSION['fechaI']);
    unset($_SESSION['fechaD']);
}

$consulta = "SELECT asistencias.matricula, alumnos.primer_apellido, alumnos.segundo_apellido, alumnos.nombres, fecha_hora FROM asistencias INNER JOIN alumnos ON asistencias.matricula = alumnos.matricula $where";
$guardar = $conexion->query($consulta);
date_default_timezone_set('America/Mazatlan');

$fecha = date("d-m-Y");

?>