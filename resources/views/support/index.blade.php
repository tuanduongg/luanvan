@extends('layout.master')

@section('content')
    <section class="section contact">
        <h1>Gửi phản hồi ý kiến cá nhân</h1>
        <div class="row gy-4">
            <div class="col">
                <div class="card p-4">
                    <form action="#" method="post" class="php-email-form">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Tên của bạn"
                                    required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Email"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Tiêu đề"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Nội dung" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-end">

                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section>
@endsection
