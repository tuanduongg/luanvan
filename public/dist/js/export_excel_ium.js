function ExportToExcel(idTable, type, fn, dl) {
    var elt = document.getElementById("idTable");
    var wb = XLSX.utils.table_to_book(elt, {
        sheet: "sheet1",
        ignoreHiddenRows: true,
    });

    return dl
        ? XLSX.write(wb, { bookType: type, bookSST: true, type: "base64" })
        : XLSX.writeFile(wb, fn || "MySheetName." + (type || "xlsx"));
}
