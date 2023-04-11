@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">
                        <span class="fw-bold" style="font-size: 18px">Đề tài: </span>
                        <span style="font-size: 18px" class="text-primary">
                            {{ $basicresearch->tittle ?? '' }}
                        </span>
                    </p>
                    <hr>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <p class="card-text">
                                <span class="fw-bold ">
                                    Năm thực hiện :
                                </span>
                                
                                <span class="text-primary">
                                    {{ $basicresearch->year ?? '' }}
                                </span>
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Trưởng Nhóm :
                                </span>
                            <div class="ms-3">
                                <ul class="">
                                    <li>
                                        Họ và tên: 
                                        <span class="text-primary">
                                            {{ $leader->name ?? '' }}
                                        </span>
                                    </li>
                                    <li>
                                        Mã: 
                                        <span class="text-primary">
                                            {{ $leader->code ?? '' }}
                                        </span>
                                    </li>
                                    <li>
                                        Email: 
                                        <span class="text-primary">
                                            {{ $leader->email ?? '' }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            {{-- Lê văn tuấn --}}
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Thành viên :
                                </span>
                            <div class="ms-3">
                                @forelse ($listLecturers as $lecturer)
                                    <ul class="">
                                        <li>
                                            Họ và tên: 
                                            <span class="text-primary">
                                                {{ $lecturer->name ?? '' }}
                                            </span>
                                        </li>
                                        <li>
                                            Mã: 
                                            <span class="text-primary">
                                                {{ $lecturer->code ?? '' }}
                                            </span>
                                        </li>
                                        <li>
                                            Email: 
                                            <span class="text-primary">
                                                {{ $lecturer->email ?? '' }}
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

                                    {{ $basicresearch->result ?? '' }}
                                </span>
                            </p>
                        </div>
                        <div class="col-12 col-md-7">

                            <p class="card-text">
                                <span class="fw-bold">
                                    Nơi lưu trữ :
                                </span>
                                
                                <span class="text-primary">
                                    {{ $basicresearch->storage_location ?? '' }}
                                </span>
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Người lưu trữ :
                                </span>
                                
                                <span class="text-primary">
                                    {{ $basicresearch->archivist ?? '' }}
                                </span>
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Tóm tắt nội dung :
                                </span> 
                                <span class="text-primary">
                                    {{ $basicresearch->content ?? '' }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="col col-lg-6 m-auto">
                            @if (!empty($basicresearch->file))
                                @switch($basicresearch->extension_file)
                                    @case('jpg')
                                    @case('png')

                                    @case('img')
                                        <img class="w-100 h-100" src="{{ url('/uploads/storage/' . $basicresearch->file) }}" alt=""
                                            srcset="">
                                    @break

                                    @case('doc')
                                    @case('docx')
                                        <iframe class="w-100 h-100"
                                            src="https://docs.google.com/gview?url={{ url('/uploads/storage/' . $basicresearch->file) }}&embedded=true"></iframe>
                                    @break

                                    @case('pdf')
                                        <embed class="w-100 h-100" src="{{ url('/uploads/storage/' . $basicresearch->file) }}" width="100%"
                                            style="height: auto; min-height: 800px;" />
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
                        @if (!empty($basicresearch->file))
                        <div class="col-8 text-end">
                            <a href="{{ asset("/uploads/storage/" . $basicresearch->file) }}">
                                <i class='bx bxs-download'></i>
                                Tải xuống file {{'.' . $basicresearch->extension_file}}
                            </a>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
