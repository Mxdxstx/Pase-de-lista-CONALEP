function habilitarElementos() {
    let selectGrupo = document.getElementById("grupo");
    let checkbox = document.getElementById("asistieron");
    let slider = document.getElementById("slider");
    let boton = document.getElementById("exportarPDF");

    if (selectGrupo.value !== "") {
        checkbox.disabled = false;
        boton.disabled = false;
        slider.style.opacity = "1";
    } else {
        checkbox.disabled = true;
        boton.disabled = true;
        slider.style.opacity = "0.5"; 
    }
}

window.onload = function() {
    document.getElementById("asistieron").disabled = true;
    document.getElementById("exportarPDF").disabled = true;
    document.getElementById("slider").style.opacity = "0.5";
};