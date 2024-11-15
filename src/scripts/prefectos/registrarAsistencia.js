document.getElementById('resultado').addEventListener('input', function() {
    var matricula = document.getElementById('resultado').value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controllers/registrar-asistencia.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            } else {
                console.error('Hubo un problema al realizar la solicitud.');
            }
        }
    };
    xhr.send('matricula=' + matricula);
});