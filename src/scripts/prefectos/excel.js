document.addEventListener("click", function (event) {
    // Verificar si el clic fue en el botón con id "btnExportar"
    if (event.target && event.target.id === "btnExportar") {
        console.log("Botón Exportar presionado");

        // Seleccionar la tabla dinámica
        const $tabla = document.querySelector("#datos");
        if ($tabla) {
            // Lógica para exportar la tabla a Excel
            let tableExport = new TableExport($tabla, {
                exportButtons: false,
            });
            let exportData = tableExport.getExportData();
            let excelData = exportData.datos.xlsx;

            // Crear el archivo Excel
            let wb = XLSX.utils.book_new();
            let ws = XLSX.utils.aoa_to_sheet(excelData.data);

            // Ajustar anchos de las columnas
            let wscols = [
                { wch: 15 }, // Ancho de columna 1
                { wch: 25 }, // Ancho de columna 2
                { wch: 20 }, // Ancho de columna 3
            ];
            ws["!cols"] = wscols;

            XLSX.utils.book_append_sheet(wb, ws, excelData.sheetname);

            // Descargar el archivo Excel
            let excelFilename = "Reporte.xlsx";
            XLSX.writeFile(wb, excelFilename);
        } else {
            console.error("La tabla #datos no existe en el DOM");
        }
    }
});
