// hảm xử lý tìm kiếm
//params: #id_input search, query selector tabledata
function handleSearchTable(inPutSearch, tableData) {
    $(inPutSearch).on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $(tableData).filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
}

function formatDate(date) {
    var date = new Date(date);
    return (((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '/' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '/' + date.getFullYear());
}
