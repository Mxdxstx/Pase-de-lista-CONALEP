<?php

session_start();

if(!empty($_POST['btningresar'])){
    if (!empty($_POST["usuario"])and !empty($_POST["password"])) {
       $usuario=$_POST["usuario"];
       $password=$_POST["password"];

       $sql=$conexion->query("SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$password'");
       if($datos=$sql->fetch_object()){
        $_SESSION["id"]=$datos->id;
        $_SESSION["nombre"]=$datos->nombre;
        $_SESSION["id_cargo"]=$datos->id_cargo;

        if($datos->id_cargo == 2){
            header("location:docentes.php");
        }
        if($datos->id_cargo == 3){
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