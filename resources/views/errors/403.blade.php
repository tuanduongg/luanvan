@extends('errors.layout')

@section('code', '403')
@section('title', __('Forbidden'))

@section('image')
    <div style="background-image: url('{{ asset('dist/img/errors/page-misc-error-light.png')}}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __('Page Forbidden'))