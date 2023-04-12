@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">
                        <span class="fw-bold" style="font-size: 18px">Đề tài: </span>
                        <span style="font-size: 18px" class="text-primary">

                            {{ $theses->tittle }}
                        </span>
                    </p>
                    <hr>

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <p class="card-text">
                                <span class="fw-bold">
                                    Mã luận văn :
                                </span>
                                <span class="text-primary">
                                    {{ $theses->code }} 
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
                                            {{ $theses->lecturer->name }}
                                        </span>
                                    </li>
                                    <li>
                                        Mã giảng viên: 
                                        <span class="text-primary">
                                            {{ $theses->lecturer->code }}
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
                            
                        </div>
                        <div class="col-12 col-md-7">
                            <p class="card-text">
                                <span class="fw-bold">
                                    Thời gian :
                                </span>
                                <span class="text-primary">
                                    {{ date('d-m-Y', strtotime($theses->start_date)) }} 
                                </span>
                                đến
                                <span class="text-primary">
                                    {{ date('d-m-Y', strtotime($theses->end_date)) }}
                                </span>
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Niên khoá :
                                </span>
                                <span class="text-primary">
                                    {{ $theses->school_year }}
                                    {{-- {{ dd($theses->format_school_year) }} --}}
                                    {{ '('. $theses->format_school_year[0] .'-'. $theses->format_school_year[count($theses->format_school_year)-1].')' }}
                                </span>
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Nơi lưu trữ :
                                </span>
                                <span class="text-primary">
                                    {{ $theses->storage_location }}
                                </span>
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Người lưu trữ :
                                </span>
                                <span class="text-primary">
                                    {{ $theses->archivist }}
                                </span>
                            </p>
                            <p class="card-text">
                                <span class="fw-bold">
                                    Tóm tắt nội dung :
                                </span>
                                <span class="text-primary">
                                    {!! $theses->content !!}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col col-lg-12 m-auto">
                            @if (!empty($theses->file))
                                @switch($theses->extension_file)
                                    @case('jpg')
                                    @case('png')

                                    @case('img')
                                        <img class="w-100 h-100" src="{{ url('/uploads/storage/' . $theses->file) }}" alt="" srcset="">
                                    @break

                                    @case('doc')
                                    @case('docx')
                                        <iframe class="w-100 h-100"
                                            src="https://docs.google.com/gview?url={{ url('/uploads/storage/' . $theses->file) }}&embedded=true"></iframe>
                                    @break

                                    @case('pdf')
                                    <embed class="w-100 h-100" src="{{ url('/uploads/storage/' . $theses->file) }}" width="100%"
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
                        @if (!empty($theses->file))
                            <div class="col-8 text-end">
                                <a href="{{ asset('/uploads/storage/' . $theses->file) }}">
                                    <i class='bx bxs-download'></i>
                                    Tải xuống file {{ '.' . $theses->extension_file }}
                                </a>
                            </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // var currentUrl = window.location.href;
        // var id = currentUrl.split('/').at(-1);
        // history.pushState({}, null, `/${id}/test`);
        // console.log(id);
    </script>
@endpush
