@extends('errors.layout')

@section('code', '500')
@section('title', __('Server Error'))

@section('image')
    <div style="background-image: url('{{ asset('dist/img/errors/page-misc-error-light.png')}}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __('Server Error'))