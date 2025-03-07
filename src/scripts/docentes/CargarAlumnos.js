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
    document.getElementById("asistieron").checked = false;

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
