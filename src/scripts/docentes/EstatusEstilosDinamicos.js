var select = document.getElementById('miSelect');

// Agregar un event listener para detectar cambios en la selección
select.addEventListener('change', function() {
    console.log('Inicio de la funcion');
  // Obtener la opción seleccionada
  var selectedOption = select.options[select.selectedIndex];
  
  // Eliminar cualquier clase previamente aplicada
  select.className = 'miSelect';
  
  // Agregar la clase de la opción seleccionada al select
  select.classList.add(selectedOption.className);

  console.log('Fin de la funcion');
});