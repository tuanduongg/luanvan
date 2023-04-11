@extends('layout.master')
@push('css')
@endpush
@section('content')
    
    <div class="row">
        <div class="col-12">
            <div class="h1">
                Công văn đến
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col ">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="" id="form-search" method="get">
                        <div class="row">
                            <div class="col-md-2 mb-2">
                                <input class="form-control" name="search" type="search" value=""
                                    placeholder="Nhập tên đề tài..." id="input-search">
                            </div>
                            <div class="col col-lg-1 col-md-2 mb-2">
                                <select class="form-select " id="filter-month">
                                    <option value="-1">Tháng</option>
                                    @for ($m = 1; $m <= 12; $m++)
                                        @if ($m < 10)
                                            <option value="{{ '0' . $m }}">{{ $m }}</option>
                                        @else
                                            <option value="{{ $m }}">{{ $m }}</option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                            <div class="col col-lg-1 col-md-2 mb-2">
                                <select class="form-select " id="filter-year">
                                    <option value="-1">Năm</option>
                                    @for ($i = (int) date('Y'); $i >= 2010; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12 col-lg-2 col-md-3 mb-2">
                                <select class="form-select " id="filter-date">
                                    @forelse ($listDates as $key => $date)
                                        <option value="{{ $key }}">{{ $date }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="col-lg-2 col-md-3 mb-2">
                                <select class="form-select " id="filter-type_id">

                                    <option value="-1">&#8722; Kiểu công văn &#8722;</option>
                                    @forelse ($dispatch_types as $type)
                                        <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="col-md-3 mb-3 col-6" style="">
                                <button class="btn btn-outline-secondary" id="btn-reset" type="button">
                                    <span class="tf-icons bx bx-refresh me-1"></span>
                                    Làm mới
                                </button>
                            </div>
                            <div class="col-lg-3 d-md-none d-xs-inline-block col-6">
                                <button id="btn-import" class="btn btn-secondary me-2" type="button">
                                    Nhập Excel
                                </button>
                            </div>
                        </div>
                        @if ((int)Auth::user()->role <= 2) 
                            
                        <div class="row mt-xs-2     ">
                            <div class="col d-md-flex justify-content-end ">
                                <button id="btn-import" class="btn btn-secondary me-2 d-md-inline-block d-none"
                                    type="button">
                                    <label for="input-import">
                                        <span class="tf-icons bx bx-import me-1"></span>
                                        Nhập Excel
                                    </label>
                                </button>
                                <input type="file" class="d-none" id="input-import" accept=".xlsx" name="input-import">
                                <button id="btn-export" class="btn btn-info me-2"type="button">
                                    <span class="tf-icons bx bx-export me-1"></span>
                                    Xuất Excel
                                </button>
                                <button class="btn btn-primary" type="button" id="btn-create" data-bs-toggle="modal"
                                    data-bs-target="#modal-dispatche-re">
                                    <span class="tf-icons bx bx-plus-circle me-1"></span>
                                    Thêm mới
                                </button>
                            </div>
                        </div>
                        @endif

                    </form>
                </div>
                {{-- </div> --}}
                <div class="card-content">
                    <hr class="m-0">
                    <div class="table-responsive h-px-500">

                        <table class="table card-table " id="table-data" style="">
                            <thead class="">
                                <tr>
                                    <th class="text-primary text-center td-stt" style="background-color: #ffff;position: sticky; top: 0; z-index: 1;">STT</th>
                                    <th class="text-primary" style="background-color: #ffff;position: sticky; top: 0; z-index: 1;">Số công văn</th>
                                    <th class="text-primary text-center" style="background-color: #ffff;position: sticky; top: 0; z-index: 1;min-width: 250px;">Tiêu đề</th>
                                    <th class="text-primary" style="background-color: #ffff;position: sticky; top: 0; z-index: 1 min-width: 170px;">Ngày<br>hiệu lực</th>
                                    <th class="text-primary" style="background-color: #ffff;position: sticky; top: 0; z-index: 1 min-width: 170px;">Ngày hết<br>hiệu lực</th>
                                    <th class="text-primary" style="background-color: #ffff;position: sticky; top: 0; z-index: 1 min-width: 170px;">Ngày<br>ban hành</th>
                                    <th class="text-primary" style="background-color: #ffff;position: sticky; top: 0; z-index: 1;">Nơi ban hành</th>
                                    <th class="text-primary" style="background-color: #ffff;position: sticky; top: 0; z-index: 1;">Kiểu công văn</th>
                                    <th class="text-primary td-action" style="background-color: #ffff;position: sticky; top: 0; z-index: 1;">Hành động</th>
                                </tr>
                            </thead>
                            <tbody style="border-top: 1px solid #d9dee3;">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-3">
                    <input type="hidden" name="hidden-search">
                    <input type="hidden" name="hidden-year">
                    <input type="hidden" name="hidden-month">
                    <input type="hidden" name="hidden-date">
                    <input type="hidden" name="hidden-type_id">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center ">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="loading"></div>
    <!-- Modal -->
    <div class="modal fade" id="modal-dispatche-re" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Thêm mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="" id="form-data-theses" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="input-code" class="form-label">Số công văn</label>
                                <input type="text" id="input-code" class="form-control" name="code"
                                    placeholder="Nhập số công văn...">
                                <div class="invalid-feedback error-code">
                                </div>

                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="type_id" class="form-label">Kiểu công văn</label>
                                <select class="form-select" name="type_id" id="input-type_id">
                                    @forelse ($dispatch_types as $type)
                                        <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                <div class="invalid-feedback error-type_id">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="role" value="1">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="input-tittle" class="form-label">Tiêu đề</label>
                                <textarea class="form-control" name="tittle" placeholder="Nhập tiêu đề..." id="input-tittle" rows="2"></textarea>
                                <div class="invalid-feedback error-tittle">

                                </div>

                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="input-content" class="form-label">Tóm tắt nội dung</label>
                                <textarea class="form-control" name="content" placeholder="Nhập tóm tắt nội dung..." id="input-content"
                                    rows="2"></textarea>
                                <div class="invalid-feedback error-content">

                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col mb-3">
                                <label for="input-content" class="form-label">Tóm tắt nội dung</label>
                                <textarea class="form-control" name="content" placeholder="Nhập tóm tắt nội dung..." id="input-content"
                                    rows="3"></textarea>
                                <div class="invalid-feedback error-content">

                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="input-signer" class="form-label">Người ký</label>
                                <input type="text" id="input-signer" name="signer" placeholder="Người ký..."
                                    class="form-control">
                                <div class="invalid-feedback error-signer"></div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="input-sign_date" class="form-label">Ngày ký</label>
                                <input type="date" id="input-sign_date" value="{{ date('Y-m-d') }}" name="sign_date"
                                    class="form-control">
                                <div class="invalid-feedback error-sign_date"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="input-published_place" class="form-label">Nơi ban hành</label>
                                <input type="text" id="input-published_place" name="published_place"
                                    placeholder="Nơi ban hành..." class="form-control">
                                <div class="invalid-feedback error-published_place"></div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="input-issued_date" class="form-label">Ngày ban hành</label>
                                <input type="date" id="input-issued_date" value="{{ date('Y-m-d') }}"
                                    name="issued_date" class="form-control">
                                <div class="invalid-feedback error-issued_date"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="input-effective_date" class="form-label">Ngày hiệu lực</label>
                                <input type="date" id="input-effective_date" value="{{ date('Y-m-d') }}"
                                    name="effective_date" class="form-control">
                                <div class="invalid-feedback error-effective_date"></div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="input-expiration_date" class="form-label">Ngày hết hiệu lực</label>
                                <input type="date" id="input-expiration_date" value="{{ date('Y-m-d') }}"
                                    name="expiration_date" class="form-control">
                                <div class="invalid-feedback error-expiration_date"></div>
                            </div>
                        </div>
                        <input type="hidden" name="id">
                        <div class="row row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="input-archivist" class="form-label">Người lưu trữ</label>
                                <input class="form-control" name="archivist" type="text"
                                    placeholder="Người lưu trữ..." id="input-archivist">
                                <div class="invalid-feedback error-archivist"></div>
                            </div>
                            <div class="col-12 col-md-6 mb-0">
                                <label for="storage_location" class="form-label">Vị trí lưu trữ</label>
                                <input type="text" id="input-storage_location" name="storage_location"
                                    placeholder="Nơi lưu trữ..." class="form-control">
                                <div class="invalid-feedback error-storage_location">

                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="file" class="form-label">File<span class="text-lowercase"> (nếu có)</span></label>
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
    <a href=""></a>
@endsection

@push('scripts')
    {{-- <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script> --}}
        {{-- <script type="text/javascript" src="{{ asset('dist/js/exceljs.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('dist/js/FileSaver.min.js') }}"></script> --}}
    <script lang="javascript" src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>

    <script>
        var arrCodes = [];
        //export excel

        function handleClickPanigate(currentPage, lastPage) {
            event.preventDefault();
            if (currentPage >= 1 && currentPage <= lastPage) {
                let filter = {
                    "year": $('input[name=hidden-year').val(),
                    "search": $('input[name=hidden-search').val(),
                    "month": $('input[name=hidden-month').val(),
                    "date": $('input[name=hidden-date').val(),
                    "type_id": $('input[name=hidden-type_id').val(),
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
                beforeSend: function() {
                    $(".loading").show();
                },
                success: function(response) {
                    $('.pagination').empty();
                    $('#table-data > tbody').empty();
                    if (response.data.data.length == 0) {
                        $('#table-data > tbody').append(`
                            <h5 class="text-center m-2" style="width: 150px;">không có dữ liệu!</h5>
                        `);
                        toastr["success"]('Không có dữ liệu !', "Thông báo");
                        return;
                    }
                    let student = response.data;
                    showData(student.data, student.current_page, student.last_page, student.links);
                    $('.loading').hide();
                },
                error: function(response) {
                    console.error(response);
                }
            });
        }

        function getData(page = 1, filter = '') {
            let url = "{{ route('api.dispatche.getAll', 'type') }}";
            url = url.replace('type', 1);
            let data = {
                'page': page,
            };
            // let oldFilter = '';
            if (filter != '') {
                url = "{{ route('api.dispatche.filter', 'type') }}";
                url = url.replace('type', 1);
                data = {
                    "page": page,
                    'year': filter.year,
                    'search': filter.search,
                    'month': filter.month,
                    'date': filter.date,
                    'type_id': filter.type_id,
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
            let start = ((current_page - 1) * 10) + 1;

            $.each(data, function(index, value) {
                // let urlView = "{{ route('dispatche.receive.view', ['id','slug']) }}";
                // urlView = urlView.replace('id', value.id);
                // urlView = urlView.replace('slug', string_to_slug("tesst tun"));
                let urlView = "{{ route('dispatche.receive.view',['id','slug']) }}";
                urlView = urlView.replace('id', value.id);
                urlView = urlView.replace('slug', string_to_slug(value.tittle));
                let color = 'secondary';
                switch (value.type_code.toLowerCase()) {
                    case 'cvht':
                        color = 'danger';
                        break;
                    case 'cvk':
                        color = 'primary';
                        break;
                    default:
                        break;
                }

                $('#table-data > tbody').append(`
                        <tr>
                            <td class="td-stt">${start++}</td>
                            <td class="">${value.code}</td>
                            <td class="">
                                <a class="text-normal "  href="${urlView}">
                                    ${value.tittle}
                                    </a>    
                            </td>
                            <td>${formatDate(value.effective_date)}</td>
                            <td>${formatDate(value.expiration_date)}</td>
                            <td>${formatDate(value.issued_date)}</td>
                            <td>${value.published_place}</td>
                            <td><span class="badge bg-label-${color} me-1  text-uppercase">${value.type_name}</span></td>
                                <td class="td-action">
                                    <div class="dropdown d-flex">
                                        @if ((int)Auth::user()->role != 3)
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow me-2"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                            @endif
                                            <a href="${urlView}" class="btn hide-arrow p-0"><i class='bx bx-show-alt'></i></a>
                                            @if ((int)Auth::user()->role != 3)
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" id='btn-edit' data-bs-toggle="modal" data-bs-target="#modal-dispatche-re" data-id=${value.id} href="javascript:void(0);">
                                                        <i class="bx bx-edit-alt me-1"></i>
                                                        Sửa
                                                        </a>
                                                        <a class="dropdown-item" id='btn-delete' data-id=${value.id} href="javascript:void(0);">
                                                            <i class="bx bx-trash me-1"></i>
                                                            Xoá
                                                        </a>
                                                </div>
                                            @endif
                                    </div>
                                </td>
                        </tr>`);
            });
        }


        $(document).ready(function() {

            function handleImportFile(e) {
                var file = e.target.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    var data = e.target.result;
                    var workbook = XLSX.read(e.target.result, {
                        dateNF: 'mm/dd/yyyy',
                        cellDates: true,
                        raw: true
                    });
                    var worksheet = workbook.Sheets[workbook.SheetNames[0]];
                    var jsonData = XLSX.utils.sheet_to_json(worksheet, {
                        header: 1,
                        cellDates: true,
                        dateNF: 'yyyy-mm-dd',
                        raw: false
                    });
                    let isAccetp = false;
                    var arrReult = [];
                    console.log(jsonData);
                    for (let i = 0; i < jsonData.length; i++) {
                        console.log(isDate(jsonData[i][5]));
                        if (jsonData[i].length === 12 && isDate(jsonData[i][5])) {
                            isAccetp = true;
                            let msg = validateImportExcel(jsonData[i],1);
                            if (msg !== '') { // lỗi
                                toastr.options.timeOut = 0;
                                toastr.options.extendedTimeOut = 0;
                                toastr.error(`Lỗi hàng ${(i + 1)} file excel:` + msg, "Lỗi Nhập File");
                                return;
                            };
                            jsonData[i][5] = formatDate(jsonData[i][5], 'yyyy-mm-dd');
                            jsonData[i][6] = formatDate(jsonData[i][6], 'yyyy-mm-dd');
                            jsonData[i][8] = formatDate(jsonData[i][8], 'yyyy-mm-dd');
                            jsonData[i][9] = formatDate(jsonData[i][9], 'yyyy-mm-dd');
                            arrReult.push(jsonData[i]);
                        }
                    };

                    if (isAccetp === false) {
                        toastr["error"]("file excel không đúng định dạng", "Thông báo");
                        return;
                    }
                    //call ajax
                    let url = "{{ route('api.dispatche.storeMultiple', ':type') }}";
                    url = url.replace(':type', 1)
                    $.ajax({
                        type: "post",
                        url: url,
                        data: {
                            data: arrReult
                        },
                        dataType: "json",
                        success: function(response) {
                            toastr["success"]("Thêm mới thành công", "Thông báo");
                            getData();
                        },
                        error: function(res) {
                            toastr["error"](res.responseJSON.message, "Thông báo");
                        }
                    });



                };
                reader.readAsArrayBuffer(file);
                $("#input-import").val(null);
            }

            function getAllCode() {
                let url = "{{ route('api.dispatche.getAllCode') }}";
                $.ajax({
                    type: "get",
                    async: true,
                    url: url,
                    dataType: "json",
                    success: function(response) {
                        arrCodes = response.data;
                    },
                    error: function(res) {
                        console.log(res);
                    }
                });
                return null;
            }

            $(document).on('change', '#input-import', (e) => {
                Swal.fire({
                    title: 'Thông Báo!',
                    text: "Bạn chắc chắn muốn nhập từ excel?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Không",
                    confirmButtonText: 'Vâng!đúng rồi'
                }).then((result) => {

                    if (result.isConfirmed) {
                        toastr.clear();
                        getAllCode();
                        setTimeout(() => {
                            handleImportFile(e);
                        }, 500);
                    } else {
                        $("#input-import").val(null);
                    }
                })

            });


            function getCurrentDate() {
                var now = new Date();

                var day = ("0" + now.getDate()).slice(-2);
                var month = ("0" + (now.getMonth() + 1)).slice(-2);

                var today = now.getFullYear() + "-" + (month) + "-" + (day);
                return today;
            }

            function emptyInput() {
                $('textarea[name=tittle]').val('');
                $('textarea[name=content]').val('');
                $('input[name=code]').val('');
                $('input[name=type_id]').val('');
                $('input[name=signer]').val('');
                $('input[name=sign_date]').val(getCurrentDate());
                $('input[name=published_place]').val('');
                $('input[name=issued_date]').val(getCurrentDate());
                $('input[name=expiration_date]').val(getCurrentDate());
                $('input[name=effective_date]').val(getCurrentDate());
                $('input[name=archivist]').val('');
                $('input[name=storage_location]').val('');
                $('input[name=file]').val('');
                resetClassInput('is-invalid');

            }

            //remove validate onfocus input
            // $(document).on('focus', 'input,textarea', (e) => {
            //     $(e.target).removeClass('is-invalid');
            // });

            function resetClassInput(className) {
                $('textarea[name=tittle]').removeClass(className);
                $('textarea[name=content]').removeClass(className);
                $('input[name=code]').removeClass(className);
                $('input[name=type_id]').removeClass(className);
                $('input[name=signer]').removeClass(className);
                $('input[name=sign_date]').removeClass(className);
                $('input[name=published_place]').removeClass(className);
                $('input[name=issued_date]').removeClass(className);
                $('input[name=expiration_date]').removeClass(className);
                $('input[name=effective_date]').removeClass(className);
                $('input[name=archivist]').removeClass(className);
                $('input[name=storage_location]').removeClass(className);
                $('input[name=file]').removeClass(className);
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
                    url: "{{ route('api.dispatche.find') }}",
                    data: {
                        "id": id
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('.modal-title').text('Chỉnh sửa thông tin công văn đến');
                        $('input[name=code]').val(response.data.code);
                        $('input[name=id]').val(id);
                        $('textarea[name=tittle]').val(response.data.tittle);
                        $('textarea[name=content]').val(response.data.content);
                        $('input[name=storage_location]').val(response.data.storage_location);
                        $('input[name=type_id]').val(response.data.type_id);
                        $('input[name=signer]').val(response.data.signer);
                        $('input[name=sign_date]').val(response.data.sign_date);
                        $('input[name=published_place]').val(response.data.published_place);
                        $('input[name=issued_date]').val(formatDate(response.data.issued_date,
                            'yyyy-mm-dd'));
                        $('input[name=expiration_date]').val(response.data.expiration_date);
                        $('input[name=effective_date]').val(response.data.effective_date);
                        $('input[name=archivist]').val(response.data.archivist);

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
                    url: "{{ route('api.dispatche.update') }}",
                    data: new FormData(document.getElementById('form-data-theses')),
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#modal-dispatche-re').modal('hide');
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
                $('.modal-title').text('Thêm mới công văn đến');
                emptyInput();
            });

            //handle store dispatch type
            $(document).on('click', '#btn-store', function() {
                resetClassInput('is-invalid');
                $.ajax({
                    type: "post",
                    url: "{{ route('api.dispatche.store') }}",
                    data: new FormData(document.getElementById('form-data-theses')),
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#modal-dispatche-re').modal('hide');
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
                            url: "{{ route('api.dispatche.distroy') }}",
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
                url = "{{ route('api.dispatche.filter', 'type') }}";
                url = url.replace('type', 1);
                clearTimeout(debounce);
                debounce = setTimeout(function() {
                    e.preventDefault();
                    let searchVal = $('#input-search').val();
                    let year = $('#filter-year').val();
                    let month = $('#filter-month').val();
                    let date = $('#filter-date').val();
                    let type_id = $('#filter-type_id').val();

                    $('input[name=hidden-search').val(searchVal);
                    $('input[name=hidden-year').val(year);
                    $('input[name=hidden-month').val(month);
                    $('input[name=hidden-type_id').val(type_id);
                    $('input[name=hidden-date').val(date);
                    let data = {
                        'year': year,
                        'search': searchVal,
                        'month': month,
                        'date': date,
                        'type_id': type_id,
                    };
                    getAjax(url, data);
                }, 1000);
            });

            $(document).on('change', '#filter-year,#filter-month,#filter-date,#filter-type_id', function(e) {
                url = "{{ route('api.dispatche.filter', 'type') }}";
                url = url.replace('type', 1);
                let searchVal = $('#input-search').val();
                let month = $('#filter-month').val();
                let date = $('#filter-date').val();
                let type_id = $('#filter-type_id').val();
                let year = $('#filter-year').val();

                $('input[name=hidden-search').val(searchVal);
                $('input[name=hidden-year').val(year);
                $('input[name=hidden-month').val(month);
                $('input[name=hidden-type_id').val(type_id);
                $('input[name=hidden-date').val(date);
                let data = {
                    'year': year,
                    'search': searchVal,
                    'month': month,
                    'date': date,
                    'type_id': type_id,
                };
                getAjax(url, data);
            });

            //handle button reset
            $(document).on('click', '#btn-reset', function(event) {
                event.preventDefault();
                window.location.href = "{{ route('dispatche.receive') }}";
            })

        });
    </script>
@endpush
