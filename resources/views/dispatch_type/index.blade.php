@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="h1">
                Quản lý loại công văn
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-md-2 mb-2">
                                <input class="form-control" type="search" value="" placeholder="Tìm kiếm ..."
                                    id="input-search">
                            </div>

                            <div class="col-md-10 text-end">
                                <div class="btn btn-primary" data-bs-toggle="modal" id="btn-create-dispatch-type"
                                    data-bs-target="#modal-dispatch-type">Thêm mới
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive h-px-500">
                    <table class="table card-table " id="table-dispatch-type">
                        <thead>
                            <tr>
                                <th>Mã loại</th>
                                <th>Tên loại</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- data show here --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-dispatch-type" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kiểu công văn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="form-data-dispatch-type">
                        <div class="row g-2 mb-3">
                            <div class="col-12 mb-0">
                                <label for="input-type-code" class="form-label">Mã Loại</label>
                                <input type="text" name="type_code" class="form-control" placeholder="Nhập mã ..."
                                    id="input-type-code" class="form-control" required>
                                <input type="hidden" name="id">
                                <div class="invalid-feedback error-type_code">

                                </div>
                            </div>
                            <div class="col-12 mb-0">
                                <label for="input-type-name" class="form-label">Tên Loại</label>
                                <input type="text" name="type_name" id="input-type-name" placeholder="Nhập tên ..."
                                    id="date" class="form-control" required>
                                <div class="invalid-feedback error-type_name">

                                </div>
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label" for="bs-validation-server-email">Email</label>
                                <input type="text" id="bs-validation-server-email" class="form-control is-invalid"
                                    placeholder="john.doe" required />
                                <div class="invalid-feedback">
                                    Vui long dien email
                                </div>
                            </div> --}}
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" id="btn-store-dispatch-type" class="btn btn-primary">Tạo mới</button>
                    <button type="button" id="btn-update-dispatch-type" style="display: none;" class="btn btn-primary">Cập
                        nhật</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {


            //load all data from server to table
            function loadAllData() {
                $('#btn-update-dispatch-type').hide();
                $('#table-dispatch-type > tbody').empty();
                $.ajax({
                    type: "get",
                    url: "{{ route('api.dispatch-type.getAll') }}",
                    data: "json",
                    success: function(response) {
                        $.each(response.data, function(index, value) {
                            $('#table-dispatch-type > tbody').append(`
                            <tr>
                                <td><span class="badge bg-label-primary me-1">${value.type_code}</span></td>
                                <td>${value.type_name}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" id='btn-edit-dispatch-type'  data-bs-toggle="modal" data-bs-target="#modal-dispatch-type" data-id=${value.id} href="javascript:void(0);">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                Sửa
                                            </a>
                                            <a class="dropdown-item" id='btn-delete-dispatch-type' data-id=${value.id} href="javascript:void(0);">
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
            //     $("#table-dispatch-type > tbody > tr").filter(function() {
            //         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            //     });
            // });

            handleSearchTable("#input-search","#table-dispatch-type > tbody > tr");

            //handle edit dispatch type
            $(document).on('click', '#btn-edit-dispatch-type', function(e) {
                e.preventDefault();
                $('#btn-update-dispatch-type').show();
                $('#btn-store-dispatch-type').hide();
                $('input[name=type_code]').val('');
                $('input[name=type_name]').val('');
                $('input[name=type_code]').removeClass('is-invalid');
                $('input[name=type_name]').removeClass('is-invalid');
                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{ route('api.dispatch-type.find') }}",
                    data: {
                        "id": id
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        $('input[name=type_code]').val(response.data.type_code);
                        $('input[name=type_name]').val(response.data.type_name);
                        $('input[name=id]').val(id);
                        $('.modal-title').text('Chỉnh sửa thông tin');

                    },
                    error: function(response) {
                        console.error(response);
                    }
                });
            });
            //handle update dispatch type
            $(document).on('click', '#btn-update-dispatch-type', function() {
                let data = $('#form-data-dispatch-type').serializeArray();
                $('input[name=type_code]').removeClass('is-invalid');
                $('input[name=type_name]').removeClass('is-invalid');
                // console.log(data);
                $.ajax({
                    type: "put",
                    url: "{{ route('api.dispatch-type.update') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        let type_code = $('input[name=type_code]').val();
                        let type_name = $('input[name=type_name]').val();
                        $('#modal-dispatch-type').modal('hide');
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

            $(document).on('click', '#btn-create-dispatch-type', function() {

                $('#btn-store-dispatch-type').show();
                $('#btn-update-dispatch-type').hide();
                $('.modal-title').text('Thêm mới');
                $('input[name=type_code]').val('');
                $('input[name=type_name]').val('');
                $('input[name=type_code]').removeClass('is-invalid');
                $('input[name=type_name]').removeClass('is-invalid');
            });

            //handle store dispatch type
            $(document).on('click', '#btn-store-dispatch-type', function() {
                let data = $('#form-data-dispatch-type').serializeArray();
                $('input[name=type_code]').removeClass('is-invalid');
                $('input[name=type_name]').removeClass('is-invalid');
                // console.log(data);
                $.ajax({
                    type: "post",
                    url: "{{ route('api.dispatch-type.store') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        // switch (response.status_code) {
                        // case 400:
                        //     
                        //     break;
                        // case 200:
                        let type_code = $('input[name=type_code]').val();
                        let type_name = $('input[name=type_name]').val();
                        $('#modal-dispatch-type').modal('hide');
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
            $(document).on('click', '#btn-delete-dispatch-type', function(e) {
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
                            url: "{{ route('api.dispatch-type.distroy') }}",
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

        });
    </script>
@endpush
