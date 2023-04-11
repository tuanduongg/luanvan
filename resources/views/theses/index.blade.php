@extends('layout.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('dist/css/tagify.css') }}" />
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="h1">
                Luận văn sinh viên
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="" id="form-search" method="get">
                        <div class="row">
                            <div class="col-md-2 mb-2">
                                <input class="form-control" name="search" type="search" value=""
                                    placeholder="Nhập tên đề tài..." id="input-search">
                            </div>
                            <div class="col-md-2 mb-2">
                                <select class="form-select " id="filter-school-year">
                                    <option value="-1">Niên Khoá</option>
                                    @for ($i = $allSchoolYear; $i >= 1; $i--)
                                        <option value="{{ $i }}">K{{ $i }}</option>
                                    @endfor {{-- <option value="15">K15</option>
                                    <option value="14">K14</option>
                                    <option value="13">K13</option>
                                    <option value="12">K12</option>
                                    <option value="11">K11</option>
                                    <option value="10">K10</option>
                                    <option value="9">K9</option> --}}
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <button class="btn btn-outline-secondary" id="btn-reset" type="button">
                                    <span class="tf-icons bx bx-refresh me-1"></span>
                                    Làm mới
                                </button>
                            </div>
                            {{-- <div class="col-md-5 text-end">
                                <button id="btn-export" class="btn btn-info me-2" type="button">
                                    <span class="tf-icons bx bx-export me-1"></span>
                                    Xuất Excel
                                </button>
                                <button class="btn btn-primary" type="button" id="btn-create-theses" data-bs-toggle="modal"
                                    data-bs-target="#modal-theses">
                                    <span class="tf-icons bx bx-plus-circle me-1"></span>
                                    Thêm mới
                                </button>
                            </div> --}}
                        </div>
                        @if ((int) Auth::user()->role !== 3)
                            <div class="row mt-xs-2     ">
                                <div class="col d-md-flex justify-content-end ">
                                    <button id="btn-import" class="btn btn-secondary me-2 d-md-inline-block d-none"
                                        type="button">
                                        <label for="input-import">
                                            <span class="tf-icons bx bx-import me-1"></span>
                                            Nhập Excel
                                        </label>
                                    </button>
                                    <input type="file" class="d-none" id="input-import" accept=".xlsx"
                                        name="input-import">
                                    <button class="btn btn-primary" type="button" id="btn-create-theses"
                                        data-bs-toggle="modal" data-bs-target="#modal-theses">
                                        <span class="tf-icons bx bx-plus-circle me-1"></span>
                                        Thêm mới
                                    </button>
                                </div>
                            </div>
                        @endif

                    </form>
                </div>
                {{-- </div> --}}
                <div class="card-content">
                    <div class="table-responsive h-px-500">
                        <table class="table card-table " id="table-theses">
                            <thead class="">
                                <tr>
                                    <th class="text-primary text-center"
                                        style="background-color: #ffff;position: sticky; top: 0; z-index: 1;">STT</th>
                                    <th class="text-primary"
                                        style="background-color: #ffff;position: sticky; top: 0; z-index: 1;">Mã<br>luận văn
                                    </th>
                                    <th class="text-primary text-center"
                                        style="background-color: #ffff;position: sticky; top: 0; z-index: 1;">Tên đề tài
                                    </th>
                                    <th class="text-primary"
                                        style="background-color: #ffff;position: sticky; top: 0; z-index: 1;min-width: 170px;">
                                        Ngày bắt đầu</th>
                                    <th class="text-primary"
                                        style="background-color: #ffff;position: sticky; top: 0; z-index: 1; min-width: 170px;">
                                        Ngày kết thúc</th>
                                    <th class="text-primary"
                                        style="background-color: #ffff;position: sticky; top: 0; z-index: 1;">Niên khoá</th>
                                    <th class="text-primary"
                                        style="background-color: #ffff;position: sticky; top: 0; z-index: 1;">Vị trí<br>lưu
                                        trữ</th>
                                    <th class="text-primary"
                                        style="background-color: #ffff;position: sticky; top: 0; z-index: 1;">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-3">
                    <input type="hidden" name="hidden-search">
                    <input type="hidden" name="hidden-school_year">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center ">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="loading"></div>
    <!-- Modal -->
    <div class="modal fade" id="modal-theses" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Thêm mới luận văn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="" id="form-data-theses" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col mb-3">
                                <label for="tittle" class="form-label">Tên đề tài</label>
                                <textarea class="form-control" name="tittle" placeholder="Nhập tên đề tài" id="input-tittle" rows="2"></textarea>
                                <div class="invalid-feedback error-tittle">

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="content" class="form-label">Nội dung</label>
                                <textarea class="form-control" name="content" placeholder="Nhập tóm tắt nội dung" id="input-content"
                                    rows="3"></textarea>
                                <div class="invalid-feedback error-content">

                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="start_date" class="form-label">Ngày bắt đầu</label>
                                <input type="date" id="input-start_date" name="start_date" class="form-control"
                                    placeholder="">
                                <div class="invalid-feedback error-start_date">

                                </div>
                            </div>
                            <div class="col mb-0">
                                <label for="end-date" class="form-label">Ngày kết thúc</label>
                                <input type="date" id="input-end_date" name="end_date" class="form-control">
                                <div class="invalid-feedback error-end_date"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="input-lecturer_id" class="form-label">Mã giảng viên</label>
                                <input type="text" name="lecturer_id" id="input-lecturer_id" class="form-control"
                                    placeholder="Nhập mã giảng viên">
                                <div class="invalid-feedback error-lecturer_id"></div>
                            </div>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="school_year" class="form-label">Niên khoá</label>
                                <select id="input-school_year" name="school_year" class="form-select">
                                    @for ($i = $allSchoolYear; $i >= 1; $i--)
                                        <option value="{{ $i }}">K{{ $i }}</option>
                                    @endfor
                                </select>
                                <div class="invalid-feedback error-school_year">

                                </div>
                            </div>
                            <div class="col mb-0">
                                <label for="storage_location" class="form-label">Vị trí lưu trữ</label>
                                <input type="text" id="input-storage_location" name="storage_location"
                                    placeholder="Nhập vị trí lưu trữ" class="form-control" id="">
                                <div class="invalid-feedback error-storage_location">

                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id">
                        <div class="row">

                            <div class="mb-3">
                                <label for="input-student_id" class="form-label d-block">Sinh viên</label>
                                <input id="input-student_id" required class="tagify-email-list" name="student_id"
                                    value="">
                                <button type="button" id="btn-add-input-msv"
                                    class="btn btn-outline-primary btn-icon rounded-pill"><span
                                        class="tf-icons bx bx-plus"></span></button>
                            </div>
                        </div>
                        <div class="row row g-2 mb-3">
                            <div class="col">
                                <label for="input-archivist" class="form-label">Người lưu trữ</label>
                                <input class="form-control" name="archivist" type="text" placeholder="Người lưu trữ"
                                    id="input-archivist">
                                <div class="invalid-feedback error-archivist"></div>
                            </div>
                            <div class="col">
                                <label for="file" class="form-label">File
                                    <span class="text-lowercase"> (nếu có)</span>
                                </label>
                                <input class="form-control" type="file" name="file" id="input-file">
                                <div class="invalid-feedback error-file"></div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" id="btn-store-theses" class="btn btn-primary">Lưu thay đổi</button>
                    <button type="button" id="btn-update-theses" style="display: none;" class="btn btn-primary">Cập
                        nhật</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('dist/js/tagify.js') }}"></script>
    <script lang="javascript" src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
    <script>
        function handleClickPanigate(currentPage, lastPage) {
            event.preventDefault();
            if (currentPage >= 1 && currentPage <= lastPage) {
                let filter = {
                    "school_year": $('input[name=hidden-school_year').val(),
                    "name": $('input[name=hidden-search').val()
                }
                getData(currentPage, filter);
            }
        }

        function getAjax(url, data) {
            $.ajax({
                type: "get",
                url: url,
                data: data,
                dataType: "json",
                beforeSend: function() {
                    $(".loading").show();
                },
                success: function(response) {
                    $('.pagination').empty();
                    $('#table-theses > tbody').empty();
                    if (response.data.data.length == 0) {
                        toastr["success"]('Không có dữ liệu !', "Thông báo");
                        return;
                    }
                    let student = response.data;
                    showData(student.data, student.current_page, student.last_page, student.links);
                    $('.loading').hide();
                },
                error: function(response) {
                    console.error(response);
                }
            });
        }

        function getData(page = 1, filter = '') {
            let url = "{{ route('api.theses.getAll') }}";
            let data = {
                'page': page,
            };
            // let oldFilter = '';
            if (filter != '') {
                url = "{{ route('api.theses.filter') }}";
                data = {
                    "page": page,
                    'school_year': filter.school_year,
                    'search': filter.name,
                }
            }

            $('#btn-update-theses').hide();
            $('#table-theses > tbody').empty();
            getAjax(url, data);
        };



        function showData(data, current_page, last_page, links) {
            $('#table-theses > tbody').empty(); // xoá dữ liệu trong tbody
            $('.pagination').empty();
            // for (let i = response.data.from; i < response.data.to; i++) {

            $.each(links, (index, value) => {
                let disabled = '',
                    active = '';
                if (value.url == null) {
                    disabled = 'disabled';
                }
                if (value.active == true) {
                    active = 'active';
                }
                let label = value.label;
                let classHide = '';
                switch (label) {
                    case '&laquo; Trước':
                        label = current_page - 1;
                        classHide = 'd-none d-md-block';
                        break;
                    case 'Tiếp &raquo;':
                        label = current_page + 1;
                        classHide = 'd-none d-md-block';
                        break;
                    default:
                        break;
                }
                $('.pagination').append(`
                        <li class="page-item ${disabled} ${active} ${classHide}" >
                            <a class="page-link " style="cursor: pointer;" onclick="handleClickPanigate(${label},${last_page})">${value.label}</a>
                        </li>
                    `);
            });
            let start = ((current_page - 1) * 10) + 1;

            $.each(data, function(index, value) {
                let urlView = "{{ route('theses.view', ['id', 'slug']) }}";
                urlView = urlView.replace('id', value.id);
                urlView = urlView.replace('slug', string_to_slug(value.tittle));
                $('#table-theses > tbody').append(`
                
                        <tr>
                            <td>${start++}</td>
                            <td>${value.code}</td>
                            <td class=""><a class=" td-link" href="${urlView}">
                                    ${value.tittle}
                                    </a>    </td>
                            <td>${formatDate(value.start_date)}</td>
                            <td>${formatDate(value.end_date)}</td>
                            <td><span class="badge bg-label-secondary me-1 ">${value.school_year}</span></td>
                            <td>${value.storage_location}</td>
                                <td>
                                    <div class="dropdown d-flex">
                                        @if ((int) Auth::user()->role !== 3)
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow me-2"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                            @endif
                                            <a href="${urlView}" class="btn hide-arrow p-0"><i class='bx bx-show-alt'></i></a>
                                            @if ((int) Auth::user()->role !== 3)
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" id='btn-edit-theses' data-bs-toggle="modal" data-bs-target="#modal-theses" data-id=${value.id} href="javascript:void(0);">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                Sửa
                                            </a>
                                            <a class="dropdown-item" id='btn-delete-theses' data-id=${value.id} href="javascript:void(0);">
                                                <i class="bx bx-trash me-1"></i>
                                                Xoá
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </td>
                        </tr>`);
            });
        }


        $(document).ready(function() {
            var arrLecturers = [];
            var arrStudents = [];

            function removeThsTsName(name) {
                return name.includes('ths.') ? name.split('ths.')[1].trim() : name.includes('ts.') ? name.split(
                    'ts.')[1].trim() : name;

            }

            function getLecturerByName(arr, nameLec = "") {
                let data = arr.filter((item) => {
                    let name = removeThsTsName(item.name.toString());
                    // console.log(nameLec.toString().toLowerCase());
                    // console.log(name.includes(nameLec.toString().toLowerCase()));
                    nameLec = removeThsTsName(nameLec.toLowerCase());
                    return name.toLowerCase().includes(nameLec);
                });
                console.log(data);
                return data;
            }

            function getStudentByCode(arr, code) {
                return arrStudents.filter((item) => {
                    return item.student_code == code;
                });
            }

            function validateImport(data) {
                if (data.length > 4) {

                    // let checkMsv = getStudentByCode(arrStudents, data[1]);
                    // if (checkMsv.length < 1) {
                    //     return `Mã sinh viên (${data[1]}) không tồn tại trong hệ thống`;
                    // }

                    if (data[5] && data[5].length > 200) {
                        return "Tên đề tài tối đa 200 ký tự";
                    }
                    if (data[6] && data[6].length > 500) {
                        return "Nội dung tối đa 500 ký tự";
                    }
                    if (data[8] && !isDate(data[8])) {
                        return "Ngày bắt đầu Không đúng định dạng ngày tháng năm";
                    }
                    if (data[9] && !isDate(data[9])) {
                        return "Ngày kết thúc Không đúng định dạng ngày tháng năm";
                    }

                    if (data[5]) {
                        let checkNameLecturer = getLecturerByName(arrLecturers, data[5]);
                        if (checkNameLecturer.length < 1) {
                            return `(${data[5]}) không có trong hệ thống`;
                        } else if (checkNameLecturer.length > 1) {
                            return `Tồn tại ${checkNameLecturer.length} giảng viên có tên (${data[5]})`
                        }
                    }

                    return "";
                }
                return "Không đúng định dạng file"

            }
            //handle import excel
            function handleImportFile(e) {
                var file = e.target.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    var data = e.target.result;
                    var workbook = XLSX.read(e.target.result, {
                        dateNF: 'mm/dd/yyyy',
                        cellDates: true,
                        raw: true
                    });
                    var worksheet = workbook.Sheets[workbook.SheetNames[0]];
                    var jsonData = XLSX.utils.sheet_to_json(worksheet, {
                        header: 1,
                        cellDates: true,
                        dateNF: 'yyyy-mm-dd',
                        raw: false
                    });
                    let isAccept = false;
                    let flagAccept = false;
                    var arrReult = [];
                    for (let i = 0; i < jsonData.length; i++) {
                        if (jsonData[i].length === 13 && !isNaN(parseInt(jsonData[i][0]))) {
                            isAccept = true;
                            if (jsonData[i + 1].length === 5 && !isNaN(parseInt(jsonData[i + 1][0]))) {
                                flagAccept = true;
                            } else {
                                toastr.error(`Lỗi hàng ${(i + 2)} file excel`, "Lỗi Định Dạng File");
                            }
                            let msg = validateImport(jsonData[i]);
                            let msg2 = validateImport(jsonData[i + 1]);
                            if (msg !== '' || msg2 !== '') { // lỗi
                                toastr.options.timeOut = 0;
                                toastr.options.extendedTimeOut = 0;
                                toastr.error(`Lỗi hàng ${ msg !== '' ? (i + 1) : (i + 2)} file excel:` + (
                                    msg !== '' ? msg : msg2), "Lỗi Nhập File");
                                return;
                            };
                            let randomStr = jsonData[i][10] + Date.now().toString().slice(-5) + i;
                            // if(jsonData[5]) {
                            let lec_id = getLecturerByName(arrLecturers, jsonData[i][5])[0].id;
                            // }
                            let regex = /[0-9]+a/gm; // lấy niên khoá sinh viên từ lớp ex: DHTI13A1HN -> 13A
                            let found1 = jsonData[i][4].toLowerCase().match(regex)
                            let found2 = jsonData[i + 1][4].toLowerCase().match(regex)

                            ;
                            //code : LV + niên khoá + i
                            let obj = {
                                code: `LV${randomStr}`,
                                tittle: jsonData[i][6].trim(),
                                content: jsonData[i][7].trim().replace(new RegExp('\r?\n', 'g'), '<br/>'),
                                start_date: formatDate(jsonData[i][8], 'yyyy-mm-dd'),
                                end_date: formatDate(jsonData[i][9], 'yyyy-mm-dd'),
                                lecturer_id: lec_id,
                                school_year: jsonData[i][10],
                                archivist: jsonData[i][11],
                                storage_location: jsonData[i][12],
                                students: [{
                                    student_code: jsonData[i][1],
                                    student_name: `${jsonData[i][2] + ' ' + jsonData[i][3]}`,
                                    student_class: `${jsonData[i][4]}`,
                                    student_school_year: found1[0].slice(0, found1[0].length - 1),
                                }, {
                                    student_code: jsonData[i + 1][1],
                                    student_name: `${jsonData[i+1][2] + ' ' + jsonData[i+1][3]}`,
                                    student_class: `${jsonData[i+1][4]}`,
                                    student_school_year: found2[0].slice(0, found2[0].length - 1),
                                }]
                            };
                            arrReult.push(obj);
                        }
                    };

                    if (isAccept === false) {
                        toastr["error"]("file excel không đúng định dạng", "Thông báo");
                        return;
                    }
                    //call ajax
                    let url = "{{ route('api.theses.storeMultiple') }}";
                    $.ajax({
                        type: "post",
                        url: url,
                        data: {
                            data: arrReult
                        },
                        dataType: "json",
                        success: function(response) {
                            toastr["success"]("Thêm mới thành công", "Thông báo");
                            getData();
                        },
                        error: function(res) {
                            toastr["error"](res.responseJSON.message, "Thông báo");
                        }
                    });



                };
                reader.readAsArrayBuffer(file);
                $("#input-import").val(null);
            }

            function getAllLecturerName() {
                let url = "{{ route('api.lecturer.getAllName') }}";
                $.ajax({
                    type: "get",
                    async: true,
                    url: url,
                    dataType: "json",
                    success: function(response) {
                        arrLecturers = response.data;
                        return;
                    },
                    error: function(res) {
                        console.log(res);
                    }
                });
                return null;
            }

            $(document).on('change', '#input-import', (e) => {
                Swal.fire({
                    title: 'Thông Báo!',
                    text: "Bạn chắc chắn muốn nhập từ excel?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Không",
                    confirmButtonText: 'Vâng!đúng rồi'
                }).then((result) => {

                    if (result.isConfirmed) {
                        toastr.clear();
                        getAllLecturerName();
                        setTimeout(() => {
                            handleImportFile(e);
                        }, 500);
                    } else {
                        $("#input-import").val(null);
                    }
                })

            });
            //end handle import excel


            $(document).on('focus', 'input,textarea', (e) => {
                $(e.target).removeClass('is-invalid');
            });

            var whitelists = [];
            const TagifyStudentListEl = document.querySelector("#input-student_id");
            const TagifyStudentList = new Tagify(TagifyStudentListEl, {
                // email address validation (https://stackoverflow.com/a/46181/104380)
                // pattern: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                texts: {
                    empty: "Không được để trống",
                    exceed: "Tối đa 2 sinh viên",
                    pattern: "Không đúng định dạng",
                    duplicate: "Đã tồn tại dữ liệu",
                },
                whitelist: whitelists,
                maxTags: 2,
                callbacks: {
                    'invalid': onInvalidTag,
                },
                dropdown: {
                    maxItems: 5,
                    position: "text",
                    enabled: 1, // show suggestions dropdown after 1 typed character
                }
            });
            //handle on change
            // TagifyStudentListEl.addEventListener('change', onChange)
            // let couter = 1;

            const button = TagifyStudentListEl.nextElementSibling; // "add new tag" action-button

            button.addEventListener("click", onAddButtonClick);

            function onAddButtonClick(e) {

                let inputVal = $('#input-student_id').val();
                // if (inputVal) {

                if (inputVal == '') {

                    TagifyStudentList.addEmptyTag();
                    return;
                } else {
                    if (JSON.parse(inputVal).length < 2) { //litmit add tags = 2
                        TagifyStudentList.addEmptyTag();
                        return;
                    }

                }
            }

            function onInvalidTag(e) {
                toastr["error"](e.detail.message, "Thông báo");
                // alert(e.detail.message);
            }

            // handle onclick button add input-msv

            let couter = false;
            $(document).on('click', '#btn-add-input-msv', () => {
                if (couter != true) {
                    let data = [];
                    $.ajax({
                        type: "get",
                        url: "{{ route('api.student.select2') }}",
                        dataType: "json",
                        success: function(response) {
                            response.data.forEach(element => {
                                data.push(element.student_code +
                                    `(${element.student_name})`)
                            });
                            TagifyStudentList.settings.whitelist = data;
                        }
                    });
                }
                couter = true;
                // return data;
            });



            function emptyInput() {
                $('input[name=code]').val('');
                $('textarea[name=tittle]').val('');
                $('textarea[name=content]').val('');
                $('input[name=student_id]').val('');
                $('input[name=lecturer_id]').val('');
                $('input[name=archivist]').val('');
                $('input[name=start_date]').val('');
                $('input[name=end_date]').val('');
                $('input[name=storage_location]').val('');
                // $('select[name=role]').val('');
                $("select[name=role]").prop("selectedIndex", 0);
                $('input[name=file]').val('');
                resetClassInput('is-invalid');
            }

            function resetClassInput(className) {
                $('input[name=code]').removeClass(className);
                $('textarea[name=tittle]').removeClass(className);
                $('textarea[name=content]').removeClass(className);
                $('input[name=student_id]').removeClass(className);
                $('input[name=lecturer_id]').removeClass(className);
                $('input[name=archivist]').removeClass(className);
                $('input[name=start_date]').removeClass(className);
                $('input[name=end_date]').removeClass(className);
                $('input[name=storage_location]').removeClass(className);
                $("select[name=role]").removeClass(className);
                $('input[name=file]').removeClass(className);
            }

            //on modal close

            //
            //load all data from server to table
            getData();

            //handle edit dispatch type
            $(document).on('click', '#btn-edit-theses', function(e) {
                e.preventDefault();
                $('#btn-update-theses').show();
                $('#btn-store-theses').hide();
                emptyInput();

                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{ route('api.theses.find') }}",
                    data: {
                        "id": id
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('input[name=id]').val(id);
                        $('input[name=code]').val(response.data.code);
                        $('textarea[name=tittle]').val(response.data.tittle);
                        $('input[name=start_date]').val(response.data.start_date);
                        $('input[name=end_date]').val(response.data.end_date);
                        $('textarea[name=content]').val(response.data.content);
                        $('input[name=storage_location]').val(response.data.storage_location);
                        $('input[name=lecturer_id]').val(response.data.lecturer.code);

                        if (response.data.students.length > 0) {
                            let result = '';
                            response.data.students.forEach((element, index) => {
                                let sepe = ',';
                                result += element.student_code +
                                    `(${element.student_name})` + sepe;
                            });
                            result = result.trim().slice(0, -1);
                            $('#input-student_id').val(`${result}`);
                        }

                        $('input[name=archivist]').val(response.data.archivist);
                        // $('select[name=student_id]').val(response.data[0].student_code);
                        // $("#input-msv").select2(response.data[0].student_code);
                        $('.modal-title').text('Chỉnh sửa thông tin');

                    },
                    error: function(response) {
                        console.error(response);
                    }
                });
            });
            //handle update dispatch type
            $(document).on('click', '#btn-update-theses', function() {
                resetClassInput('is-invalid');
                $.ajax({
                    type: "post",
                    url: "{{ route('api.theses.update') }}",
                    data: new FormData(document.getElementById('form-data-theses')),
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#modal-theses').modal('hide');
                        getData();
                        toastr["success"](response.message, "Thông báo");
                    },
                    error: function(response) {
                        if (response.responseJSON.errors.length > 0) {

                            $.each(response.responseJSON.errors, function(index,
                                value) {
                                $(`#input-${index}`).addClass(
                                    'is-invalid');
                                $(`.error-${index}`).text(value[0]);
                            });
                        } else {
                            if (response.responseJSON.errors) {

                                $.each(response.responseJSON.errors, function(index, value) {
                                    $(`#input-${index}`).addClass(
                                        'is-invalid');
                                    $(`.error-${index}`).text(value[0]);
                                });
                            } else {
                                toastr["error"](response.responseJSON.message, "Thông báo");
                            }
                        }
                    }
                });
            });
            //handle create dispatch type

            $(document).on('click', '#btn-create-theses', function() {

                $('#btn-store-theses').show();
                $('#btn-update-theses').hide();
                $('.modal-title').text('Thêm mới luận văn');
                emptyInput();
            });

            //handle store dispatch type
            $(document).on('click', '#btn-store-theses', function() {
                resetClassInput('is-invalid');
                $.ajax({
                    type: "post",
                    url: "{{ route('api.theses.store') }}",
                    data: new FormData(document.getElementById('form-data-theses')),
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#modal-theses').modal('hide');
                        getData();
                        toastr["success"](response.message, "Thông báo");
                    },
                    error: function(response) {
                        if (response.responseJSON.errors) {

                            $.each(response.responseJSON.errors, function(index,
                                value) {
                                $(`#input-${index}`).addClass(
                                    'is-invalid');
                                $(`.error-${index}`).text(value[0]);
                            });
                        } else {
                            toastr["error"](response.responseJSON.message, "Thông báo");
                        }
                    }
                });
            });

            //handle delete dispatch type
            $(document).on('click', '#btn-delete-theses', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Thông Báo!',
                    text: "Bạn chắc chắn muốn xoá?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Không",
                    confirmButtonText: 'Vâng!đúng rồi'
                }).then((result) => {

                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: "{{ route('api.theses.distroy') }}",
                            data: {
                                "id": id
                            },
                            dataType: "json",
                            success: function(response) {
                                Swal.fire(
                                    'Thông Báo!',
                                    response.message,
                                    'success'
                                )
                                getData();
                            },
                            error: function(response) {
                                console.error(response);
                            }
                        });

                    }
                })

            });
            var debounce = null;
            $('#input-search').on('input', function(e) {
                clearTimeout(debounce);
                debounce = setTimeout(function() {
                    e.preventDefault();
                    let searchVal = $('#input-search').val();
                    let school_year = $('#filter-school-year').val();
                    $('input[name=hidden-search').val(searchVal);
                    $('input[name=hidden-school_year').val(school_year);
                    let data = {
                        'school_year': school_year,
                        'search': searchVal,
                    };
                    getAjax("{{ route('api.theses.filter') }}", data);
                }, 1000);
            });

            $(document).on('change', '#filter-school-year', function(e) {
                let searchVal = $('#input-search').val();
                $('input[name=hidden-search').val(searchVal);
                $('input[name=hidden-school_year').val(e.target.value);
                let data = {
                    'school_year': e.target.value,
                    'search': searchVal,
                };
                getAjax("{{ route('api.theses.filter') }}", data);
            });



            //handle button reset
            $(document).on('click', '#btn-reset', function(event) {
                event.preventDefault();
                window.location.href = "{{ route('theses') }}";
            })

        });
    </script>
@endpush
