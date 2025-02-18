<?php 
$where = "";
if (!empty($_POST)) {
    $valor = $_POST['fecha'];
    if (!empty($valor)) {
        $where = "WHERE asistencias.fecha_hora LIKE '%$valor%'";
    }
    $_SESSION['fecha'] = $valor;
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_SESSION['fecha'])) {
    $valor = $_SESSION['fecha'];
    $where = "WHERE asistencias.fecha_hora LIKE '%$valor%'";
    unset($_SESSION['fecha']);
}

$consulta = "SELECT asistencias.matricula, alumnos.primer_apellido, alumnos.segundo_apellido, alumnos.nombres, fecha_hora FROM asistencias INNER JOIN alumnos ON asistencias.matricula = alumnos.matricula $where";
$guardar = $conexion->query($consulta);
date_default_timezone_set('America/Mazatlan');
$fecha = date("d-m-Y");

?>