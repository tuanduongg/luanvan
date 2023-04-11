@extends('layout.master')
@push('css')
    {{-- <script src=""></script> --}}
    <style>
        .calendar__weekday {
            font-weight: bold !important;
            color: #0005ff !important;
        }

        .color-calendar.basic .calendar__days .calendar__day-bullet {
            background-color: #ff0000 !important;
        }

        #list-event::-webkit-scrollbar {
            display: none;
        }

        .calendar__day {}

        .calendar__days {
            border-top: 1px solid #d1d1d1;
            border-bottom: 1px solid #d1d1d1;
        }

        [contenteditable] {
            outline: 0px solid transparent;
        }

        .select-ium {
            border: none;
        }
    </style>
    {{-- <link rel="stylesheet" href="{{ asset('dist/css/simple_calendar.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar/dist/css/theme-glass.css" />
@endpush
@section('content')
    {{-- <h1>Trang chủ</h1> --}}
    <div class="row mb-3">
        <div class="col-12 col-md-6 mb-2">
            <div class="card h-100">
                <div class="card-content d-flex align-items-center h-100  mb-3  ps-5">
                    <div class="text-center text-lg-start mt-2">
                        <h4 class="text-primary mb-1">Xin chào {{ auth()->user()->name }}!</h4>
                        <p><em>"{!! $quote !!}"</em></p>
                    </div>
                    <div class="">
                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/illustrations/sitting-girl-with-laptop-light.png"
                            class="img-fluid me-lg-5 pe-lg-1 mb-3 mb-lg-0" alt="Image" width="150">
                    </div>
                </div>
            </div>

        </div>
        <div class="col col-lg-6 mb-2">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Thống kê cá nhân</h5>
                            <span class="ms-2">Bạn đã tham gia vào:</span>
                            <ul>
                                <li><span class="text-primary fw-bold">{{ $total_thesesAuth }}</span> đề tài
                                    Luận văn sinh viên</li>
                                <li><span class="text-primary fw-bold">{{ $total_basic_researchAuth }}</span>
                                    đề tài NCKH cấp cơ sở</li>
                                <li><span class="text-primary fw-bold">{{ $total_student_researchAuth }}</span>
                                    đề tài NCKH sinh
                                    viên</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/illustrations/man-with-laptop-dark.png"
                                height="140" alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12 col-md-5 col-lg-3">
            <div id="calendar" class="">

            </div>
        </div>
        <div class="col-12 col-md-7 col-lg-9 mt-2  mt-md-0">
            <div class="w-100 h-100"
                style="background-color: #ffff; box-shadow: 0 7px 30px -10px rgba(150, 170, 180, 0.5); border-radius: 0.5rem;">
                <div class="col p-3">
                    <div class="row d-flex">
                        <div class="col-7">

                            <h5 class="card-title text-primary">Danh sách sự kiện
                                <span id="day-select" class="text-primary fw-bold">10/4/2023</span>
                            </h5>
                        </div>
                        @if ((int) Auth::user()->role < 3)
                            <div class="col-5 text-end ">

                                <button class="btn btn-primary btn-sm" id="btn-create-event" type="button"
                                    data-bs-toggle="modal" data-bs-target="#modal-event">Thêm sự kiện</button>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <ol id="list-event" style="height: 255px; overflow-y: auto;overflow-x: hidden">
                    </ol>

                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-event" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Sự kiện</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="form-data-event" method="POST">

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="input-name" class="form-label">Tiêu đề</label>
                                    <input type="text" id="input-name" max="100" name="name"
                                        class="form-control">
                                    <div class="invalid-feedback error-name"></div>
                                </div>
                            </div>
                            <input type="hidden" name="id">
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="input-start" class="form-label">Ngày bắt đầu</label>
                                    <input type="date" name="start" id="input-start" class="form-control">
                                    <div class="invalid-feedback error-start"></div>
                                </div>
                                <div class="col mb-0">
                                    <label for="input-end" class="form-label">Ngày kết thúc</label>
                                    <input type="date" id="input-end" name="end" class="form-control"
                                        placeholder="DD / MM / YY">
                                    <div class="invalid-feedback error-end"></div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">đóng</button>
                        <button type="button" id="btn-store-event" class="btn btn-primary">Lưu</button>
                        <button type="button" id="btn-update-event" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col col-md-6">
            <div class="card h-100 text-center">
                <div class="card-header text-primary fw-bold">
                    Biểu đồ thống kê số lượng luận văn theo từng niên khoá
                </div>

                <div class="card-body">
                    <canvas id="theseChart"></canvas>
                </div>
                <div class="card-footer">
                    <div class="row ">
                        <div class="col d-flex justify-content-end">
                            <div class="d-flex align-items-center">Lọc từ</div>
                            <select class="ms-2 form-select  w-auto h-70" id="fromSchoolYear">
                                @for ($i = 1; $i <= $allSchoolYear; $i++)
                                    <option @if ($i == $allSchoolYear - 5) selected @endif value="{{ $i }}">
                                        K{{ $i }}</option>
                                @endfor

                            </select>
                            <div class="ms-2 me-2 d-flex align-items-center">đến</div>
                            <select class="form-select  w-auto h-70" id="toSchoolYear">
                                @for ($i = $allSchoolYear; $i > 0; $i--)
                                    <option value="{{ $i }}">K{{ $i }}</option>
                                @endfor
                            </select>
                            <button type="button" id="btn-filter-theses-chart"
                                class="ms-4 btn btn-outline-primary me-2 w-auto h-70">
                                <span class="tf-icons bx bx-filter-alt me-1"></span> Lọc
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col col-md-6 mt-4 mt-md-0">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2 fw-bold">Thống kê hệ thống</h5>
                    <div class="fw-bold">
                        Tổng
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="flex-shrink-0 me-3">
                                <i class="menu-icon tf-icons bx bxs-user"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <h6 class="mb-0">Sinh viên</h6>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0 text-primary fw-bold">{{ $totalEachTable[13]->total_record }}</h6>
                                    <span class="text-muted">(Sinh viên)</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="flex-shrink-0 me-3">
                                <i class="menu-icon tf-icons bx bxs-group"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <h6 class="mb-0">Giảng viên</h6>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0 text-primary fw-bold">{{ $totalEachTable[9]->total_record }}</h6> <span
                                        class="text-muted">(Giảng Viên)</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="flex-shrink-0 me-3">
                                <i class="menu-icon tf-icons bx bxs-file-blank"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <h6 class="mb-0">Công văn</h6>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0 text-primary fw-bold">{{ $totalEachTable[4]->total_record }}</h6>
                                    <span class="text-muted">(Công Văn)</span>
                                </div>
                            </div>
                        </li>

                        <li class="d-flex mb-4 pb-1">
                            <div class="flex-shrink-0 me-3">
                                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <h6 class="mb-0">Luận văn sinh viên</h6>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0 text-primary fw-bold">{{ $totalEachTable[16]->total_record }}</h6>
                                    <span class="text-muted">(Luận Văn)</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="flex-shrink-0 me-3">
                                <i class="menu-icon tf-icons bx bxs-file-find"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <h6 class="mb-0">Nghiên cứu khoa học cơ sở</h6>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0 text-primary fw-bold">{{ $totalEachTable[0]->total_record }}</h6>
                                    <span class="text-muted">(Đề tài)</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="flex-shrink-0 me-3">
                                <i class="menu-icon tf-icons bx bxs-select-multiple"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <h6 class="mb-0">Nghiên cứu khoa học sinh viên</h6>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0 text-primary fw-bold">{{ $totalEachTable[14]->total_record }}</h6>
                                    <span class="text-muted">(Đề tài)</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="flex-shrink-0 me-3">
                                <i class="menu-icon tf-icons bx bxs-folder-open"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <h6 class="mb-0">Ý tưởng sáng tạo sinh viên</h6>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0 text-primary fw-bold">{{ $totalEachTable[2]->total_record }}</h6>
                                    <span class="text-muted">(Ý tưởng)</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col col-md-6">
            <div class="card h-100 text-center">
                <div class="card-header text-primary fw-bold">
                    Biểu đồ thống kê số đề tài ý tưởng sáng tạo
                    <select name="" class="select-ium" style="color: #0005ff" id="select-creative-chart">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select> năm học gần đây
                </div>

                <div class="card-body">
                    <canvas id="creativeChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col col-md-6">
            <div class="card h-100 text-center">
                <div class="card-header text-primary fw-bold">
                    Biểu đồ thống kê số đề tài ý tưởng NCKH
                    <select name="" class="select-ium" style="color: #0005ff" id="select-research-chart">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select> năm học gần đây
                </div>

                <div class="card-body">
                    <canvas id="researchChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}
@endsection
@push('scripts')
    {{-- <script src="{{ asset('dist/js/simple_calendar.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            var calendar;
            var myEvents = [];
            var labelsChartTheses = [];
            var dataChartTheses = [];
            var chartTheses;
            var labelsChartCreative = [];
            var dataChartCreative = [];
            var chartCreative;
            var labelsChartResearch = [];
            var dataChartStudentResearch = [];
            var dataChartBasicResearch = [];
            var chartResearch;


            async function getDataEvent() {
                await $.ajax({
                    type: "get",
                    url: "{{ route('api.event.getAll') }}",
                    dataType: "json",
                    success: function(response) {
                        $.each(response.data, function(index, value) {
                            value.start = `${value.start}T06:00:00`; //default start 6h
                            value.end = `${value.end}T12:00:00`; //default end 12h
                        });
                        // console.log(myEvents[0].start + 'T06:00:00')
                        myEvents = response.data;
                    },
                    error: (response) => {
                        console.log(response);
                    }
                });
            }
            getDataEvent();



            setTimeout(() => {
                const option = {
                    id: '#calendar',
                    calendarSize: 'large',
                    primaryColor: "#566a7f",
                    headerColor: "#566a7f",
                    weekdaysColor: "#696cff",
                    startWeekday: 1,
                    eventsData: myEvents,
                    dateChanged: (currentDate, events) => {
                        $('#list-event').empty();
                        let day = new Date(currentDate);
                        let dateCurrent = day.getDate();
                        let monthCurrent = day.getMonth() + 1;
                        let yearCurrent = day.getFullYear();

                        if (parseInt(dateCurrent) < 10) {
                            dateCurrent = `0${dateCurrent}`;
                        }
                        if (parseInt(monthCurrent) < 10) {
                            monthCurrent = `0${monthCurrent}`;
                        }

                        $('input[name=start]').val(`${yearCurrent}-${monthCurrent}-${dateCurrent}`);
                        $('input[name=end]').val(`${yearCurrent}-${monthCurrent}-${dateCurrent}`);
                        $('#day-select').empty();
                        $('#day-select').append(
                            `${dateCurrent}/${monthCurrent}/${yearCurrent}`);
                        let nameEvent = "";

                        // nameEvent = events[0].name;
                        if (events.length < 1) {
                            $('#list-event').append(
                                `<span class="text-primary">không có sự kiện<span>`);
                        } else {
                            $.each(events, function(index, value) {
                                $('#list-event').append(`<li class="mb-2">
                                    <div class="row">
                                        <div class="col-8 col-lg-10">
                                            ${value.name}
                                        </div>
                                        @if ((int) Auth::user()->role < 3)
                                        <div class="col-4 col-lg-2 text-end d-flex justify-content-between">
                                            <button type="button" class="btn btn-icon me-2 btn-link " data-id=${value.id} id="btn-edit-event" data-bs-toggle="modal"
                                            data-bs-target="#modal-event">
                                                <span class="tf-icons bx bxs-edit-alt"></span>
                                            </button>
                                            <button type="button" class="btn btn-icon me-2 btn-link text-danger" data-id=${value.id} id="btn-delete-event">
                                                <span class="tf-icons bx bx-x-circle"></span>
                                            </button>
                                        </div>
                                        @endif
                                    </div>
                                </li>`);

                            });
                        }
                    },
                    customWeekdayValues: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                    customMonthValues: ['Th1', 'Th2', 'Th3', 'Th4', 'Th5', 'Th6', 'Th7', 'Th8',
                        'Th9', 'Th10',
                        'Th11', 'Th12'
                    ],
                }
                calendar = new Calendar(option);

            }, 700);

            function getCurrentDate() {
                var now = new Date();

                var day = ("0" + now.getDate()).slice(-2);
                var month = ("0" + (now.getMonth() + 1)).slice(-2);

                var today = now.getFullYear() + "-" + (month) + "-" + (day);
                return today;
            }

            function emptyInput() {
                $('input[name=name]').val('');
                resetClassInput('is-invalid');

            }

            function resetClassInput(className) {
                $('input[name=name]').removeClass(className);
                $('input[name=start]').removeClass(className);
                $('input[name=end]').removeClass(className);
            }

            //handle edit dispatch type
            $(document).on('click', '#btn-edit-event', function(e) {
                e.preventDefault();
                $('#btn-update-event').show();
                $('#btn-store-event').hide();
                emptyInput();

                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{ route('api.event.find') }}",
                    data: {
                        "id": id
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('input[name=name]').val(response.data.name);
                        $('input[name=start]').val(response.data.start);
                        $('input[name=end]').val(response.data.end);
                        $('input[name=id]').val(id);
                        $('.modal-title').text('Chỉnh sửa thông tin');

                    },
                    error: function(response) {
                        console.error(response);
                    }
                });
            });
            //handle update dispatch type
            $(document).on('click', '#btn-update-event', function() {
                console.log(calendar.getEventsData());
                let id = $('input[name=id]').val();
                let name = $('input[name=name]').val();
                let start = $('input[name=start]').val();
                let end = $('input[name=end]').val();

                resetClassInput('is-invalid');
                $.ajax({
                    type: "post",
                    url: "{{ route('api.event.update') }}",
                    data: new FormData(document.getElementById('form-data-event')),
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#modal-event').modal('hide');
                        toastr["success"](response.message, "Thông báo");

                        // setTimeout(location.reload(), 500);
                        // getDataEvent();
                        // let newEvents = myEvents.filter((item)=> item.id !== id);
                        let data = calendar.getEventsData();
                        $.each(data, (index, value) => {
                            if (value.id == id) {
                                value.name = name;
                                value.start = `${start}T06:00:00`; //default start 6h
                                value.end = `${end}T12:00:00`; //
                                // console.log(value);
                                return null;
                            }
                        });

                        setTimeout(() => {
                            calendar.setEventsData(data);
                        }, 400);
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

            $(document).on('click', '#btn-create-event', function() {

                $('#btn-store-event').show();
                $('#btn-update-event').hide();
                $('.modal-title').text('Thêm mới sự kiện');
                emptyInput();
            });

            //handle store event
            $(document).on('click', '#btn-store-event', function() {
                resetClassInput('is-invalid');
                $.ajax({
                    type: "post",
                    url: "{{ route('api.event.store') }}",
                    data: new FormData(document.getElementById('form-data-event')),
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        calendar.addEventsData([response.data]);

                        // setTimeout(location.reload(), 500); // Using .reload() method.
                        $('#modal-event').modal('hide');
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

            //button delete clicks
            $(document).on('click', '#btn-delete-event', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Thông Báo!',
                    text: "Bạn chắc chắn muốn xoá sự kiện ?",
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
                            url: "{{ route('api.event.distroy') }}",
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
                                let newEventsDelete = calendar.getEventsData().filter((
                                        item) => item.id !==
                                    id);
                                calendar.setEventsData(newEventsDelete);
                            },
                            error: function(response) {
                                console.error(response);
                            }
                        });

                    }
                })

            });
            setTimeout(() => {

                $('.calendar__body').append(` <div class="row mt-2">
                        <div class="col-12 text-end">
                            <button class="btn btn-primary btn-sm" id="btn-today">Hôm nay</button>
                            </div>
                        </div>`);
            }, 700);

            $(document).on('click', '#btn-today', () => {
                calendar.reset();
            });

            $(document).on('click', '#btn-filter-theses-chart', () => {
                getDataTheseChart();
            });



            //tổng số luận văn từng khoá
            const canvasThesesChart = document.getElementById('theseChart');
            const canvasCreativeChart = document.getElementById('creativeChart');
            const canvasResearchChart = document.getElementById('researchChart');
            const optionThesesChart = {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Tổng số luận văn',
                        data: [],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                        }
                    },
                }
            };
            const optionCreativeChart = {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Tổng số ý tưởng',
                        data: dataChartCreative,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            const dataRe = {
                labels: [],
                datasets: [{
                        label: 'NCKH Sinh Viên',
                        data: [],
                    },
                    {
                        label: 'NCKH Cơ sở',
                        data: [],
                    }
                ]
            };
            const optionResearchChart = {
                type: 'bar',
                data: dataRe,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    }
                },
            };
            // setTimeout(() => {

            chartTheses = new Chart(canvasThesesChart, optionThesesChart);
            chartCreative = new Chart(canvasCreativeChart, optionCreativeChart);
            chartResearch = new Chart(canvasResearchChart, optionResearchChart);

            function removeData(chart) {
                let total = chart.data.labels.length;
                while (total >= 0) {
                    chart.data.labels.pop();
                    chart.data.datasets[0].data.pop();
                    total--;
                }
                chart.update();
            }

            function addMultipleData(chart, dataInput) {
                const data = chart.data;
                if (data.datasets.length > 0) {
                    data.labels = Utils.months({
                        count: data.labels.length + 1
                    });

                    for (let index = 0; index < data.datasets.length; ++index) {
                        data.datasets[index].data.push(dataInput);
                    }

                    chart.update();
                }
            }

            function removeMultipleData(chart) {
                chart.data.labels.splice(-1, 1); // remove the label first

                chart.data.datasets.forEach(dataset => {
                    dataset.data.pop();
                });

                chart.update();
            }

            function addData(chart, label, data) {
                chart.data.labels.push(label);
                chart.data.datasets.forEach((dataset) => {
                    dataset.data.push(data);
                });
                chart.update();
            }

            function getDataTheseChart() {
                let fromSchoolYear = $('#fromSchoolYear').val();
                let toSchoolYear = $('#toSchoolYear').val();
                if (parseInt(toSchoolYear) < parseInt(fromSchoolYear)) {
                    Swal.fire(
                        'Thông báo',
                        `Bộ lọc từ 'K${fromSchoolYear}' đến 'K${toSchoolYear}' không hợp lệ!`,
                        'error'
                    )
                    return;
                }
                removeData(chartTheses);

                $.ajax({
                    type: "get",
                    url: "{{ route('api.home.dataThesesChart') }}",
                    data: {
                        fromSchoolYear: fromSchoolYear,
                        toSchoolYear: toSchoolYear,
                    },
                    dataType: "json",
                    success: function(response) {
                        let dataRes = response.data;
                        setTimeout(() => {
                            Object.keys(dataRes).forEach((element, index) => {
                                addData(chartTheses, element, Object.values(
                                    dataRes)[
                                    index]);
                            });
                        }, 300);
                    }
                });
            }
            getDataTheseChart();

            function getDataCreativeChart() {
                let total_year_recent = $('#select-creative-chart').val();
                removeData(chartCreative);
                $.ajax({
                    type: "get",
                    url: "{{ route('api.home.dataCreativeChart') }}",
                    data: {
                        total_year_recent: total_year_recent,
                    },
                    dataType: "json",
                    success: function(response) {
                        let dataRes = response.data;
                        setTimeout(() => {
                            Object.keys(dataRes).forEach((element, index) => {
                                addData(chartCreative, element, Object.values(
                                    dataRes)[
                                    index]);
                            });
                        }, 100);
                    }
                });
            }
            getDataCreativeChart();

            $(document).on('change', '#select-creative-chart', () => {
                getDataCreativeChart();
            });

            function getDataResearchChart() {
                let total_year_recent = $('#select-research-chart').val();
                // removeData(chartResearch);
                $.ajax({
                    type: "get",
                    url: "{{ route('api.home.dataResearchChart') }}",
                    data: {
                        total_year_recent: total_year_recent,
                    },
                    dataType: "json",
                    success: function(response) {
                        let dataResCreative = response.data;
                        setTimeout(() => {
                            chartResearch.data.labels = Object.keys(dataResCreative.basic);
                            chartResearch.data.datasets[0].data = Object.values(
                                dataResCreative.student);
                            chartResearch.data.datasets[1].data = Object.values(dataResCreative
                                .basic);
                            chartResearch.update();
                        }, 500);
                    }
                });
            }
            getDataResearchChart();

            $(document).on('change', '#select-research-chart', () => {
                getDataResearchChart();
                // removeMultipleData(chartResearch);
            });

            //thống kế số sinh viên


        });
    </script>
@endpush
