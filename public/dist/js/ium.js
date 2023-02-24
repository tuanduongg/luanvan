function handleSearchTable(inPutSearch,tableData) {

    $(inPutSearch).on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(tableData).filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
}