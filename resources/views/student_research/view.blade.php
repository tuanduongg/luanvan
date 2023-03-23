@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">
                        <span class="fw-bold" style="font-size: 18px">Đề tài: </span>
                        <span style="font-size: 18px">

                            {{ $studentresearch->tittle }}
                        </span>
                    </p>
                    <hr>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <p class="card-text">
                                <span class="fw-bold">
                                    Năm thực hiện :
                                </span>
                                {{ $studentresearch->year }}
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Giảng viên hướng dẫn :
                                </span>
                            <div class="ms-3">
                                <ul class="">
                                    <li>
                                        Họ và tên: {{ $studentresearch->lecturer->name }}
                                    </li>
                                    <li>
                                        Mã giảng viên: {{ $studentresearch->lecturer->code }}
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
                                    Kết quả :
                                </span>
                                {{ $studentresearch->result }}
                            </p>
                        </div>
                        <div class="col-12 col-md-7">

                            <p class="card-text">
                                <span class="fw-bold">
                                    Nơi lưu trữ :
                                </span>
                                {{ $studentresearch->storage_location }}
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Người lưu trữ :
                                </span>
                                {{ $studentresearch->archivist }}
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Tóm tắt nội dung :
                                </span>
                                {{ $studentresearch->content }}
                            </p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        @if (!empty($studentresearch->file))
                            @switch($studentresearch->extension_file)
                                @case('jpg')
                                @case('png')

                                @case('img')
                                    <img src="{{ url('/uploads/storage/' . $studentresearch->file) }}" alt="" srcset="">
                                @break

                                @case('doc')
                                @case('docx')
                                    <iframe src="https://docs.google.com/gview?url={{ url("/uploads/storage/" . $studentresearch->file) }}&embedded=true"></iframe>
                                @break

                                @case('pdf')
                                    <embed src="{{ url('/uploads/storage/' . $studentresearch->file) }}" width="100%" style="height: auto; min-height: 800px;" />
                                @break

                                @default
                            @endswitch
                            <br>
                        @endif
                    </div>
                    <div class="row mt-3">
                        <div class="col text-end">
                            <a href="{{ asset("/uploads/storage/" . $studentresearch->file) }}" class="btn-sm" role="button" aria-pressed="true">
                                <i class='bx bxs-download'></i>
                                Tải Xuống

                            </a>
                            {{-- <a class="btn btn-outline-secondary me-2 btn-sm">
                                <span class="tf-icons bx bxs-download me-1"></span> Tải xuống
                            </a> --}}
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
