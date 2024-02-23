function actualizarHora() {
    var fecha = new Date();
    var hora = fecha.getHours();
    var minutos = fecha.getMinutes();
    var segundos = fecha.getSeconds();

    // Formatear los valores para asegurar que siempre tengan dos dígitos
    hora = hora < 10 ? "0" + hora : hora;
    minutos = minutos < 10 ? "0" + minutos : minutos;
    segundos = segundos < 10 ? "0" + segundos : segundos;

    // Crear una cadena con el formato deseado
    var horaActual = hora + ":" + minutos + ":" + segundos;

    // Actualizar el contenido del elemento con el ID 'horaActual'
    document.getElementById("horaActual").innerHTML = horaActual;
    console.log("La hora es");
}

// Llamar a la función inicialmente para establecer la hora actual
actualizarHora();

// Configurar la actualización cada segundo (1000 milisegundos)
setInterval(actualizarHora, 1000);