<?php
$where = "";
if (!empty($_POST)) {
    $valor = trim($_POST['buscar']);
    if (!empty($valor)) {
        $where = "WHERE alumnos.matricula LIKE '%$valor%'";
    }
    $_SESSION['buscar'] = $valor;
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_SESSION['buscar'])) {
    $valor = $_SESSION['buscar'];
    $where = "WHERE alumnos.matricula LIKE '%$valor%'";
    unset($_SESSION['buscar']);
}

$consulta = "SELECT asistencias.matricula, alumnos.primer_apellido, alumnos.segundo_apellido, alumnos.nombres, fecha_hora FROM asistencias INNER JOIN alumnos ON asistencias.matricula = alumnos.matricula $where";
$guardar = $conexion->query($consulta);
date_default_timezone_set('America/Mazatlan');
$fecha = date("d-m-Y");
?>