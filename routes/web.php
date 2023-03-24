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
Route::group(
    [
        'prefix' => 'luan-van',

    ],
    function () {

        Route::get('/', function () {
            return view('theses.index');
        })->name('theses');
        Route::get('/{id}',[App\Http\Controllers\ThesesController::class, 'show'])->name('theses.view');
    }
);

Route::group(
    [
        'prefix' => 'y-tuong-sang-tao',

    ],
    function () {

        Route::get('/', function () {
            return view('creative_idea.index');
        })->name('creativeidea');
        Route::get('/{id}',[App\Http\Controllers\CreativeIdeaController::class, 'show'])->name('creativeidea.view');
    }
);

Route::group(
    [
        'prefix' => 'nghien-cuu-khoa-hoc-sinh-vien',

    ],
    function () {

        Route::get('/', function () {
            return view('student_research.index');
        })->name('studentresearch');
        Route::get('/{id}',[App\Http\Controllers\StudentResearchController::class, 'show'])->name('studentresearch.view');
    }
);

Route::group(
    [
        'prefix' => 'nghien-cuu-khoa-hoc-giang-vien',

    ],
    function () {

        Route::get('/', function () {
            return view('basic_research.index');
        })->name('basicresearch');
        Route::get('/{id}',[App\Http\Controllers\BasicResearchController::class, 'show'])->name('basicresearch.view');
    }
);

Route::get('/nghien-cuu-khoa-hoc', function () {
    return view('scientific_research.index');
});
Route::get('/sinh-vien', function () {
    return view('student.index');
})->name('student');

Route::get('/loai-cong-van', function () {
    return view('dispatch_type.index');
});

