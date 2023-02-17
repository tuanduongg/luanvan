@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-6">
            <h3>Quản Lý Người Dùng</h3>
        </div>
    </div>
    <div class="row">
        <div class="card p-3">
            <div class="card-datatable table-responsive pt-0">
                <table id="table-user" class="datatables-basic table border-top">
                    <thead>
                        <tr>
                            {{-- <th></th> --}}
                            <th></th>
                            <th>id</th>
                            <th>Họ Tên</th>
                            <th>Email</th>
                            <th>Ngày Sinh</th>
                            <th>Lương</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            // var data = [
            //     [
            //         "Tiger Nixon",
            //         "abc",
            //         "System Architect",
            //         "Edinburgh",
            //         "5421",
            //         "2011/04/25",
            //         "$3,120",
            //         ''
            //     ],
            //     [
            //         "Tiger Nixon",
            //         "abc",
            //         "System Architect",
            //         "Edinburgh",
            //         "5421",
            //         "2011/04/25",
            //         "$3,120",
            //         ''
            //     ],
            //     [
            //         "Tiger Nixon",
            //         "abc",
            //         "System Architect",
            //         "Edinburgh",
            //         "5421",
            //         "2011/04/25",
            //         "$3,120",
            //         ''
            //     ],
            //     [
            //         "Tiger Nixon",
            //         "abc",
            //         "System Architect",
            //         "Edinburgh",
            //         "5421",
            //         "2011/04/25",
            //         "$3,120",
            //         ''
            //     ],
            //     [
            //         "Garrett Winters",
            //         "abc",
            //         "Director",
            //         "Edinburgh",
            //         "8422",
            //         "2011/07/25",
            //         "$5,300",
            //         ''
            //     ],

            // ]
            var assetsPath = "{{ asset('dist/img/avatars') }}";
            $(function() {
                'use strict';

                var dt_basic_table = $('.datatables-basic');

                // DataTable with buttons
                // --------------------------------------------------------------------

                if (dt_basic_table.length) {
                    var dt_basic = dt_basic_table.DataTable({
                        ajax: "{{ asset('dist/table-datatable.json') }}",
                        info: false,
                        language: {
                            search: "Tìm kiếm:",
                            emptyTable: "Không có bản ghi!",
                            paginate: {
                                first: "Đầu",
                                previous: "Trước",
                                next: "Tiếp",
                                last: "Cuối",
                            },
                        },
                        columns: [
                            {
                                data: 'id'
                            },
                            {
                                data: 'id'
                            },
                            {
                                data: 'full_name'
                            },
                            {
                                data: 'email'
                            },
                            {
                                data: 'start_date'
                            },
                            {
                                data: 'salary'
                            },
                            {
                                data: 'status'
                            },
                            {
                                data: ''
                            }
                        ],
                        columnDefs: [{
                                // For Responsive
                                className: 'control',
                                orderable: false,
                                responsivePriority: 2,
                                searchable: false,
                                targets: 0,
                                render: function(data, type, full, meta) {
                                    return '';
                                }
                            },
                            {
                                targets: 2,
                                searchable: false,
                                visible: true
                            },
                            {
                                // Avatar image/badge, Name and post
                                targets: 3,
                                responsivePriority: 4,
                                render: function(data, type, full, meta) {
                                    var $user_img = full['avatar'],
                                        $name = full['full_name'],
                                        $post = full['post'];
                                    if ($user_img) {
                                        // For Avatar image
                                        var $output =
                                            '<img src="' + assetsPath + '/' +
                                            $user_img +
                                            '" alt="Avatar" class="rounded-circle">';
                                    } else {
                                        // For Avatar badge
                                        var stateNum = Math.floor(Math.random() * 6);
                                        var states = ['success', 'danger', 'warning',
                                            'info', 'dark', 'primary', 'secondary'
                                        ];
                                        var $state = states[stateNum],
                                            $name = full['full_name'],
                                            $initials = $name.match(/\b\w/g) || [];
                                        $initials = (($initials.shift() || '') + ($initials
                                            .pop() || '')).toUpperCase();
                                        $output =
                                            '<span class="avatar-initial rounded-circle bg-label-' +
                                            $state + '">' + $initials + '</span>';
                                    }
                                    // Creates full output for row
                                    var $row_output =
                                        '<div class="d-flex justify-content-start align-items-center">' +
                                        '<div class="avatar-wrapper">' +
                                        '<div class="avatar me-2">' +
                                        $output +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="d-flex flex-column">' +
                                        '<span class="emp_name text-truncate">' +
                                        $name +
                                        '</span>' +
                                        '<small class="emp_post text-truncate text-muted">' +
                                        $post +
                                        '</small>' +
                                        '</div>' +
                                        '</div>';
                                    return $row_output;
                                }
                            },
                            {
                                responsivePriority: 1,
                                targets: 4
                            },
                            {
                                // Label
                                targets: -2,
                                render: function(data, type, full, meta) {
                                    var $status_number = full['status'];
                                    var $status = {
                                        1: {
                                            title: 'Current',
                                            class: 'bg-label-primary'
                                        },
                                        2: {
                                            title: 'Professional',
                                            class: ' bg-label-success'
                                        },
                                        3: {
                                            title: 'Rejected',
                                            class: ' bg-label-danger'
                                        },
                                        4: {
                                            title: 'Resigned',
                                            class: ' bg-label-warning'
                                        },
                                        5: {
                                            title: 'Applied',
                                            class: ' bg-label-info'
                                        }
                                    };
                                    if (typeof $status[$status_number] === 'undefined') {
                                        return data;
                                    }
                                    return (
                                        '<span class="badge rounded-pill ' +
                                        $status[$status_number].class +
                                        '">' +
                                        $status[$status_number].title +
                                        '</span>'
                                    );
                                }
                            },
                            {
                                // Actions
                                targets: -1,
                                title: 'Hành Động',
                                orderable: false,
                                searchable: false,
                                render: function(data, type, full, meta) {
                                    return (
                                        '<div class="d-inline-block">' +
                                        '<a href="javascript:;" class="btn btn-sm text-primary btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>' +
                                        '<ul class="dropdown-menu dropdown-menu-end">' +
                                        '<li><a href="javascript:;" class="dropdown-item">Xem chi tiết</a></li>' +
                                        '<div class="dropdown-divider"></div>' +
                                        '<li><a href="javascript:;" class="dropdown-item text-danger delete-record">Xoá</a></li>' +
                                        '</ul>' +
                                        '</div>' +
                                        '<a href="javascript:;" class="btn btn-sm text-primary btn-icon item-edit"><i class="bx bxs-edit"></i></a>'
                                    );
                                }
                            }
                        ],
                        order: [
                            [2, 'desc']
                        ],
                        dom: '<"card-header"<"head-label text-center"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                        displayLength: 7,
                        lengthMenu: [7, 10, 25, 50, 75, 100],
                        buttons: [{
                                extend: 'collection',
                                className: 'btn btn-label-primary dropdown-toggle me-2',
                                text: '<i class="bx bx-show me-1"></i>Xuất dữ liệu',
                                buttons: [{
                                        extend: 'print',
                                        text: '<i class="bx bx-printer me-1" ></i>Print',
                                        className: 'dropdown-item',
                                        exportOptions: {
                                            columns: [3, 4, 5, 6, 7]
                                        }
                                    },
                                    {
                                        extend: 'csv',
                                        text: '<i class="bx bx-file me-1" ></i>Csv',
                                        className: 'dropdown-item',
                                        exportOptions: {
                                            columns: [3, 4, 5, 6, 7]
                                        }
                                    },
                                    {
                                        extend: 'excel',
                                        text: 'Excel',
                                        className: 'dropdown-item',
                                        exportOptions: {
                                            columns: [3, 4, 5, 6, 7]
                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        text: '<i class="bx bxs-file-pdf me-1"></i>Pdf',
                                        className: 'dropdown-item',
                                        exportOptions: {
                                            columns: [3, 4, 5, 6, 7]
                                        }
                                    },
                                    {
                                        extend: 'copy',
                                        text: '<i class="bx bx-copy me-1" ></i>Copy',
                                        className: 'dropdown-item',
                                        exportOptions: {
                                            columns: [3, 4, 5, 6, 7]
                                        }
                                    }
                                ]
                            },
                            {
                                text: '<i class="bx bx-plus me-1"></i> <span class="d-none d-lg-inline-block">Thêm mới</span>',
                                className: 'create-new btn btn-primary'
                            }
                        ],
                        responsive: {
                            details: {
                                display: $.fn.dataTable.Responsive.display.modal({
                                    header: function(row) {
                                        var data = row.data();
                                        return 'Details of ' + data['full_name'];
                                    }
                                }),
                                type: 'column',
                                renderer: function(api, rowIdx, columns) {
                                    var data = $.map(columns, function(col, i) {
                                        return col.title !==
                                            '' // ? Do not show row in modal popup if title is blank (for check box)
                                            ?
                                            '<tr data-dt-row="' +
                                            col.rowIndex +
                                            '" data-dt-column="' +
                                            col.columnIndex +
                                            '">' +
                                            '<td>' +
                                            col.title +
                                            ':' +
                                            '</td> ' +
                                            '<td>' +
                                            col.data +
                                            '</td>' +
                                            '</tr>' :
                                            '';
                                    }).join('');

                                    return data ? $('<table class="table"/><tbody />').append(
                                        data) : false;
                                }
                            }
                        }
                    });
                }
            });


        });
    </script>
@endpush
