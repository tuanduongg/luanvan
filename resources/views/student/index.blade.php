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
                                <th>Mã sinh viên</th>
                                <th>Họ Tên</th>
                                <th>Lớp</th>
                                <th>Niên khoá</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>19103100063</td>
                                <td>Dương Ngô Tuấn</td>
                                <td>DHTI13A1HN</td>
                                <td><span class="badge bg-label-primary me-1">K13</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
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
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-luanvan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Thêm mới sinh viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                    <div class="row g-2 mb-3">
                        <div class="col mb-0">
                            <label for="date" class="form-label">Mã sinh viên</label>
                            <input type="text" placeholder="Nhập mã..." id="date" class="form-control" placeholder="">
                        </div>
                        <div class="col mb-0">
                            <label for="date" class="form-label">Tên sinh viên</label>
                            <input type="text" placeholder="Nhập tên..." id="date" class="form-control">
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col mb-0">
                            <label for="selct-nienkhoa" class="form-label">Niên khoá</label>
                            <select id="selct-nienkhoa" class="form-select">
                                <option value="13">K13</option>
                                <option value="12">K12</option>
                                <option value="11">K11</option>
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="input-sv" class="form-label">Lớp</label>
                            <input type="text" name="" placeholder="Nhập lớp..." class="form-control" id="">
                        </div>
                    </div>
                </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
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
    </script>
@endpush
