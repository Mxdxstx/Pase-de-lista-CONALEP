<?php

session_start();

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
            header("location:docentes.php");
        }
        if($datos->id_rol == 2){
            header("location:prefectos.php");
        }
          
       }else{
        echo '<div class="alert" >¡Credenciales incorrectas!</div>';
       }

    } else {
        echo '<div class="alert" >¡Hay campos vacíos!</div>';
    } 
}

?>