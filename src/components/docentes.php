<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/docentes.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../scripts/docentes/jspdf.umd.min.js"></script>
    <script src="../scripts/docentes/jspdf.plugin.autotable.min.js"></script>
    <title>Docentes y Orientación</title>
</head>

<body>
    <header>
        <div class="img">
            <img src="../../public/assets/img/LogoConalepJuarezI.png" alt="Logo plantel conalep Juarez I" />
        </div>
        <div class="date_time">

        </div>
        <div class="title_text">
            <h1>Docentes y Orientación</h1>
            <h2>Asistencia</h2>
        </div>
        <div class="salir">
            <a href="../controllers/controlador-cerrar-sesion.php" class="btn_salir">Cerrar sesión</a>
        </div>
    </header>

    <section class="main">
        <div class="dropdowns">
            <div class="grupos">
                <label for="grupo">Elegir grupo</label><br /><br />
                <select name="grupo" id="grupo" onchange="cargarAlumnos()">
                    <option value="">Seleccionar Grupo</option>
                    <?php
                    include("../controllers/conexion.php");
                    $sql = "SELECT id_grupo, clave_grupo from grupos";
                    $resultado = $conexion->query($sql);
                    if ($resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<option class='' value='" . $fila["id_grupo"] . "'>" . $fila["clave_grupo"] . "</option>";
                        }
                    } else {
                        echo "<option value='0'>No se encontraron grupos</option>";
                    }
                    ?>
                </select>
            </div>
            <br /><br />
            <div class="asistentcia">
                <p>Mostrar solo los que <span style="text-decoration:underline">no</span> asistieron</p>
                <label class="switch">
                    <input type="checkbox" id="asistieron">
                    <span class="slider round"></span>
                </label>
            </div>
            <button id="exportarPDF" class="btn btn-success">Exportar Datos a PDF</button>

        </div>

        <div class="grid">
            <div id="tablaAlumnos">
                <script>
                    //TODO: cambiarlo a un script externo
                    function cargarAlumnos() {
                        var selectedGrupo = document.getElementById("grupo").value;

                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("tablaAlumnos").innerHTML = this.responseText;
                            }
                        };

                        // Llamada inicial para cargar todos los alumnos al cargar la página
                        xhttp.open("GET", "../controllers/cargar-alumnos.php?grupo=" + selectedGrupo, true);
                        xhttp.send();

                        const checkbox = document.getElementById('asistieron');

                        checkbox.addEventListener('change', function() {
                            // Verifica si el checkbox está marcado (activado)
                            if (this.checked) {
                                // Llamada para cargar solo los alumnos que no asistieron
                                xhttp.open("GET", "../controllers/cargar-alumnos-ausentes.php?grupo=" + selectedGrupo, true);
                                xhttp.send();
                            } else {
                                // Llamada para cargar todos los alumnos nuevamente
                                xhttp.open("GET", "../controllers/cargar-alumnos.php?grupo=" + selectedGrupo, true);
                                xhttp.send();
                            }
                        });
                    }
                </script>
            </div>
        </div>
        <script src="../scripts/docentes/exportarPDF.js"></script>
    </section>
</body>
</html>
