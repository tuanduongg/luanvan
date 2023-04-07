@extends('errors.layout')

@section('code', '404')
@section('title', __('Not Found'))

@section('image')
    <div style="background-image: url('{{ asset('dist/img/errors/page-misc-error-light.png')}}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __('Page Not Found'))