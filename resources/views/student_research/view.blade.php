@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">
                        <span class="fw-bold" style="font-size: 18px">Đề tài: </span>
                        <span style="font-size: 18px" class="text-primary">
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
                                <span class="text-primary">
                                    {{ $studentresearch->year }}
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
                                            {{ $studentresearch->lecturer->name }}
                                        </span>
                                    </li>
                                    <li>
                                        Mã giảng viên: 
                                        <span class="text-primary">
                                            {{ $studentresearch->lecturer->code }}
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
                                    Kết quả :
                                </span>
                                <span class="text-primary">
                                    {{ $studentresearch->result }}
                                </span>
                            </p>
                        </div>
                        <div class="col-12 col-md-7">

                            <p class="card-text">
                                <span class="fw-bold">
                                    Nơi lưu trữ :
                                </span>
                                <span class="text-primary">
                                    {{ $studentresearch->storage_location }}
                                </span>
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Người lưu trữ :
                                </span>
                                <span class="text-primary">
                                    {{ $studentresearch->archivist }}
                                </span>
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Tóm tắt nội dung :
                                </span>
                                <span class="text-primary">
                                    {!!$studentresearch->content !!}
                                </span>
                                
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="col col-lg-12 m-auto">
                            @if (!empty($studentresearch->file))
                                @switch($studentresearch->extension_file)
                                    @case('jpg')
                                    @case('png')

                                    @case('img')
                                    <div class="row d-flex justify-content-center ">
                                        <div class="col col-lg-6 ">

                                            <img class="w-100 h-100" src="{{ url('/uploads/storage/' . $studentresearch->file) }}"
                                            alt="" srcset="">
                                        </div>
                                    </div>
                                        
                                    @break

                                    @case('doc')
                                    @case('docx')
                                        <iframe class="w-100 h-100"
                                            src="https://docs.google.com/gview?url={{ url('/uploads/storage/' . $studentresearch->file) }}&embedded=true"></iframe>
                                    @break

                                    @case('pdf')
                                        <embed class="w-100 h-100" src="{{ url('/uploads/storage/' . $studentresearch->file) }}"
                                            width="100%" style="height: auto; min-height: 800px;" />
                                    @break

                                    @default
                                @endswitch
                                <br>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4 text-start">
                            <a href="javascript:history.back()"><i class='bx bx-arrow-back'></i>Trở lại</a>
                        </div>
                        @if (!empty($studentresearch->file))
                            <div class="col-8 text-end">
                                <a href="{{ asset('/uploads/storage/' . $studentresearch->file) }}">
                                    <i class='bx bxs-download'></i>
                                    Tải xuống file {{ '.' . $studentresearch->extension_file }}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
