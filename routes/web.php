<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    return view('home.index');
})->name('home')->middleware('auth');

//authentication
Route::group(
    [
        'prefix' => 'auth',
        
    ],
    function () {
        Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
        Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
        Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    }
);


Route::get('/giang-vien', function () {
    return view('lecturer.index');
})->name('lecturer');
Route::get('/cong-van', function () {
    return view('official_dispatch.index');
});
Route::get('/luan-van', function () {
    return view('theses.index');
})->name('theses');

Route::get('/nghien-cuu-khoa-hoc', function () {
    return view('scientific_research.index');
});
Route::get('/sinh-vien', function () {
    return view('student.index');
})->name('student');

Route::get('/loai-cong-van', function () {
    return view('dispatch_type.index');
});

Route::get('/y-tuong-sang-tao', function () {
    return view('creative_idea.index');
})->name('creative_idea');
