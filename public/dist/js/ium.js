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

function formatDate(dateParam, type = "dd/mm/yyyy") {
    var date = new Date(dateParam);
    let result = "";
    switch (type) {
        case "dd/mm/yyyy":
            result =
                (date.getDate() > 9 ? date.getDate() : "0" + date.getDate()) +
                "/" +
                (date.getMonth() > 8
                    ? date.getMonth() + 1
                    : "0" + (date.getMonth() + 1)) +
                "/" +
                date.getFullYear();
            break;
        case "yyyy-mm-dd":
            result =
                date.getFullYear() +
                "-" +
                (date.getMonth() > 8
                    ? date.getMonth() + 1
                    : "0" + (date.getMonth() + 1)) +
                "-" +
                (date.getDate() > 9 ? date.getDate() : "0" + date.getDate());
            break;
        default:
            break;
    }
    return result;
}
$(document).on("focus", "input,textarea,select", (e) => {
    $(e.target).removeClass("is-invalid");
});

$(document).on("click", "tbody > tr", function () {
    $("tbody > tr").removeClass("active-tr");
    $(this).addClass("active-tr");
});

function hideCols(cols) {
    cols.map((col) => {
        $(col).hide();
    });
}

function showCols(cols) {
    cols.map((col) => {
        $(col).show();
    });
}

function isDate(date) {
    return new Date(date) !== "Invalid Date" && !isNaN(new Date(date));
}

function validateImportExcel(data, type) {
    if (arrCodes.includes(data[0])) {
        return "Số công văn đã tồn tại";
    }

    if (data[1] && data[1].length > 200) {
        return "Tiêu đề tối đa 200 ký tự";
    }

    if (data[2] && data[2].length > 1000) {
        return "Nội dung tối đa 1000 ký tự";
    }
    if (type == 2) {
        if (data[4] && data[4].length > 150) {
            return "Nơi nhận tối đa 150 ký tự";
        }
        if (data[5] && data[5].length > 50) {
            return "Người ký tối đa 50 ký tự";
        }
        if (!isDate(data[6])) {
            return "Ngày ký Không đúng định dạng ngày tháng năm";
        }
        if (!isDate(data[7])) {
            return "Ngày ban hành Không đúng định dạng ngày tháng năm";
        }
        if (data[8] && data[8].length > 50) {
            return "Nơi ban hành tối đa 50 ký tự";
        }
        if (!isDate(data[9])) {
            return "Ngày hiệu lực Không đúng định dạng ngày tháng năm";
        }
        if (!isDate(data[10])) {
            return "Ngày hết hiệu lực Không đúng định dạng ngày tháng năm";
        }
        if (data[11] && data[11].length > 50) {
            return "Người lưu trữ tối đa 50 ký tự";
        }
        if (data[12] && data[12].length > 50) {
            return "Nơi lưu trữ tối đa 50 ký tự";
        }
    } else {
        if (data[4] && data[4].length > 50) {
            return "Người ký tối đa 50 ký tự";
        }
        if (!isDate(data[5])) {
            return "Ngày ký Không đúng định dạng ngày tháng năm";
        }
        if (!isDate(data[6])) {
            return "Ngày ban hành Không đúng định dạng ngày tháng năm";
        }
        if (data[7] && data[7].length > 50) {
            return "Nơi ban hành tối đa 50 ký tự";
        }
        if (!isDate(data[8])) {
            return "Ngày hiệu lực Không đúng định dạng ngày tháng năm";
        }
        if (!isDate(data[9])) {
            return "Ngày hết hiệu lực Không đúng định dạng ngày tháng năm";
        }
        if (data[10] && data[10].length > 50) {
            return "Người lưu trữ tối đa 50 ký tự";
        }
        if (data[11] && data[11].length > 50) {
            return "Nơi lưu trữ tối đa 50 ký tự";
        }
    }

    return "";
}

function html_table_to_excel(idTabel) {
    let now = new Date().toLocaleString();
    hideCols([".td-action", ".td-stt"]);
    var data = document.getElementById(idTabel);

    var file = XLSX.utils.table_to_book(data, {
        sheet: "sheet1",
        display: true,
        dateNF: "mm/dd/yyyy;@",
        cellDates: true,
        raw: true,
    });

    XLSX.write(file, {
        bookType: "xlsx",
        bookSST: true,
        type: "base64",
        dateNF: "mm/dd/yyyy;@",
        cellDates: true,
        raw: false,
    });

    XLSX.writeFile(file, `${now}.xlsx`);
    showCols([".td-action", ".td-stt"]);
}

const export_button = document.getElementById("btn-export");
export_button.addEventListener("click", () => {
    html_table_to_excel("table-data");
});
function string_to_slug(title) {
    var slug;

    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a");
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
    slug = slug.replace(/đ/gi, "d");
    //Xóa các ký tự đặt biệt
    slug = slug.replace(
        /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
        ""
    );
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, "-");
    slug = slug.replace(/\-\-\-\-/gi, "-");
    slug = slug.replace(/\-\-\-/gi, "-");
    slug = slug.replace(/\-\-/gi, "-");
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = "@" + slug + "@";
    slug = slug.replace(/\@\-|\-\@|\@/gi, "");
    //In slug ra textbox có id “slug”
    return slug;
}

// function slugify(text)
// {
//     return text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
// }

function timeDifference(current, previous) {
    var msPerMinute = 60 * 1000;
    var msPerHour = msPerMinute * 60;
    var msPerDay = msPerHour * 24;
    var msPerMonth = msPerDay * 30;
    var msPerYear = msPerDay * 365;

    var elapsed = current - previous;

    if (elapsed < msPerMinute) {
        return Math.round(elapsed / 1000) + " giây trước";
    } else if (elapsed < msPerHour) {
        return Math.round(elapsed / msPerMinute) + " phút trước";
    } else if (elapsed < msPerDay) {
        return Math.round(elapsed / msPerHour) + " giờ trước";
    } else if (elapsed < msPerMonth) {
        return Math.round(elapsed / msPerDay) + " ngày trước";
    } else if (elapsed < msPerYear) {
        return Math.round(elapsed / msPerMonth) + " tháng trước";
    } else {
        return Math.round(elapsed / msPerYear) + " năm trước";
    }
}
