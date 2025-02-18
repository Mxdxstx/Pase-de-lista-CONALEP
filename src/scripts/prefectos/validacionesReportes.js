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
}

function validarFecha() {
    const fecha = document.getElementById("fecha");
    const btnBuscar = document.getElementById("btnBuscar");
    
    if (fecha.value) {
        btnBuscar.disabled = false;
    } else {
        btnBuscar.disabled = true;
    }
}

function validarFechas() {
    const fechaInicio = document.getElementById("fechaI");
    const fechaFin = document.getElementById("fechaD");
    const btnBuscar = document.getElementById("btnBuscar");

    if (fechaInicio.value && fechaFin.value) {
        btnBuscar.disabled = false;
    } else {
        btnBuscar.disabled = true;
    }
}
