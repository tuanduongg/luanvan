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
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <input class="form-control" type="search" value="" placeholder="Tìm kiếm ..."
                                    id="input-search">
                            </div>
                            <div class="col-md-2 mb-2">
                                <select class="form-select " id="filter-school-year">
                                    <option value="-1">Niên Khoá</option>
                                    <option value="13">K13</option>
                                    <option value="12">K12</option>
                                    <option value="11">K11</option>
                                    <option value="10">K10</option>
                                </select>
                            </div>
                            <div class="col-md-6 text-end">
                                <div class="btn btn-primary" id="btn-create-student" data-bs-toggle="modal"
                                    data-bs-target="#modal-student">Thêm mới
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive h-px-500">
                    <table class="table card-table " id="table-student">
                        <thead>
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
                            <div class="col mb-0">
                                <label for="input-student-code" class="form-label">Mã sinh viên</label>
                                <input type="text" placeholder="Nhập mã..." id="input-student-code" required
                                    name="student_code" class="form-control" placeholder="">
                                <div class="invalid-feedback error-student_code">

                                </div>
                            </div>
                            <input type="hidden" name="id">
                            <div class="col mb-0">
                                <label for="input-student-name" class="form-label">Tên sinh viên</label>
                                <input type="text" placeholder="Nhập tên..." id="input-student-name" required
                                    name="student_name" class="form-control">

                                <div class="invalid-feedback error-student_name">

                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="select-nienkhoa" class="form-label">Niên khoá</label>
                                <select id="select-nienkhoa" required name="student_school_year" class="form-select">
                                    <option value="13">K13</option>
                                    <option value="12">K12</option>
                                    <option value="11">K11</option>
                                </select>
                                <div class="invalid-feedback error-student_school_year">

                                </div>
                            </div>
                            <div class="col mb-0">
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
    {{-- <script>
        $(document).ready(function() {
            let config = {
                placeholder: "Nhập mã sinh viên....",
                allowClear: true,
                tags: false,
                width: '100%',
                tags: true,
            }
            $('#input-msv').select2(config);
        });
        
    </script> --}}
    <script>
        $(document).ready(function() {


            //load all data from server to table
            function loadAllData() {
                $('#btn-update-student').hide();
                $('#table-student > tbody').empty();
                $.ajax({
                    type: "get",
                    url: "{{ route('api.student.getAll') }}",
                    data: "json",
                    success: function(response) {
                        $.each(response.data, function(index, value) {
                            // console.log(value);
                            $('#table-student > tbody').append(`
                            <tr>
                                <td>${value.student_code}</td>
                                <td>${value.student_name}</td>
                                <td>${value.student_class}</td>
                                <td><span class="badge bg-label-primary me-1">${value.student_school_year}</span></td>
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
                            </tr>
                            `);
                        });
                    },
                    error: function(response) {
                        console.error(response);
                    }
                });
            };
            loadAllData();

            //handle search
            // $("#input-search").on("keyup", function() {
            //     var value = $(this).val().toLowerCase();
            //     $("#table-student > tbody > tr").filter(function() {
            //         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            //     });
            // });

            handleSearchTable("#input-search", "#table-student > tbody > tr");

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
                        console.log(response);
                        // $('input[name=type_code]').val(response.data.type_code);
                        // $('input[name=type_name]').val(response.data.type_name);

                        $('input[name=id]').val(id);
                        $('input[name=student_code]').val(response.data.student_code);
                        $('input[name=student_name]').val(response.data.student_name);
                        $('input[name=student_class]').val(response.data.student_class);
                        $('select[name=student_school_year]').val(response.data.student_school_year);
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
                        loadAllData();
                        toastr["success"](response.message, "Thông báo");
                        // break;
                        // switch (response.status_code) {
                        //     case 400:

                        //         break;
                        //     case 200:

                        //     default:
                        //         break;
                        // }
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
                        // switch (response.status_code) {
                        // case 400:
                        //     
                        //     break;
                        // case 200:
                        // let type_code = $('input[name=type_code]').val();
                        // let type_name = $('input[name=type_name]').val();
                        $('#modal-student').modal('hide');
                        loadAllData();
                        toastr["success"](response.message, "Thông báo");
                        //     break;

                        // default:
                        //     break;
                        // }
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
                                console.log(response);
                                // switch (response.status_code) {
                                //     case 400:
                                //         alert('lỗi truy vấn');
                                //     case 200:
                                Swal.fire(
                                    'Thông Báo!',
                                    response.message,
                                    'success'
                                )
                                loadAllData();
                                //         break;

                                //     default:
                                //         break;
                                // }
                            },
                            error: function(response) {
                                console.error(response);
                            }
                        });

                    }
                })

            });

            $(document).on('change', '#filter-school-year', function() {
                let student_school_year = $(this).val();

                if (student_school_year == -1) {
                    student_school_year = '';
                }
                $.ajax({
                    type: "get",
                    url: "{{ route('api.student.filter') }}",
                    data: {
                        'student_school_year': student_school_year
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#table-student > tbody').empty();
                        if (response.data.length == 0) {
                            toastr["success"]('Không có dữ liệu !', "Thông báo");
                            return;
                        }
                        $.each(response.data, function(index, value) {
                            // console.log(value);
                            $('#table-student > tbody').append(`
                                <tr>
                                    <td>${value.student_code}</td>
                                    <td>${value.student_name}</td>
                                    <td>${value.student_class}</td>
                                    <td><span class="badge bg-label-primary me-1">${value.student_school_year}</span></td>
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
                                </tr>
                            `)
                        });
                    },
                    error: function(response) {
                        console.error(response);
                    }
                });
            });

        });
    </script>
@endpush
