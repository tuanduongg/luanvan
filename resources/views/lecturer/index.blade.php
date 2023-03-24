@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="h1">
                Thông tin giảng viên
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
                                <button class="btn btn-primary" type="button" id="btn-create-lecturer"
                                    data-bs-toggle="modal" data-bs-target="#modal-lecturer">
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
                        <table class="table card-table " id="table-lecturer">
                            <thead class="">
                                <tr>
                                    <th>Mã giảng viên</th>
                                    <th>Họ tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Chức vụ</th>
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
    <div class="modal fade" id="modal-lecturer" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="form-data-lecturer">
                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-6 mb-0">
                                <label for="input-code" class="form-label">Mã giảng viên</label>
                                <input type="text" placeholder="Nhập mã..." id="input-code" required name="code"
                                    class="form-control" placeholder="">
                                <div class="invalid-feedback error-code">

                                </div>
                            </div>
                            <input type="hidden" name="id">
                            <div class="col-12 col-md-6 mb-0">
                                <label for="input-name" class="form-label">Tên giảng viên</label>
                                <input type="text" placeholder="Nhập tên..." id="input-name" required name="name"
                                    class="form-control">

                                <div class="invalid-feedback error-name">

                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-6 mb-0">
                                <label for="input-email" class="form-label">Email</label>
                                <input type="text" placeholder="Nhập email..." id="input-email" required name="email"
                                    class="form-control" placeholder="">
                                <div class="invalid-feedback error-email">

                                </div>
                            </div>
                            <input type="hidden" name="id">
                            <div class="col-12 col-md-6 mb-0">
                                <label for="input-password" class="form-label">Mật khẩu</label>
                                <input type="text" placeholder="Nhập mật khẩu..." id="input-password" required
                                    name="password" class="form-control">
                                <div class="invalid-feedback error-password">

                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-6 mb-0">
                                <label for="input-phone" class="form-label">Số điện thoại</label>
                                <input type="text" name="phone" required placeholder="Nhập số điện thoại..."
                                    class="form-control" id="input-phone">
                                <div class="invalid-feedback error-phone">

                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-0">
                                <label for="select-nienkhoa" class="form-label">Chức vụ</label>
                                <select id="select-nienkhoa" required name="role" class="form-select">
                                    <option value="1">Trưởng khoa</option>
                                    <option value="2">Phó khoa</option>
                                    <option selected value="3">Giảng viên</option>
                                </select>
                                <div class="invalid-feedback error-student_school_year">

                                </div>
                            </div>

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" id="btn-store-lecturer" class="btn btn-primary">Lưu thay đổi</button>
                    <button type="button" id="btn-update-lecturer" style="display: none;" class="btn btn-primary">Cập
                        nhật</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function emptyInput() {
            $('input[name=code]').val('');
            $('input[name=name]').val('');
            $('input[name=phone]').val('');
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
            $('input[name=name]').removeClass(className);
            $('input[name=phone]').removeClass(className);
            $('select[name=role]').removeClass(className);
        }

        //hàm show data on view
        // 
        function showData(data, current_page, last_page, links) {
            $('#table-lecturer > tbody').empty(); // xoá dữ liệu trong tbody
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
                let roleName = '';
                //trưởng khoa : warning
                //phó khoa: info
                let classColor = 'secondary';
                switch (parseInt(value.role)) {
                    case 1:
                        roleName = 'Trưởng khoa';
                        classColor = 'warning';
                        break;
                    case 2:
                        roleName = 'Phó khoa';
                        classColor = 'info';
                        break;
                    case 3:
                        roleName = 'Giảng viên';
                        break;

                    default:
                        break;
                }
                $('#table-lecturer > tbody').append(`
                        <tr>
                            <td>${value.code}</td>
                            <td class="fw-bold">${value.name}</td>
                            <td>${value.phone}</td>
                            <td>${value.email}</td>
                            <td><span class="badge bg-label-${classColor} me-1 ">${roleName}</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" id='btn-edit-lecturer'  data-bs-toggle="modal" data-bs-target="#modal-lecturer" data-id=${value.id} href="javascript:void(0);">
                                            <i class="bx bx-edit-alt me-1"></i>
                                            Sửa
                                        </a>
                                        <a class="dropdown-item" id='btn-delete-lecturer' data-id=${value.id} href="javascript:void(0);">
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
                    $('#table-lecturer > tbody').empty();
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
            let url = "{{ route('api.lecturer.getAll') }}";
            let data = {
                'page': page,
            };
            // let oldFilter = '';
            console.log(filter);
            if (filter != '') {
                url = "{{ route('api.lecturer.filter') }}";
                data = {
                    "page": page,
                    'student_school_year': filter.student_school_year,
                    'search': filter.name,
                }
            }

            $('#btn-update-lecturer').hide();
            $('#table-lecturer > tbody').empty();
            getAjax(url, data);
        };
        $(document).ready(function() {


            //load all data from server to table
            getData();

            //handle edit dispatch type
            $(document).on('click', '#btn-edit-lecturer', function(e) {
                e.preventDefault();
                $('#btn-update-lecturer').show();
                $('#btn-store-lecturer').hide();
                emptyInput();

                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{ route('api.lecturer.find') }}",
                    data: {
                        "id": id
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        $('input[name=id]').val(id);
                        $('input[name=code]').val(response.data.code);
                        $('input[name=name]').val(response.data.name);
                        $('input[name=phone]').val(response.data.phone);
                        $('select[name=role]').val(response.data.role);
                        $('input[name=email]').val(response.data.email);
                        $('input[name=password]').val(response.data.password);
                        $('.modal-title').text('Chỉnh sửa thông tin');

                    },
                    error: function(response) {
                        console.error(response);
                    }
                });
            });
            //handle update dispatch type
            $(document).on('click', '#btn-update-lecturer', function() {
                let data = $('#form-data-lecturer').serializeArray();
                resetClassInput('is-invalid');
                $.ajax({
                    type: "put",
                    url: "{{ route('api.lecturer.update') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        $('#modal-lecturer').modal('hide');
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

            $(document).on('click', '#btn-create-lecturer', function() {

                $('#btn-store-lecturer').show();
                $('#btn-update-lecturer').hide();
                $('.modal-title').text('Thêm mới');
                emptyInput();
            });

            //handle store dispatch type
            $(document).on('click', '#btn-store-lecturer', function() {
                let data = $('#form-data-lecturer').serializeArray();
                resetClassInput('is-invalid');
                // console.log(data);
                $.ajax({
                    type: "post",
                    url: "{{ route('api.lecturer.store') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('#modal-lecturer').modal('hide');
                        getData();
                        toastr["success"](response.message, "Thông báo");
                    },
                    error: function(response) {
                        $.each(response.responseJSON.errors, function(index, value) {
                            $(`input[name=${index}]`).addClass('is-invalid');
                            $(`.error-${index}`).text(value[0]);
                        });
                    }
                });
            });

            //handle delete dispatch type
            $(document).on('click', '#btn-delete-lecturer', function(e) {
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
                            url: "{{ route('api.lecturer.distroy') }}",
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
            // $(document).on('submit', '#form-search', function(e) {
            //     e.preventDefault();
            //     let searchVal = $('#input-search').val();
            //     $('input[name=hidden-search').val(searchVal);
            //     let data = {
            //         'search': searchVal,
            //     };
            //     getAjax("{{ route('api.lecturer.filter') }}", data, data);
            // });

            $(document).on('focus', 'input,textarea', (e) => {
                $(e.target).removeClass('is-invalid');
            });
            
            var debounce = null;
            $('#input-search').on('input', function(e) {
                clearTimeout(debounce);
                debounce = setTimeout(function() {
                    e.preventDefault();
                    let searchVal = $('#input-search').val();
                    $('input[name=hidden-search').val(searchVal);
                    let data = {
                        
                        'search': searchVal,
                    };
                    getAjax("{{ route('api.lecturer.filter') }}", data);
                }, 1000);
            });



            //handle button reset
            $(document).on('click', '#btn-reset', function(event) {
                event.preventDefault();
                window.location.href = "{{ route('lecturer') }}";
            })

        });
    </script>
@endpush
