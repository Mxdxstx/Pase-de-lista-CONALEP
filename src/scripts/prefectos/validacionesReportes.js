function validarFormulario(event) {
    event.preventDefault();
    const buscarInput = document.querySelector('input[name="buscar"]');
    const valor = buscarInput.value.trim();

    if (valor === "") {
        alert("Por favor, ingrese una matrícula para buscar.");
        return;
    }

    const matriculaRegex = /^[0-9-]+$/;
    if (!matriculaRegex.test(valor)) {
        alert("La matrícula solo debe contener números.");
        return;
    }

    document.getElementById('formulario-busqueda').submit();

    document.querySelector('input[name="buscar"]').addEventListener('input', function (event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    function recargarTabla() {
        location.reload(); 
    }
}

//Funciones Modal
function showAlert() {
    document.getElementById('customAlert').classList.add('show');
}

function hideAlert() {
    document.getElementById('customAlert').classList.remove('show');
}

function redirect() {
    window.location = 'visitas.php';
}
