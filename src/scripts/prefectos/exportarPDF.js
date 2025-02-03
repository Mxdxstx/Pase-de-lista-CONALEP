document.getElementById('exportarPDF').addEventListener('click', () => {
    const { jsPDF } = window.jspdf;

    // Crear una instancia de jsPDF
    const doc = new jsPDF();

    // Obtener la tabla
    const tabla = document.getElementById('datos');

    // Extraer las filas y columnas de la tabla
    const data = [];
    const headers = [];
    tabla.querySelectorAll('thead th').forEach(th => headers.push(th.textContent));
    data.push(headers);

    tabla.querySelectorAll('tbody tr').forEach(tr => {
        const row = [];
        tr.querySelectorAll('td').forEach(td => row.push(td.textContent));
        data.push(row);
    });

    // Usar autoTable para agregar la tabla al PDF
    doc.autoTable({
        head: [headers],
        body: data.slice(1), // Excluir los encabezados ya que están en `head`
        startY: 10,
        styles: { halign: 'center', valign: 'middle' },
        headStyles: { fillColor: [5, 88, 37] }, // Color azul claro para el encabezado
    });

    // Descargar el PDF
    doc.save('tabla_datos.pdf');
});