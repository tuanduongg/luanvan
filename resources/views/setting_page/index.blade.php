@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-6">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Tài liệu hệ thống</h5>
                    <ol>
                        <li>
                            <a href="{{asset('uploads/storage/mau_luan_van_ium.xlsx')}}">Mẫu file nhập excel luân văn</a>
                        </li>
                        <li>
                            <a href="{{asset('uploads/storage/mau_cong_van_den_ium.xlsx')}}">Mẫu file nhập excel công văn đến</a>
                        </li>
                        <li>
                            <a href="{{asset('uploads/storage/mau_cong_van_di_ium.xlsx')}}">Mẫu file nhập excel công văn đi</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
