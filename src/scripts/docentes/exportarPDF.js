document.getElementById('exportarPDF').addEventListener('click', () => {
    const { jsPDF } = window.jspdf;

    const doc = new jsPDF();

    const tabla = document.getElementById('datos');

    const headers = [];
    const data = [];

    tabla.querySelectorAll('thead th').forEach(th => headers.push(th.textContent));

    tabla.querySelectorAll('tbody tr').forEach(tr => {
        const row = [];
        tr.querySelectorAll('td').forEach(td => row.push(td.textContent.trim()));
        data.push(row);
    });

    doc.autoTable({
        head: [headers],
        body: data,
        startY: 20,
        styles: { fontSize: 10, halign: 'center', valign: 'middle' },
        headStyles: { fillColor: [0, 126, 103], textColor: [255, 255, 255] },
        alternateRowStyles: { fillColor: [240, 240, 240] },
        margin: { top: 10 },
    });

    doc.save('Reportes_Alumnos.pdf');
});
