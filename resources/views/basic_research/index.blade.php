@extends('layout.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('dist/css/tagify.css') }}" />
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="h1">
                Nghiên cứu khoa học giảng viên
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
                                <select class="form-select " id="filter-year">
                                    <option value="-1">Năm thực hiện</option>
                                    @for ($i = (int) date('Y'); $i >= 2010; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <button class="btn btn-outline-secondary" id="btn-reset" type="button">
                                    <span class="tf-icons bx bx-refresh me-1"></span>
                                    Làm mới
                                </button>
                            </div>
                            <div class="col-md-5 text-end">
                                <button class="btn btn-primary" type="button" id="btn-create" data-bs-toggle="modal"
                                    data-bs-target="#modal-basic-research">
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
                        <table class="table card-table " id="table-data">
                            <thead class="">
                                <tr>
                                    <th>Tên đề tài</th>
                                    <th>Tóm tắt nội dung</th>
                                    <th>Năm thực hiện</th>
                                    <th>Kết quả</th>
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
                    <input type="hidden" name="hidden-year">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center ">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-basic-research" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Thêm mới</h5>
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
                                <label for="content" class="form-label">Tóm tắt nội dung</label>
                                <textarea class="form-control" name="content" placeholder="Nhập tóm tắt nội dung" id="input-content" rows="3"></textarea>
                                <div class="invalid-feedback error-content">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="input-leader_id" class="form-label">Mã trưởng nhóm</label>
                                <input type="text" name="leader_id" id="input-leader_id" class="form-control"
                                    placeholder="Nhập mã trưởng nhóm">
                                <div class="invalid-feedback error-leader_id"></div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="mb-3">
                                <label for="input-lecturer_id" class="form-label d-block">Thành viên</label>
                                <input id="input-lecturer_id" required class="tagify-email-list" name="lecturer_id"
                                    value="">
                                <button type="button" id="btn-add-input-mgv"
                                    class="btn btn-outline-primary btn-icon rounded-pill"><span
                                        class="tf-icons bx bx-plus"></span></button>
                            </div>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="year" class="form-label">Năm thực hiện</label>
                                <select id="input-year" name="year" class="form-select">
                                    @for ($i = (int) date('Y'); $i >= 2010; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <div class="invalid-feedback error-year">

                                </div>
                            </div>
                            <div class="col mb-0">
                                <label for="input-result" class="form-label">Kết quả</label>
                                <input type="text" id="input-result" name="result"
                                    placeholder="Nhập kết quả đạt được" class="form-control" id="">
                                <div class="invalid-feedback error-result">

                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id">

                        <div class="row row g-2 mb-3">
                            <div class="col">
                                <label for="input-archivist" class="form-label">Người lưu trữ</label>
                                <input class="form-control" name="archivist" type="text" placeholder="Người lưu trữ"
                                    id="input-archivist">
                                <div class="invalid-feedback error-archivist"></div>
                            </div>
                            <div class="col mb-0">
                                <label for="storage_location" class="form-label">Vị trí lưu trữ</label>
                                <input type="text" id="input-storage_location" name="storage_location"
                                    placeholder="Nhập vị trí lưu trữ" class="form-control" id="">
                                <div class="invalid-feedback error-storage_location">

                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col">
                                <label for="file" class="form-label">File</label>
                                <input class="form-control" type="file" name="file" id="input-file">
                                <div class="invalid-feedback error-file"></div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" id="btn-store" class="btn btn-primary">Lưu thay đổi</button>
                    <button type="button" id="btn-update" style="display: none;" class="btn btn-primary">Cập
                        nhật</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('dist/js/tagify.js') }}"></script>
    <script>
        function handleClickPanigate(currentPage, lastPage) {
            event.preventDefault();
            if (currentPage >= 1 && currentPage <= lastPage) {
                let filter = {
                    "year": $('input[name=hidden-year').val(),
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
                    $('#table-data > tbody').empty();
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
            let url = "{{ route('api.basicresearch.getAll') }}";
            let data = {
                'page': page,
            };
            // let oldFilter = '';
            if (filter != '') {
                url = "{{ route('api.basicresearch.filter') }}";
                data = {
                    "page": page,
                    'year': filter.year,
                    'search': filter.name,
                }
            }

            $('#btn-update').hide();
            $('#table-data > tbody').empty();
            getAjax(url, data);
        };

        function showData(data, current_page, last_page, links) {
            $('#table-data > tbody').empty(); // xoá dữ liệu trong tbody
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

            $.each(data, function(index, value) {
                let urlView = "{{ route('studentresearch.view', 'id') }}";
                urlView = urlView.replace('id', value.id);
                $('#table-data > tbody').append(`
                        <tr>
                            <td class="fw-bold">${value.tittle.length > 100 ? value.tittle.substring(0,100) + '...' : value.tittle}</td>
                            <td>${value.content.length > 100 ? value.content.substring(0,100) + '...' : value.content}</td>
                            <td><span class="badge bg-label-secondary me-1 ">${value.year}</span></td>
                            <td>${value.result}</td>
                            <td>${value.storage_location}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="${urlView}">
                                                <i class="bx bx-detail me-1"></i>
                                                Xem chi tiết
                                            </a>
                                            <a class="dropdown-item" id='btn-edit' data-bs-toggle="modal" data-bs-target="#modal-basic-research" data-id=${value.id} href="javascript:void(0);">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                Sửa
                                            </a>
                                            <a class="dropdown-item" id='btn-delete' data-id=${value.id} href="javascript:void(0);">
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

            var whitelists = [];



            const TagifyStudentListEl = document.querySelector("#input-lecturer_id");
            const TagifyStudentList = new Tagify(TagifyStudentListEl, {
                // email address validation (https://stackoverflow.com/a/46181/104380)
                // pattern: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                texts: {
                    empty: "Không được để trống",
                    exceed: "Tối đa 5 sinh viên",
                    pattern: "Không đúng định dạng",
                    duplicate: "Đã tồn tại dữ liệu",
                },
                whitelist: whitelists,
                maxTags: 5,
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
            const button = TagifyStudentListEl.nextElementSibling; // "add new tag" action-button

            button.addEventListener("click", onAddButtonClick);

            function onAddButtonClick(e) {

                let inputVal = $('#input-lecturer_id').val();
                // if (inputVal) {

                if (inputVal == '') {

                    TagifyStudentList.addEmptyTag();
                    return;
                } else {
                    if (JSON.parse(inputVal).length < 5) { //litmit add tags = 5
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
            let temp = false;
            $(document).on('click', '#btn-add-input-mgv', () => {
                if (couter != true) {
                    let data = [];
                    if (!temp) {
                        $.ajax({
                            type: "get",
                            url: "{{ route('api.lecturer.select2') }}",
                            dataType: "json",
                            success: function(response) {
                                response.data.forEach(element => {
                                    data.push(element.code +
                                        `(${element.name})`)
                                });
                                TagifyStudentList.settings.whitelist = data;
                                temp = true;
                            }
                        });
                    }
                }
                couter = true;
                // return data;
            });


            function emptyInput() {
                $('textarea[name=tittle]').val('');
                $('textarea[name=content]').val('');
                $('input[name=student_id]').val('');
                $('input[name=lecturer_id]').val('');
                $('input[name=leader_id]').val('');
                $('input[name=archivist]').val('');
                $('input[name=result]').val('');
                $('input[name=storage_location]').val('');
                resetClassInput('is-invalid');

            }

            //remove validate onfocus input
            $(document).on('focus', 'input,textarea', (e) => {
                $(e.target).removeClass('is-invalid');
            });

            function resetClassInput(className) {
                $('textarea[name=tittle]').removeClass(className);
                $('textarea[name=content]').removeClass(className);
                $('input[name=student_id]').removeClass(className);
                $('input[name=lecturer_id]').removeClass(className);
                $('input[name=archivist]').removeClass(className);
                $('input[name=result]').removeClass(className);
                $('input[name=leader_id]').removeClass(className);
                $('input[name=storage_location]').removeClass(className);
            }

            //load all data from server to table
            getData();

            //handle edit dispatch type
            $(document).on('click', '#btn-edit', function(e) {
                e.preventDefault();
                $('#btn-update').show();
                $('#btn-store').hide();
                emptyInput();

                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{ route('api.basicresearch.find') }}",
                    data: {
                        "id": id
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('input[name=leader_id]').val(response.data.leader_id);
                        $('input[name=id]').val(id);
                        $('textarea[name=tittle]').val(response.data.tittle);
                        $('textarea[name=content]').val(response.data.content);
                        $('input[name=storage_location]').val(response.data.storage_location);
                        $('input[name=result]').val(response.data.result);

                        if (response.data.lecturers.length > 0) {
                            let result = '';
                            response.data.lecturers.forEach((element, index) => {
                                let sepe = ',';
                                result += element.code +
                                    `(${element.name})` + sepe;
                            });
                            result = result.trim().slice(0, -1);
                            $('#input-lecturer_id').val(`${result}`);
                        }

                        $('input[name=archivist]').val(response.data.archivist);
                        $('.modal-title').text('Chỉnh sửa thông tin');

                    },
                    error: function(response) {
                        console.error(response);
                    }
                });
            });
            //handle update dispatch type
            $(document).on('click', '#btn-update', function() {
                resetClassInput('is-invalid');
                $.ajax({
                    type: "post",
                    url: "{{ route('api.basicresearch.update') }}",
                    data: new FormData(document.getElementById('form-data-theses')),
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#modal-basic-research').modal('hide');
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

            $(document).on('click', '#btn-create', function() {

                $('#btn-store').show();
                $('#btn-update').hide();
                $('.modal-title').text('Thêm mới');
                emptyInput();
            });

            //handle store dispatch type
            $(document).on('click', '#btn-store', function() {
                resetClassInput('is-invalid');
                $.ajax({
                    type: "post",
                    url: "{{ route('api.basicresearch.store') }}",
                    data: new FormData(document.getElementById('form-data-theses')),
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#modal-basic-research').modal('hide');
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
            $(document).on('click', '#btn-delete', function(e) {
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
                            url: "{{ route('api.basicresearch.distroy') }}",
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

            // $(document).on('input', '#input-search', (e) => {
            //     e.preventDefault();
            //     $.debounce(250, function() {
            //         let searchVal = $('#input-search').val();
            //         let year = $('#filter-year').val();
            //         $('input[name=hidden-search').val(searchVal);
            //         $('input[name=hidden-year').val(year);
            //         let data = {
            //             'year': year,
            //             'search': searchVal,
            //         };
            //         getAjax("{{ route('api.basicresearch.filter') }}", data, data);
            //     })
            // });
            var debounce = null;
            $('#input-search').on('input', function(e) {
                clearTimeout(debounce);
                debounce = setTimeout(function() {
                    e.preventDefault();
                    let searchVal = $('#input-search').val();
                    let year = $('#filter-year').val();
                    $('input[name=hidden-search').val(searchVal);
                    $('input[name=hidden-year').val(year);
                    let data = {
                        'year': year,
                        'search': searchVal,
                    };
                    getAjax("{{ route('api.basicresearch.filter') }}", data);
                }, 1000);
            });

            $(document).on('change', '#filter-year', function(e) {
                let searchVal = $('#input-search').val();
                $('input[name=hidden-search').val(searchVal);
                $('input[name=hidden-year').val(e.target.value);
                let data = {
                    'year': e.target.value,
                    'search': searchVal,
                };
                getAjax("{{ route('api.basicresearch.filter') }}", data);
            });

            //handle button reset
            $(document).on('click', '#btn-reset', function(event) {
                event.preventDefault();
                window.location.href = "{{ route('basicresearch') }}";
            })

        });
    </script>
@endpush
