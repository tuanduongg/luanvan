@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">
                        <span class="fw-bold" style="font-size: 18px">Đề tài: </span>
                        <span style="font-size: 18px">

                            {{ $theses->tittle }}
                        </span>
                    </p>
                    <hr>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <p class="card-text">
                                <span class="fw-bold">
                                    Thời gian :
                                </span>
                                {{date('d-m-Y', strtotime($theses->start_date)) }} đến {{ date('d-m-Y', strtotime($theses->end_date)) }}
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Giảng viên hướng dẫn :
                                </span>
                            <div class="ms-3">
                                <ul class="">
                                    <li>
                                        Họ và tên: {{ $theses->lecturer->name }}
                                    </li>
                                    <li>
                                        Mã giảng viên: {{ $theses->lecturer->code }}
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
                                {{ $theses->school_year }}
                            </p>
                        </div>
                        <div class="col-12 col-md-7">

                            <p class="card-text">
                                <span class="fw-bold">
                                    Nơi lưu trữ :
                                </span>
                                {{ $theses->storage_location }}
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Người lưu trữ :
                                </span>
                                {{ $theses->archivist }}
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Tóm tắt nội dung :
                                </span>
                                {{ $theses->content }}
                            </p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        @if (!empty($theses->file))
                            @switch($theses->extension_file)
                                @case('jpg')
                                @case('png')

                                @case('img')
                                    <img src="{{ url('/uploads/storage/' . $theses->file) }}" alt="" srcset="">
                                @break

                                @case('doc')
                                @case('docx')
                                    <iframe src="https://docs.google.com/gview?url={{ url("/uploads/storage/" . $theses->file) }}&embedded=true"></iframe>
                                @break

                                @case('pdf')
                                    <embed src="{{ url('/uploads/storage/' . $theses->file) }}" width="100%" style="height: auto; min-height: 800px;" />
                                @break

                                @default
                            @endswitch
                            <br>
                        @endif
                    </div>
                    <div class="row mt-3">
                        <div class="col text-end">
                            <a href="{{ asset("/uploads/storage/" . $theses->file) }}" class="btn-sm" role="button" aria-pressed="true">
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
