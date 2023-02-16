@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-6">
            <h3>Quản Lý Người Dùng</h3>
        </div>
    </div>
    <table id="table-user" class="table table-hover table-light">
        <thead>
            <tr>
                <td>Mã</td>
                <td>Username</td>
                <td>Họ Tên</td>
                <td>Giới Tính</td>
                <td>Năm Sinh</td>
                <td>Salary</td>
                <td>Hành Động</td>
            </tr>
        </thead>
        <tbody>
            {{-- <tr>
                <td>1</td>
                <td>Nguyễn Văn Anh</td>
                <td>Nam</td>
                <td>23-2-1999</td>
                <td colspan="2">
                    <button class="btn btn-primary">Sửa</button>
                    <button class="btn btn-warning">Xóa</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Nguyễn Thị Hoa</td>
                <td>Nữ</td>
                <td>23-2-1999</td>
                <td colspan="2">
                    <button class="btn btn-primary">Sửa</button>
                    <button class="btn btn-warning">Xóa</button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Nguyễn Tú Anh</td>
                <td>Nam</td>
                <td>23-2-1999</td>
                <td colspan="2">
                    <button class="btn btn-primary">Sửa</button>
                    <button class="btn btn-warning">Xóa</button>
                </td>
            </tr> --}}
        </tbody>
    </table>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            var data = [
                [
                    "Tiger Nixon",
                    "abc",
                    "System Architect",
                    "Edinburgh",
                    "5421",
                    "2011/04/25",
                    "$3,120"
                ],
                [
                    "Tiger Nixon",
                    "abc",
                    "System Architect",
                    "Edinburgh",
                    "5421",
                    "2011/04/25",
                    "$3,120"
                ],
                [
                    "Tiger Nixon",
                    "abc",
                    "System Architect",
                    "Edinburgh",
                    "5421",
                    "2011/04/25",
                    "$3,120"
                ],
                [
                    "Tiger Nixon",
                    "abc",
                    "System Architect",
                    "Edinburgh",
                    "5421",
                    "2011/04/25",
                    "$3,120"
                ],
                [
                    "Garrett Winters",
                    "abc",
                    "Director",
                    "Edinburgh",
                    "8422",
                    "2011/07/25",
                    "$5,300"
                ]
            ]
            $('#table-user').DataTable({
                dom: 'Bfrtip',
                paging: true,
                responsive: true,
                processing: true,
                info: false,
                scrollY: 300,
                data: data,
                select: true,
                fixedHeader: true,
                fixedColumns: {
                    left: 1,
                    right: 1
                },
                loadingRecords: "Đang tải...",
                zeroRecords: "Không tìm thấy bản ghi!",
                language: {
                    search: "Tìm kiếm:",
                    emptyTable: "Không có bản ghi!",
                    paginate: {
                        first: "Đầu",
                        previous: "Trước",
                        next: "Tiếp",
                        last: "Cuối"
                    },
                },
                buttons: [{
                    buttons: [
                        'copy', 'excel', 'pdf'
                    ]
                }]

            });

        });
    </script>
@endpush
