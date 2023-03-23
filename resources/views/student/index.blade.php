@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="h1">
                Quản lý thông tin sinh viên
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
                            <div class="col-md-2 mb-2">
                                <select class="form-select " id="filter-student-school-year">
                                    <option value="-1">Niên Khoá</option>
                                    <option value="16">K16</option>
                                    <option value="15">K15</option>
                                    <option value="14">K14</option>
                                    <option value="13">K13</option>
                                    <option value="12">K12</option>
                                    <option value="11">K11</option>
                                    <option value="10">K10</option>
                                    <option value="9">K9</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <button class="btn btn-outline-secondary" id="btn-reset" type="button">
                                    <span class="tf-icons bx bx-refresh me-1"></span>
                                    Làm mới
                                </button>
                            </div>
                            <div class="col-md-5 text-end">
                                <button class="btn btn-primary" type="button" id="btn-create-student"
                                    data-bs-toggle="modal" data-bs-target="#modal-student">
                                    <span class="tf-icons bx bx-plus-circle me-1"></span>
                                    Thêm mới
                                    {{-- Thêm mới --}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- </div> --}}
                <div class="card-content">
                    <div class="table-responsive h-px-500">
                        <table class="table card-table " id="table-student">
                            <thead class="">
                                <tr>
                                    <th>Mã sinh viên</th>
                                    <th>Họ Tên</th>
                                    <th>Lớp</th>
                                    <th>Niên khoá</th>
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
                    <input type="hidden" name="hidden-student_school_year">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center ">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-student" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm mới sinh viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="form-data-student">
                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-6 mb-0">
                                <label for="input-student-code" class="form-label">Mã sinh viên</label>
                                <input type="text" placeholder="Nhập mã..." id="input-student-code" required
                                    name="student_code" class="form-control" placeholder="">
                                <div class="invalid-feedback error-student_code">

                                </div>
                            </div>
                            <input type="hidden" name="id">
                            <div class="col-12 col-md-6 mb-0">
                                <label for="input-student-name" class="form-label">Tên sinh viên</label>
                                <input type="text" placeholder="Nhập tên..." id="input-student-name" required
                                    name="student_name" class="form-control">

                                <div class="invalid-feedback error-student_name">

                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-6 mb-0">
                                <label for="select-nienkhoa" class="form-label">Niên khoá</label>
                                <select id="select-nienkhoa" required name="student_school_year" class="form-select">
                                    <option value="16">K16</option>
                                    <option value="15">K15</option>
                                    <option value="14">K14</option>
                                    <option value="13">K13</option>
                                    <option value="12">K12</option>
                                    <option value="11">K11</option>
                                    <option value="10">K10</option>
                                </select>
                                <div class="invalid-feedback error-student_school_year">

                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-0">
                                <label for="input-student-class" class="form-label">Lớp</label>
                                <input type="text" name="student_class" required placeholder="Nhập lớp..."
                                    class="form-control" id="input-student-class">
                                <div class="invalid-feedback error-student_class">

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" id="btn-store-student" class="btn btn-primary">Lưu thay đổi</button>
                    <button type="button" id="btn-update-student" style="display: none;" class="btn btn-primary">Cập
                        nhật</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        //hàm show data on view
        // 
        function showData(data, current_page, last_page, links) {
            $('#table-student > tbody').empty(); // xoá dữ liệu trong tbody
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
                $('#table-student > tbody').append(`
                        <tr>
                            <td>${value.student_code}</td>
                            <td class="fw-bold">${value.student_name}</td>
                            <td>${value.student_class}</td>
                            <td><span class="badge bg-label-primary me-1  ">${value.student_school_year}</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" id='btn-edit-student'  data-bs-toggle="modal" data-bs-target="#modal-student" data-id=${value.id} href="javascript:void(0);">
                                            <i class="bx bx-edit-alt me-1"></i>
                                            Sửa
                                        </a>
                                        <a class="dropdown-item" id='btn-delete-student' data-id=${value.id} href="javascript:void(0);">
                                            <i class="bx bx-trash me-1"></i>
                                            Xoá
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>`);
            });
        }

        function handleClickPanigate(currentPage, lastPage) {
            event.preventDefault();
            if (currentPage >= 1 && currentPage <= lastPage) {
                let filter = {
                    "student_school_year": $('input[name=hidden-student_school_year').val(),
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
                    $('#table-student > tbody').empty();
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
            let url = "{{ route('api.student.getAll') }}";
            let data = {
                'page': page,
            };
            if (filter != '') {
                url = "{{ route('api.student.filter') }}";
                data = {
                    "page": page,
                    'student_school_year': filter.student_school_year,
                    'search': filter.name,
                }
            }

            $('#btn-update-student').hide();
            $('#table-student > tbody').empty();
            getAjax(url, data);
        };
        $(document).ready(function() {


            //load all data from server to table
            getData();

            //handle edit dispatch type
            $(document).on('click', '#btn-edit-student', function(e) {
                e.preventDefault();
                $('#btn-update-student').show();
                $('#btn-store-student').hide();

                $('input[name=student_code]').val('');
                $('input[name=student_name]').val('');
                $('input[name=student_class]').val('');
                $('select[name=student_school_year]').val('');
                $("select[name=student_school_year]").prop("selectedIndex", 0);

                $('input[name=student_code]').removeClass('is-invalid');
                $('input[name=student_name]').removeClass('is-invalid');
                $('input[name=student_class]').removeClass('is-invalid');
                $('select[name=student_school_year]').removeClass('is-invalid');
                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{ route('api.student.find') }}",
                    data: {
                        "id": id
                    },
                    dataType: 'json',
                    success: function(response) {
                        // $('input[name=type_code]').val(response.data.type_code);
                        // $('input[name=type_name]').val(response.data.type_name);

                        $('input[name=id]').val(id);
                        $('input[name=student_code]').val(response.data.student_code);
                        $('input[name=student_name]').val(response.data.student_name);
                        $('input[name=student_class]').val(response.data.student_class);
                        $('select[name=student_school_year]').val(response.data
                            .student_school_year);
                        $('.modal-title').text('Chỉnh sửa thông tin');

                    },
                    error: function(response) {
                        console.error(response);
                    }
                });
            });
            //handle update dispatch type
            $(document).on('click', '#btn-update-student', function() {
                let data = $('#form-data-student').serializeArray();
                $('input[name=student_code]').removeClass('is-invalid');
                $('input[name=student_name]').removeClass('is-invalid');
                $('input[name=student_class]').removeClass('is-invalid');
                $('select[name=student_school_year]').removeClass('is-invalid');
                // console.log(data);
                $.ajax({
                    type: "put",
                    url: "{{ route('api.student.update') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // let type_code = $('input[name=type_code]').val();
                        // let type_name = $('input[name=type_name]').val();
                        $('#modal-student').modal('hide');
                        getData();
                        toastr["success"](response.message, "Thông báo");
                    },
                    error: function(response) {
                        console.error(response);
                        // $('input[name=type_code]').addClass('is-invalid');
                        $.each(response.responseJSON.errors, function(index, value) {
                            $(`input[name=${index}]`).addClass('is-invalid');
                            $(`.error-${index}`).text(value[0]);
                        });
                    }
                });
            });
            //handle create dispatch type

            $(document).on('click', '#btn-create-student', function() {

                $('#btn-store-student').show();
                $('#btn-update-student').hide();
                $('.modal-title').text('Thêm mới');

                $('input[name=student_code]').val('');
                $('input[name=student_name]').val('');
                $('input[name=student_class]').val('');
                $('select[name=student_school_year]').val('');
                $("select[name=student_school_year]").prop("selectedIndex", 0);

                $('input[name=student_code]').removeClass('is-invalid');
                $('input[name=student_name]').removeClass('is-invalid');
                $('input[name=student_class]').removeClass('is-invalid');
                $('select[name=student_school_year]').removeClass('is-invalid');
            });

            //handle store dispatch type
            $(document).on('click', '#btn-store-student', function() {
                let data = $('#form-data-student').serializeArray();
                $('input[name=type_code]').removeClass('is-invalid');
                $('input[name=type_name]').removeClass('is-invalid');
                // console.log(data);
                $.ajax({
                    type: "post",
                    url: "{{ route('api.student.store') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#modal-student').modal('hide');
                        getData();
                        toastr["success"](response.message, "Thông báo");
                    },
                    error: function(response) {
                        console.error(response);
                        // $('input[name=type_code]').addClass('is-invalid');
                        $.each(response.responseJSON.errors, function(index, value) {
                            // console.log(index);
                            $(`input[name=${index}]`).addClass('is-invalid');
                            $(`.error-${index}`).text(value[0]);
                        });
                    }
                });
            });

            //handle delete dispatch type
            $(document).on('click', '#btn-delete-student', function(e) {
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
                            url: "{{ route('api.student.distroy') }}",
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
                    let student_school_year = $('#filter-student-school-year').val();
                    $('input[name=hidden-search').val(searchVal);
                    $('input[name=hidden-student_school_year').val(student_school_year);
                    let data = {
                        'student_school_year': student_school_year,
                        'search': searchVal,
                    };
                    getAjax("{{ route('api.student.filter') }}", data);
                }, 1000);
            });

            $(document).on('change', '#filter-student-school-year', function(e) {
                let searchVal = $('#input-search').val();
                $('input[name=hidden-search').val(searchVal);
                $('input[name=hidden-student_school_year').val(e.target.value);
                let data = {
                    'student_school_year': e.target.value,
                    'search': searchVal,
                };
                getAjax("{{ route('api.student.filter') }}", data);
            });

            // $(document).on('submit', '#form-search', function(e) {
            //     e.preventDefault();
            //     let searchVal = $('#input-search').val();
            //     let student_school_year = $('#filter-student-school-year').val();
            //     $('input[name=hidden-search').val(searchVal);
            //     $('input[name=hidden-student_school_year').val(student_school_year);
            //     let data = {
            //         'student_school_year': student_school_year,
            //         'search': searchVal,
            //     };
            //     getAjax("{{ route('api.student.filter') }}", data, data);
            // });

            // //handle filter student_school_year
            // $(document).on('change', '#filter-student-school-year', function() {
            //     $('#form-search').submit();
            // });

            //hanle submit form search


            //handle button reset
            $(document).on('click', '#btn-reset', function(event) {
                event.preventDefault();
                window.location.href = "/sinh-vien";
            })

        });
    </script>
@endpush
