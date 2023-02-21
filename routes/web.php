<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', function () {
    return view('layout.master');
});
Route::get('/user', function () {
    return view('user.index');
});
Route::get('/cong-van', function () {
    return view('official_dispatch.index');
});
Route::get('/luan-van', function () {
    return view('dissertation.index');
});
Route::get('/nghien-cuu-khoa-hoc', function () {
    return view('scientific_research.index');
});
Route::get('/sinh-vien', function () {
    return view('student.index');
});
Route::get('/loai-cong-van', function () {
    return view('dispatch_type.index');
});
