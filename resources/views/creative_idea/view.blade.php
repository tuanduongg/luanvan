@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">
                        <span class="fw-bold" style="font-size: 18px">Đề tài: </span>
                        <span style="font-size: 18px" class="text-primary">
                            {{ $creativeidea->tittle }}
                        </span>
                    </p>
                    <hr>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <p class="card-text">
                                <span class="fw-bold">
                                    Thời gian bắt đầu :
                                </span>

                                <span class="text-primary">
                                    {{ date('d-m-Y', strtotime($creativeidea->start_date)) }}
                                </span>
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Giảng viên hướng dẫn :
                                </span>
                            <div class="ms-3">
                                <ul class="">
                                    <li>
                                        Họ và tên:
                                        <span class="text-primary">
                                            {{ $creativeidea->lecturer->name }}
                                        </span>

                                    </li>
                                    <li>
                                        Mã giảng viên:
                                        <span class="text-primary">
                                            {{ $creativeidea->lecturer->code }}
                                        </span>

                                    </li>
                                </ul>
                            </div>
                            {{-- Lê văn tuấn --}}
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Sinh viên thực hiện :
                                </span>
                            <div class="ms-3">
                                @forelse ($listStudent as $student)
                                    <ul class="">
                                        <li>
                                            Họ và tên:
                                            <span class="text-primary">
                                                {{ $student->student_name }}
                                            </span>

                                        </li>
                                        <li>
                                            Mã sinh viên:
                                            <span class="text-primary">
                                                {{ $student->student_code }}
                                            </span>

                                        </li>
                                        <li>
                                            Lớp:
                                            <span class="text-primary">
                                                {{ $student->student_class }}
                                            </span>


                                        </li>
                                    </ul>
                                @empty
                                    <p>Không có dữ liệu</p>
                                @endforelse
                            </div>
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Năm học:
                                </span>

                                <span class="text-primary">
                                    {{ $creativeidea->school_year }}
                                </span>

                            </p>
                        </div>
                        <div class="col-12 col-md-7">

                            <p class="card-text">
                                <span class="fw-bold">
                                    Nơi lưu trữ :
                                </span>

                                <span class="text-primary">
                                    {{ $creativeidea->storage_location }}
                                </span>

                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Người lưu trữ :
                                </span>

                                <span class="text-primary">
                                    {{ $creativeidea->archivist }}
                                </span>

                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Tóm tắt nội dung :
                                </span>
                                <span class="text-primary">
                                    {{ $creativeidea->content }}
                                </span>

                            </p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4 text-start">
                            <a href="javascript:history.back()"><i class='bx bx-arrow-back'></i>Trở lại</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
