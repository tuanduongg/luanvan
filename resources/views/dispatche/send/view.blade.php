@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class='bx bx-link-alt' style="font-size: 23px;"></i>
                        <span class="fw-bold ms-2 me-2 " style="font-size: 20px;">
                            Công văn {{ $dispatche->role == 1 ? 'đến' : 'đi' }} số:
                            <span class="text-primary">

                                {{ $dispatche->code }}
                            </span>
                        </span>
                    </div>
                    <hr>
                    <div class="row">
                        <span class="fw-bold d-inline" style="font-size: 20px">
                            <i style="font-size: 20px" class='bx bxs-bookmark-alt'></i>
                            Tiêu đề: 
                            <span class="fw-normal text-primary" style="font-size: 17px;">
                                {{ $dispatche->tittle }}
                            </span>
                        </span>
                    </div>
                    <hr>
                    <div class="row mb-2">
                        <div class="fw-bold d-flex align-items-center">
                            <i style="font-size: 20px;" class='bx bxs-info-circle'></i>
                            <span style="font-size: 20px;" class="ms-2">
                                Thông tin chung
                            </span>
                        </div>
                    </div>
                    <div class="row ms-3">
                        <div class="col-lg-10 col-12">
                            <div class="row mb-2">
                                <div class="col-lg-2 col-md-3 col-xs-12">

                                    <span>
                                        Người ký :
                                    </span>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-12 text-primary">
                                    {{ $dispatche->signer }}
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-12">
                                    <span>
                                        Ngày ký:
                                    </span>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-12 text-primary">
                                    {{ date('d/m/Y', strtotime($dispatche->sign_date)) }}
                                </div>
                            </div>
                           
                            <div class="row mb-2">
                                <div class="col-lg-2 col-md-3 col-xs-12">

                                    <span>
                                        Nơi ban hành :
                                    </span>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-12 text-primary">
                                    {{ $dispatche->published_place }}
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-12">
                                    <span>
                                        Ngày ban hành:
                                    </span>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-12 text-primary">
                                    {{ date('d/m/Y', strtotime($dispatche->issued_date)) }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-2 col-md-3 col-xs-12">

                                    <span>
                                        Ngày hiệu lực :
                                    </span>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-12 text-primary">
                                    {{ date('d/m/Y', strtotime($dispatche->effective_date)) }}
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-12">
                                    <span>
                                        Ngày hết hiệu lực:
                                    </span>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-12 text-primary">
                                    {{ date('d/m/Y', strtotime($dispatche->expiration_date)) }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-2 col-md-3 col-xs-12">

                                    <span>
                                        Nơi lưu trữ :
                                    </span>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-12 text-primary">
                                    {{ $dispatche->storage_location }}
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-12">
                                    <span>
                                        Người lưu trữ:
                                    </span>
                                </div>
                                <div class="col-lg-2 col-md-3 col-xs-12 text-primary">
                                    {{ $dispatche->archivist }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="fw-bold d-flex align-items-center">
                            <i class='bx bx-align-left' style="font-size: 20px;"></i>
                            <span style="font-size: 20px;" class="ms-2">
                                Tóm tắt nội dung
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col ms-3">
                            <span class="text-primary">
                                {!! $dispatche->content !!}
                                {{-- {{ $dispatche->content }} --}}
                            </span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col col-lg-10 m-auto">
                            @if (!empty($dispatche->file))
                                @switch($dispatche->extension_file)
                                    @case('jpg')
                                    @case('png')

                                    @case('img')
                                        <img class="w-100 h-100" src="{{ url('/uploads/storage/' . $dispatche->file) }}"
                                            alt="" srcset="">
                                    @break

                                    @case('doc')
                                    @case('docx')
                                        <iframe class="w-100 h-100"
                                            src="https://docs.google.com/gview?url={{ url('/uploads/storage/' . $dispatche->file) }}&embedded=true"></iframe>
                                    @break

                                    @case('pdf')
                                        <embed class="w-100 h-100" src="{{ url('/uploads/storage/' . $dispatche->file) }}"
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
                        @if (!empty($dispatche->file))
                            <div class="col-8 text-end">
                                <a href="{{ asset('/uploads/storage/' . $dispatche->file) }}">
                                    <i class='bx bxs-download'></i>
                                    Tải xuống file {{ '.' . $dispatche->extension_file }}
                                </a>
                            </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
