const $btnExportar = document.querySelector("#btnExportar"),
    $tabla = document.querySelector("#datos");

$btnExportar.addEventListener("click", function () {
    let tableExport = new TableExport($tabla, {
        exportButtons: false,
    });
    let exportData = tableExport.getExportData();
    let excelData = exportData.datos.xlsx;

    // Crear un nuevo workbook de SheetJS
    let wb = XLSX.utils.book_new();
    let ws = XLSX.utils.aoa_to_sheet(excelData.data);

    // Estilos para la tabla en Excel
    let wscols = [
        { wch: 15 }, // Ancho de la primera columna
        { wch: 25 }, // Ancho de la segunda columna
        { wch: 20 }, // Ancho de la tercera columna
        // Agrega más objetos para ajustar anchos de otras columnas
    ];

    ws['!cols'] = wscols; // Aplicar estilos de ancho de columnas

    // Centrar el contenido en las celdas
    for (let r = 0; r < ws['!ref'].split(':')[1].replace(/\D/g, ''); r++) {
        for (let c = 0; c < wscols.length; c++) {
            let cellRef = XLSX.utils.encode_cell({ r: r, c: c });
            if (!ws[cellRef]) continue;
            ws[cellRef].s = { alignment: { horizontal: "center" } }; // Estilo de centrado horizontal
        }
    }

    // Agregar la hoja al workbook
    XLSX.utils.book_append_sheet(wb, ws, excelData.sheetname);

    // Asignar nombre al archivo Excel
    let excelFilename = "Reporte"; // Nombre del archivo Excel
    excelFilename += "." + excelData.fileExtension;

    // Descargar el archivo Excel con el nombre asignado
    XLSX.writeFile(wb, excelFilename);
});
