document.getElementById('exportarPDF').addEventListener('click', () => {
    const { jsPDF } = window.jspdf;

    const doc = new jsPDF();

    doc.setFontSize(20); 
    doc.setFont('times', 'bold');
    doc.setTextColor(0, 126, 103);
    doc.text('Reportes por Fechas', 105, 20, { align: 'center' });

    doc.setDrawColor(0, 126, 103); 
    doc.setLineWidth(0.5); 
    doc.line(50, 22, 160, 22); 

    const tabla = document.getElementById('datos');

    const data = [];
    const headers = [];
    tabla.querySelectorAll('thead th').forEach(th => headers.push(th.textContent));
    data.push(headers);

    tabla.querySelectorAll('tbody tr').forEach(tr => {
        const row = [];
        tr.querySelectorAll('td').forEach(td => row.push(td.textContent));
        data.push(row);
    });

    doc.autoTable({
        head: [headers],
        body: data.slice(1),
        startY: 30, 
        styles: { 
            halign: 'center', 
            valign: 'middle',
            font: 'helvetica',
            fontSize: 10,
            cellPadding: 3,
            lineWidth: 0.1,
            lineColor: [200, 200, 200],
        },
        headStyles: { 
            fillColor: [0, 126, 103], 
            textColor: [255, 255, 255], 
            fontStyle: 'bold',
        },
        bodyStyles: {
            textColor: [0, 0, 0], 
        },
        alternateRowStyles: {
            fillColor: [245, 245, 245],
        },
        margin: { top: 25 },
    });

    doc.save('Reporte_Fecha.pdf');
});