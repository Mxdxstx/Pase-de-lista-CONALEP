//Al dar enter cuando se encuentra en el formulario, se ejecuta la acción de registrar asistencia
window.onload = function() {
    document.getElementById('resultado').focus();
};
document.getElementById('resultado').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        console.log('funciona')
        var matricula = document.getElementById('resultado').value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../controllers/registrar-asistencia.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    window.location.reload();
                } else {
                    console.error('Hubo un problema al realizar la solicitud.');
                }

            }
        };
        xhr.send('matricula=' + matricula);
        event.preventDefault(); // Evita que el Enter haga un salto de línea en el textarea
        document.getElementById('formulario').submit(); // Envía el formulario

    }
});