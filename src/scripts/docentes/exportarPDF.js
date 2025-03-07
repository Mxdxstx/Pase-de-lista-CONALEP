document.getElementById('exportarPDF').addEventListener('click', () => {
    const { jsPDF } = window.jspdf;

    const doc = new jsPDF();

    const fechaHora = new Date().toLocaleString(); 

    doc.setFontSize(20); 
    doc.setFont('times', 'bold');
    doc.setTextColor(0, 126, 103);
    doc.text('Estatus de Alumnos', 105, 20, { align: 'center' });

    doc.setDrawColor(0, 126, 103); 
    doc.setLineWidth(0.5); 
    doc.line(50, 22, 160, 22); 

    doc.setFontSize(10);
    doc.setFont('helvetica', 'normal');
    doc.setTextColor(100, 100, 100); 
    doc.text(`Información extraída el: ${fechaHora}`, 105, 28, { align: 'center' });

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
        startY: 35, 
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
        columnStyles: {
            4: { 
                fillColor: [255, 255, 0], 
                textColor: [0, 0, 0], 
                fontStyle: 'bold', 
            },
        },
        margin: { top: 30 }, 
    });

    doc.save('Estatus_Alumnos.pdf');
});
