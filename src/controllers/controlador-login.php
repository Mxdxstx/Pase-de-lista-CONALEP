<?php
session_start();
include("conexion.php");

if(!empty($_POST['btningresar'])){
    if (!empty($_POST["usuario"])and !empty($_POST["password"])) {
       $usuario=$_POST["usuario"];
       $password=$_POST["password"];

       $sql=$conexion->query("SELECT * FROM usuarios WHERE nombre_usuario='$usuario' AND contrasena='$password'");
       if($datos=$sql->fetch_object()){
        $_SESSION["id"]=$datos->id_usuario;
        $_SESSION["nombre"]=$datos->nombres;
        $_SESSION["rol"]=$datos->id_rol;

        if($datos->id_rol == 3){
            header("location: docentes.php");
        }
        if($datos->id_rol == 2){
            header("location: inicioPrefectos.php");
        }
        if($datos->id_rol == 1){
            header("location: inicioAdministrador.php");
        }
          
       }else{
        $_SESSION['error'] = '¡Credenciales incorrectas!';
        header("Location: login.php");
        exit;
    }

    } else {
        $_SESSION['error'] = '¡Hay campos vacíos!';
        header("Location: login.php");
        exit;
    } 
}
if (isset($_SESSION['error'])) {
    echo '<div class="alert">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']); 
}
?>