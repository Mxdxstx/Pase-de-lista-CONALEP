<?php
session_start();
if(empty($_SESSION["id"])) {
    header("location: index.php");
}
include 'controladores/conexion.php';
$consulta = "SELECT * FROM usuarios";
$guardar = $conexion->query($consulta);
date_default_timezone_set('America/Chihuahua');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prefectura</title>
    <link rel="stylesheet" href="css/prefectos.css">
</head>
<body>
    <div>
        <!-- Este div contiene el encabezado de la página -->
        <div class='encabezado'>
            <h3>Registro de Entrada</h3>
			
			<p class='title'><?php echo date('Y-m-d H:i:s'); ?></p> 
            <a onmouseout="this.style.color='black'" onmouseover="this.style.color='rgb(0, 126, 103)'" class='cerrar-sesion' href="controladores/controlador-cerrar-sesion.php">Cerrar Sesion</a>
        </div>
  
        <!-- Este div contiene ambos, la barra lateral y el contenido principal de la página -->
        <div class='envoltura'>
            <div class='columnas'>
                <!-- Este div contiene el contenido principal -->
                <div class='col1'>
						<h3 class="text-center">
							Pase De Lista
							<div>
								<form action="buscar.php" method="post">
									<input type="text" name="buscar" id="">
									<input type="submit" name="a">
									<a href="nuevo.php">Nuevo</a>
								</form>
							</div>
						</h3>
						<div style="overflow: auto; width: 1100px; height: 500px">
							<table class="table">
								<thead class="text-muted">
									<th class="text-center">ID</th>
									<th class="text-center">Nombre</th>
									<th class="text-center">Usuario</th>
									<th class="text-center">Contraseña</th>
									<th class="text-center">ID cargo</th>
								</thead>
								
								<tbody>
									<?php while($row = $guardar->fetch_assoc()){?>
									  <tr>
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['nombre']; ?></td>
										<td><?php echo $row['usuario']; ?></td>
										<td><?php echo $row['contrasena']; ?></td>
										<td><?php echo $row['id_cargo']; ?></td>
									  </tr>
									<?php }?>
								</tbody>
							</table>
						</div>						
				</div>
                <!-- Este div contiene la barra lateral -->
				<div class='col2' style="display: flex; flex-direction: column; justify-content: flex-start; align-items: center; ">
    <h3>Tipos de Reportes</h3>
    <select style="margin-top: 20px;">
        <option class="text-center">Por Fecha</option>
        <option class="text-center">Por Alumno</option>
        <option class="text-center">Por Periodo</option>
    </select>
    <button style="margin-top: 55px;" class="generar" onmouseout="this.style.color='black'" onmouseover="this.style.color='rgb(0, 126, 103)'" href="controladores/controlador-cerrar-sesion.php">Generar Reporte</button>
</div>
            </div>
        </div>
    </div>
    <h2></h2>
</body>
</html>
