<?php
if(isset($_POST['usuario']) && isset($_POST['contraseña'])) {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    
    session_start();
    $_SESSION['usuario'] = $usuario;
    
    $conexion = mysqli_connect("localhost", "root", "", "rol");
    
    $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
    $resultado = mysqli_query($conexion, $consulta);
    
    $filas = mysqli_fetch_array($resultado);
    
    if(isset($filas['id_cargo']) && $filas['id_cargo'] == 1) { // administrador
        header("location: admin.php");
    } elseif(isset($filas['id_cargo']) && $filas['id_cargo'] == 2) { // cliente
        header("location: cliente.php");
    } else {
        mysqli_free_result($resultado);
        mysqli_close($conexion);
        ?>
        <?php include("index.php"); ?>
        <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
        <?php
    }
}
?>
