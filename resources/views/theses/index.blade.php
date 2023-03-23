@extends('layout.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('dist/css/tagify.css') }}" />
@endpush
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
                    <form action="" id="form-search" method="get">
                        <div class="row">
                            <div class="col-md-2 mb-2">
                                <input class="form-control" name="search" type="search" value=""
                                    placeholder="Nhập tên đề tài..." id="input-search">
                            </div>
                            <div class="col-md-2 mb-2">
                                <select class="form-select " id="filter-school-year">
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
                    <input type="hidden" name="hidden-school_year">
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
                                <label for="content" class="form-label">Nội dung</label>
                                <textarea class="form-control" name="content" placeholder="Nhập tóm tắt nội dung" id="input-content" rows="3"></textarea>
                                <div class="invalid-feedback error-content">

                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="start_date" class="form-label">Ngày bắt đầu</label>
                                <input type="date" id="input-start_date" name="start_date" class="form-control"
                                    placeholder="">
                                <div class="invalid-feedback error-start_date">

                                </div>
                            </div>
                            <div class="col mb-0">
                                <label for="end-date" class="form-label">Ngày kết thúc</label>
                                <input type="date" id="input-end_date" name="end_date" class="form-control">
                                <div class="invalid-feedback error-end_date"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="input-lecturer_id" class="form-label">Mã giảng viên</label>
                                <input type="text" name="lecturer_id" id="input-lecturer_id" class="form-control"
                                    placeholder="Nhập mã giảng viên">
                                <div class="invalid-feedback error-lecturer_id"></div>
                            </div>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="school_year" class="form-label">Niên khoá</label>
                                <select id="input-school_year" name="school_year" class="form-select">
                                    <option value="13">K13</option>
                                    <option value="12">K12</option>
                                    <option value="11">K11</option>
                                </select>
                                <div class="invalid-feedback error-school_year">

                                </div>
                            </div>
                            <div class="col mb-0">
                                <label for="storage_location" class="form-label">Vị trí lưu trữ</label>
                                <input type="text" id="input-storage_location" name="storage_location"
                                    placeholder="Nhập vị trí lưu trữ" class="form-control" id="">
                                <div class="invalid-feedback error-storage_location">

                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id">
                        <div class="row">

                            <div class="mb-3">
                                <label for="input-student_id" class="form-label d-block">Sinh viên</label>
                                <input id="input-student_id" required class="tagify-email-list" name="student_id"
                                    value="">
                                <button type="button" id="btn-add-input-msv"
                                    class="btn btn-outline-primary btn-icon rounded-pill"><span
                                        class="tf-icons bx bx-plus"></span></button>
                            </div>
                        </div>
                        <div class="row row g-2 mb-3">
                            <div class="col">
                                <label for="input-archivist" class="form-label">Người lưu trữ</label>
                                <input class="form-control" name="archivist" type="text" placeholder="Người lưu trữ" id="input-archivist">
                                <div class="invalid-feedback error-archivist"></div>
                            </div>
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
                    <button type="button" id="btn-store-theses" class="btn btn-primary">Lưu thay đổi</button>
                    <button type="button" id="btn-update-theses" style="display: none;" class="btn btn-primary">Cập
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
                    "school_year": $('input[name=hidden-school_year').val(),
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
            if (filter != '') {
                url = "{{ route('api.theses.filter') }}";
                data = {
                    "page": page,
                    'school_year': filter.school_year,
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
                let urlView = "{{ route('theses.view', 'id') }}";
                urlView = urlView.replace('id', value.id);
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
                                            <a class="dropdown-item" href="${urlView}">
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

            var whitelists = [];



            const TagifyStudentListEl = document.querySelector("#input-student_id");
            const TagifyStudentList = new Tagify(TagifyStudentListEl, {
                // email address validation (https://stackoverflow.com/a/46181/104380)
                // pattern: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                texts: {
                    empty: "Không được để trống",
                    exceed: "Tối đa 2 sinh viên",
                    pattern: "Không đúng định dạng",
                    duplicate: "Đã tồn tại dữ liệu",
                },
                whitelist: whitelists,
                maxTags: 2,
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
            // TagifyStudentListEl.addEventListener('change', onChange)
            // let couter = 1;

            // function onChange(e) {
            //     // if (JSON.parse(e.target.value).length >= 2) { //litmit add tags = 2
            //     //     $('#btn-add-input-msv').addClass('d-none');
            //     // } else {
            //     //     $('#btn-add-input-msv').removeClass('d-none');
            //     // }
            // }
            const button = TagifyStudentListEl.nextElementSibling; // "add new tag" action-button

            button.addEventListener("click", onAddButtonClick);

            function onAddButtonClick(e) {

                let inputVal = $('#input-student_id').val();
                // if (inputVal) {

                if (inputVal == '') {

                    TagifyStudentList.addEmptyTag();
                    return;
                } else {
                    if (JSON.parse(inputVal).length < 2) { //litmit add tags = 2
                        // $('#btn-add-input-msv').addClass('d-none');
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
            $(document).on('click', '#btn-add-input-msv', () => {
                if (couter != true) {
                    let data = [];
                    $.ajax({
                        type: "get",
                        url: "{{ route('api.student.select2') }}",
                        dataType: "json",
                        success: function(response) {
                            response.data.forEach(element => {
                                data.push(element.student_code +
                                    `(${element.student_name})`)
                            });
                            TagifyStudentList.settings.whitelist = data;
                        }
                    });
                }
                couter = true;
                // return data;
            });
            // function formatState(state) {
            //     if (!state.id) {
            //         return state.text;
            //     }
            //     var baseUrl = "admin/images/flags";
            //     var $state = $(
            //         '<span>' + state.text + '</span>'
            //     );
            //     return $state;
            // };

            // const URL = "{{ route('api.student.select2') }}";
            let config = {
                // templateResult: function(data, container) {
                //     if (data.element) {
                //         $(container).css({'z-index':'1000'});
                //         $(data.element).css({'z-index':'1000'});
                //     }
                //     return data.text;
                // },
                placeholder: "Nhập mã sinh viên....",
                // allowClear: true,
                // tags: false,
                // width: '100%',
                // minimumInputLength: 3,
                // maximumSelectionLength: 2,
                // maximumResultsForSearch: 10,
                // templateResult: formatState,
                // ajax: {
                //     url: URL,
                //     dataType: "json",
                //     type: "GET",
                //     delay: 250,
                //     data: function(params) {

                //         var queryParameters = {
                //             student_name: params.term
                //         }
                //         return queryParameters;
                //     },
                //     processResults: function(data) {
                //         return {
                //             results: $.map(data.data, function(item) {

                //                 return {
                //                     text: item.student_name,
                //                     id: item.student_code
                //                 }
                //             })
                //         };
                //     }
                // }
            }
            // $('#input-msv').select2(config);
            // $(document).on('click', '.select2-container', function() {
            //     $(".select2-results").css({
            //         'z-index': '10900 !important'
            //     });
            //     // $(".select2-results").addClass('dropdown-menu show');
            //     $(".select2-results__options").css({
            //         'z-index': '10900 !important'
            //     });
            //     $(".select2-results").addClass("bg-primary");
            //     $(".select2-results__options").addClass("bg-primary");
            //     $(".select2-results__option").addClass("bg-primary");
            //     // alert(1);
            // });
            // // $(".select2-container").on("bg-primary");

            // $('.select2-search__field').addClass('form-control');
            // generate random whitelist items (for the demo)



            function emptyInput() {
                $('input[name=code]').val('');
                $('textarea[name=tittle]').val('');
                $('textarea[name=content]').val('');
                $('input[name=student_id]').val('');
                $('input[name=lecturer_id]').val('');
                $('input[name=archivist]').val('');
                $('input[name=start_date]').val('');
                $('input[name=end_date]').val('');
                $('input[name=storage_location]').val('');
                // $('select[name=role]').val('');
                $("select[name=role]").prop("selectedIndex", 0);
                $('select[name=email]').val('');
                $('select[name=password]').val('');
                resetClassInput('is-invalid');

            }

            function resetClassInput(className) {
                $('input[name=code]').removeClass(className);
                $('textarea[name=tittle]').removeClass(className);
                $('textarea[name=content]').removeClass(className);
                $('input[name=student_id]').removeClass(className);
                $('input[name=lecturer_id]').removeClass(className);
                $('input[name=archivist]').removeClass(className);
                $('input[name=start_date]').removeClass(className);
                $('input[name=end_date]').removeClass(className);
                $('input[name=storage_location]').removeClass(className);
                $("select[name=role]").removeClass(className);;
                $('select[name=email]').removeClass(className);
                $('select[name=password]').removeClass(className);
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
                            let result = '';
                            response.data.students.forEach((element, index) => {
                                let sepe = ',';
                                result += element.student_code +
                                    `(${element.student_name})` + sepe;
                            });
                            result = result.trim().slice(0, -1);
                            $('#input-student_id').val(`${result}`);
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
                resetClassInput('is-invalid');
                $.ajax({
                    type: "post",
                    url: "{{ route('api.theses.update') }}",
                    data: new FormData(document.getElementById('form-data-theses')),
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#modal-theses').modal('hide');
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

            $(document).on('click', '#btn-create-theses', function() {

                $('#btn-store-theses').show();
                $('#btn-update-theses').hide();
                $('.modal-title').text('Thêm mới');
                emptyInput();
            });

            //handle store dispatch type
            $(document).on('click', '#btn-store-theses', function() {
                resetClassInput('is-invalid');
                $.ajax({
                    type: "post",
                    url: "{{ route('api.theses.store') }}",
                    data: new FormData(document.getElementById('form-data-theses')),
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#modal-theses').modal('hide');
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
            var debounce = null;
            $('#input-search').on('input', function(e) {
                clearTimeout(debounce);
                debounce = setTimeout(function() {
                    e.preventDefault();
                    let searchVal = $('#input-search').val();
                    let school_year = $('#filter-school-year').val();
                    $('input[name=hidden-search').val(searchVal);
                    $('input[name=hidden-school_year').val(school_year);
                    let data = {
                        'school_year': school_year,
                        'search': searchVal,
                    };
                    getAjax("{{ route('api.theses.filter') }}", data);
                }, 1000);
            });

            $(document).on('change', '#filter-school-year', function(e) {
                let searchVal = $('#input-search').val();
                $('input[name=hidden-search').val(searchVal);
                $('input[name=hidden-school_year').val(e.target.value);
                let data = {
                    'school_year': e.target.value,
                    'search': searchVal,
                };
                getAjax("{{ route('api.theses.filter') }}", data);
            });

            // //hanle submit form search
            // $(document).on('submit', '#form-search', function(e) {
            //     e.preventDefault();
            //     let searchVal = $('#input-search').val();
            //     let school_year = $('#filter-school-year').val();
            //     $('input[name=hidden-search').val(searchVal);
            //     $('input[name=hidden-school_year').val(school_year);
            //     let data = {
            //         'school_year': school_year,
            //         'search': searchVal,
            //     };
            //     getAjax("{{ route('api.theses.filter') }}", data, data);
            // });

            // $(document).on('change', '#filter-school-year', function() {
            //     $('#form-search').submit();
            // });




            //handle button reset
            $(document).on('click', '#btn-reset', function(event) {
                event.preventDefault();
                window.location.href = "{{ route('theses') }}";
            })

        });
    </script>
@endpush