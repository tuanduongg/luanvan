@extends('layout.master')

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
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-luanvan" tabindex="-1" aria-hidden="true">
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
                            <label for="name" class="form-label">Tên đề tài</label>
                            <textarea class="form-control" placeholder="Nhập tên đề tài" id="name" rows="1"></textarea>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col mb-0">
                            <label for="date" class="form-label">Ngày bắt đầu</label>
                            <input type="date" id="date" class="form-control" placeholder="">
                        </div>
                        <div class="col mb-0">
                            <label for="date" class="form-label">Ngày kết thúc</label>
                            <input type="date" id="date" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="input-mgv" class="form-label">Mã giảng viên</label>
                            <input type="text" id="input-mgv" class="form-control" placeholder="Nhập mã giảng viên">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col mb-3">
                            <label for="input-msv" class="form-label">Sinh viên</label>
                            <select id="input-msv" multiple="multiple" class="form-select">
                                <option value="1">19103100063</option>
                                <option value="2">19103100064</option>
                            </select>
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
                            <label for="input-sv" class="form-label">Vị trí lưu trữ</label>
                            <input type="text" name="" placeholder="Nhập vị trí lưu trữ" class="form-control" id="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">File</label>
                                <input class="form-control" type="file" id="formFile">
                              </div>
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
