@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">
                        <span class="fw-bold" style="font-size: 18px">Đề tài: </span>
                        <span style="font-size: 18px">

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
                                {{ date('d-m-Y', strtotime($creativeidea->start_date)) }}
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Giảng viên hướng dẫn :
                                </span>
                            <div class="ms-3">
                                <ul class="">
                                    <li>
                                        Họ và tên: {{ $creativeidea->lecturer->name }}
                                    </li>
                                    <li>
                                        Mã giảng viên: {{ $creativeidea->lecturer->code }}
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
                                            Họ và tên: {{ $student->student_name }}
                                        </li>
                                        <li>
                                            Mã sinh viên: {{ $student->student_code }}
                                        </li>
                                        <li>
                                            Lớp: {{ $student->student_class }}

                                        </li>
                                    </ul>
                                @empty
                                    <p>Không có dữ liệu</p>
                                @endforelse
                            </div>
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Niên khoá :
                                </span>
                                {{ $creativeidea->school_year }}
                            </p>
                        </div>
                        <div class="col-12 col-md-7">

                            <p class="card-text">
                                <span class="fw-bold">
                                    Nơi lưu trữ :
                                </span>
                                {{ $creativeidea->storage_location }}
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Người lưu trữ :
                                </span>
                                {{ $creativeidea->archivist }}
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Tóm tắt nội dung :
                                </span>
                                {{ $creativeidea->content }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
