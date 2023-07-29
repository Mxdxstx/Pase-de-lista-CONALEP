<link rel="stylesheet" href="css/docentes.css">
<link rel="stylesheet" href="css/estilos.css">
<?php
session_start();
if(empty($_SESSION["id"])) {
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Docentes</title>
</head>
<body>
    <header>
        <div class="date_time">

        </div>
        <div class="title_text">
            <h1>DOCENTES</h1><br/>
            <h2>Pase de lista</h2>
        </div>
        <div class="salir">
            <a href="controladores/controlador-cerrar-sesion.php" class="btn_salir">Cerrar sesión</a>
        </div>
    </header>

    <section class="main">
        <div class="dropdowns">
            <div class="semestres">

                <label for="semestre">Semestre</label><br/>
                <select name="semestre" id="semestre">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>

            <div class="grupos">
            <label for="grupo">Elegir grupo</label><br/>
                <select name="grupo" id="grupo">
                    <option value="101-i">101-i</option>
                    <option value="101-i">201-i</option>
                    <option value="101-i">301-i</option>
                </select>
            </div>

            <div class="asistentcia">
                <p>Mostrar solo los que asistieron</p>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>

        <div class="grid">
            <table class="alumnos">
                    <tr>
                        <th>No.Control</th>
                        <th>Nombre</th>
                        <th>e-mail</th>
                        <th>Fecha</th>
                    </tr>
                    <tr>
                        <td>19111823</td>
                        <td> Angel Ivan Modesto Hernandez</td>
                        <td> modestoivan19@gmail.com</td>
                        <td><?php echo  date('Y-m-d');?></td>
                    </tr>
            </table>
        </div>
    </section>
</body>
</html>