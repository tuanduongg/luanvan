@extends('layout.master')

@section('content')
    {{-- <div class="row">
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
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <input class="form-control" type="search" value="" placeholder="Tìm kiếm ..."
                                    id="">
                            </div>
                            <div class="col-md-2 mb-2">
                                <select class="form-select " id="" aria-label="Default select example">
                                    <option selected="">Niên Khoá</option>
                                    <option value="1">K13</option>
                                    <option value="2">K12</option>
                                    <option value="3">K11</option>
                                    <option value="4">K10</option>
                                </select>
                            </div>
                            <div class="col-md-6 text-end">
                                <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-luanvan">Thêm mới
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive h-px-500">
                    <table class="table card-table ">
                        <thead>
                            <tr>
                                <th>Mã luận văn</th>
                                <th>Tên đề tài</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Niên khoá</th>
                                <th>Vị trí lưu trữ</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>LV13ABC</td>
                                <td>Hệ thống quản lý thủ tục hành chính khoa cntt</td>
                                <td>12-3-2023</td>
                                <td>12-6-2023</td>
                                <td><span class="badge bg-label-primary me-1">K13</span></td>
                                <td>HA9 203</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);">
                                                <i class="bx bx-detail me-1"></i>
                                                Xem chi tiết
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0);">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                Sửa
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0);">
                                                <i class="bx bx-trash me-1"></i>
                                                Xoá
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
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
                                    placeholder="Nhập tên cần tìm..." id="input-search">
                            </div>
                            <div class="col-md-3 mb-2">
                                <button class="btn btn-outline-secondary" id="btn-reset" type="button">
                                    <span class="tf-icons bx bx-refresh me-1"></span>
                                    Làm mới
                                </button>
                            </div>
                            <div class="col-md-7 text-end">
                                <button class="btn btn-primary" type="button" id="btn-create-theses" data-bs-toggle="modal"
                                    data-bs-target="#modal-theses">
                                    <span class="tf-icons bx bx-plus-circle me-1"></span>
                                    Thêm mới
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- </div> --}}
                <div class="card-content">
                    <div class="table-responsive h-px-500">
                        <table class="table card-table " id="table-theses">
                            <thead class="">
                                <tr>
                                    <th>Mã luận văn</th>
                                    <th>Tên đề tài</th>
                                    <th style="min-width: 170px;">Ngày bắt đầu</th>
                                    <th style="min-width: 170px;">Ngày kết thúc</th>
                                    <th>Niên khoá</th>
                                    <th>Vị trí lưu trữ</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-3">
                    <input type="hidden" name="hidden-search">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center ">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-theses" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Thêm mới luận văn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">

                        <div class="row">
                            <div class="col mb-3">
                                <label for="tittle" class="form-label">Tên đề tài</label>
                                <textarea class="form-control" name="tittle" placeholder="Nhập tên đề tài" id="tittle" rows="2"></textarea>
                                <div class="invalid-feedback error-tittle">

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="content" class="form-label">Nội dung</label>
                                <textarea class="form-control" name="content" placeholder="Nhập tóm tắt nội dung" id="content" rows="3"></textarea>
                                <div class="invalid-feedback error-content">

                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="start-date" class="form-label">Ngày bắt đầu</label>
                                <input type="date" id="start-date" name="start_date" class="form-control" placeholder="">
                                <div class="invalid-feedback error-start_date">

                                </div>
                            </div>
                            <div class="col mb-0">
                                <label for="end-date" class="form-label">Ngày kết thúc</label>
                                <input type="date" id="end-date" name="end_date" class="form-control">
                                <div class="invalid-feedback error-end_date"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="input-mgv" class="form-label">Mã giảng viên</label>
                                <input type="text" name="lecturer_id" id="input-mgv" class="form-control"
                                    placeholder="Nhập mã giảng viên">
                                <div class="invalid-feedback error-lecturer_id"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="input-msv" class="form-label">Sinh viên</label>
                                <select id="input-msv" name="student_id" multiple="multiple" class="form-select">
                                </select>
                                <div class="invalid-feedback error-student_id">
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="selct-nienkhoa" class="form-label">Niên khoá</label>
                                <select id="selct-nienkhoa" name="school_year" class="form-select">
                                    <option value="13">K13</option>
                                    <option value="12">K12</option>
                                    <option value="11">K11</option>
                                </select>
                                <div class="invalid-feedback error-school_year">

                                </div>
                            </div>
                            <div class="col mb-0">
                                <label for="input-sv" class="form-label">Vị trí lưu trữ</label>
                                <input type="text" name="storage_location" placeholder="Nhập vị trí lưu trữ"
                                    class="form-control" id="">
                                <div class="invalid-feedback error-storage_location">

                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id">
                        <div class="row row g-2 mb-3">
                            <div class="col">
                                <label for="archivist" class="form-label">Người lưu trữ</label>
                                <input class="form-control" name="archivist" type="text" id="archivist">
                                <div class="invalid-feedback error-archivist"></div>
                            </div>
                            <div class="col">
                                <label for="formFile" class="form-label">File</label>
                                <input class="form-control" type="file" id="formFile">
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
    <script>
        function handleClickPanigate(currentPage, lastPage) {
            event.preventDefault();
            if (currentPage >= 1 && currentPage <= lastPage) {
                let filter = {
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
                success: function(response) {
                    $('.pagination').empty();
                    $('#table-theses > tbody').empty();
                    if (response.data.data.length == 0) {
                        toastr["success"]('Không có dữ liệu !', "Thông báo");
                        return;
                    }
                    let student = response.data;
                    showData(student.data, student.current_page, student.last_page, student.links);
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
            console.log(filter);
            if (filter != '') {
                url = "{{ route('api.theses.filter') }}";
                data = {
                    "page": page,
                    'student_school_year': filter.student_school_year,
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
                // console.log(index);
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

            $.each(data, function(index, value) {
                $('#table-theses > tbody').append(`
                        <tr>
                            <td>${value.code}</td>
                            <td class="fw-bold">${value.tittle}</td>
                            <td>${formatDate(value.start_date)}</td>
                            <td>${formatDate(value.end_date)}</td>
                            <td><span class="badge bg-label-secondary me-1 ">${value.school_year}</span></td>
                            <td>${value.storage_location}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);">
                                                <i class="bx bx-detail me-1"></i>
                                                Xem chi tiết
                                            </a>
                                            <a class="dropdown-item" id='btn-edit-theses' data-bs-toggle="modal" data-bs-target="#modal-theses" data-id=${value.id} href="javascript:void(0);">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                Sửa
                                            </a>
                                            <a class="dropdown-item" id='btn-delete-theses' data-id=${value.id} href="javascript:void(0);">
                                                <i class="bx bx-trash me-1"></i>
                                                Xoá
                                            </a>
                                        </div>
                                    </div>
                                </td>
                        </tr>`);
            });
        }

        $(document).ready(function() {

            function formatState(state) {
                console.log('state' + state);
                if (!state.id) {
                    return state.text;
                }
                var baseUrl = "admin/images/flags";
                var $state = $(
                    '<span>' + state.text + '</span>'
                );
                return $state;
            };

            const URL = "{{ route('api.student.select2') }}";
            let config = {
                // placeholder: "Nhập mã sinh viên....",
                // allowClear: true,
                // tags: false,
                // width: '100%',
                // minimumInputLength: 3,
                // maximumSelectionLength: 2,
                // maximumResultsForSearch: 10,
                // templateResult: formatState,
                ajax: {
                    url: URL,
                    dataType: "json",
                    type: "GET",
                    delay: 250,
                    data: function(params) {

                        var queryParameters = {
                            student_name: params.term
                        }
                        return queryParameters;
                    },
                    processResults: function(data) {
                        console.log(data.data);
                        return {
                            results: $.map(data.data, function(item) {

                                return {
                                    text: item.student_name,
                                    id: item.student_code
                                }
                            })
                        };
                    }
                }
            }
            $('#input-msv').select2(config);

            $('.select2-search__field').addClass('form-control');


            function emptyInput() {
                $('input[name=code]').val('');
                $('input[name=tittle]').val('');
                $('input[name=content]').val('');
                // $('select[name=role]').val('');
                $("select[name=role]").prop("selectedIndex", 0);
                $('select[name=email]').val('');
                $('select[name=password]').val('');
                resetClassInput('is-invalid');

            }

            function resetClassInput(className) {
                $('input[name=code]').removeClass(className);
                $('input[name=email]').removeClass(className);
                $('input[name=password]').removeClass(className);
                $('input[name=tittle]').removeClass(className);
                $('input[name=content]').removeClass(className);
                $('select[name=role]').removeClass(className);
            }

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
                            response.data.students.forEach(element => {
                                var $option = $("<option selected='selected'></option>")
                                    .val(element.student_code).text(element
                                        .student_code);
                                $("#input-msv").append($option).trigger('change');
                            });
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
                let data = $('#form-data-lecturer').serializeArray();
                resetClassInput('is-invalid');
                $.ajax({
                    type: "put",
                    url: "{{ route('api.theses.update') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        $('#modal-theses').modal('hide');
                        getData();
                        toastr["success"](response.message, "Thông báo");
                    },
                    error: function(response) {
                        console.error(response);
                        // $('input[name=type_code]').addClass('is-invalid');
                        $.each(response.responseJSON.errors, function(index,
                            value) {
                            $(`input[name=${index}]`).addClass(
                                'is-invalid');
                            $(`.error-${index}`).text(value[0]);
                        });
                    }
                });
            });
            //handle create dispatch type

            $(document).on('click', '#btn-create-theses', function() {

                $('#btn-store-theses').show();
                $('#btn-update-theses').hide();
                $('.modal-title').text('Thêm mới');
                emptyInput();
            });

            //handle store dispatch type
            $(document).on('click', '#btn-store-theses', function() {
                let data = $('#form-data-lecturer').serializeArray();
                resetClassInput('is-invalid');
                // console.log(data);
                $.ajax({
                    type: "post",
                    url: "{{ route('api.theses.store') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#modal-theses').modal('hide');
                        getData();
                        toastr["success"](response.message, "Thông báo");
                    },
                    error: function(response) {
                        $.each(response.responseJSON.errors, function(index,
                            value) {
                            $(`input[name=${index}]`).addClass(
                                'is-invalid');
                            $(`.error-${index}`).text(value[0]);
                        });
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

            //hanle submit form search
            $(document).on('submit', '#form-search', function(e) {
                e.preventDefault();
                let searchVal = $('#input-search').val();
                let student_school_year = $('#filter-student-school-year').val();
                $('input[name=hidden-search').val(searchVal);
                let data = {
                    'search': searchVal,
                };
                getAjax("{{ route('api.theses.filter') }}", data, data);
            });




            //handle button reset
            $(document).on('click', '#btn-reset', function(event) {
                event.preventDefault();
                window.location.href = "{{ route('theses') }}";
            })

        });
    </script>
@endpush
