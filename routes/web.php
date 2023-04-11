<?php

use App\Http\Controllers\Api\LecturerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DispatcheController;
use App\Http\Controllers\HomeController;
use App\Models\Lecturer;

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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

//authentication
Route::group(
    [
        'prefix' => 'auth',

    ],
    function () {
        Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
        Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
        Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
    }
);

//giảng viên
Route::get('/giang-vien', function () {
    return view('lecturer.index', ['tittlePage' => '- Giảng Viên',]);
})->name('lecturer')->middleware(['auth']);
//công văn đến
Route::group(
    [
        'prefix' => 'cong-van-den',
        'middleware' => 'auth',

    ],
    function () {

        Route::get('/', [App\Http\Controllers\DispatcheController::class, 'index'])->name('dispatche.receive');
        Route::get('/{id}/{slug}', [App\Http\Controllers\DispatcheController::class, 'show'])->name('dispatche.receive.view');
    }
);
Route::group(
    [
        'prefix' => 'cong-van-di',
        'middleware' => 'auth',

    ],
    function () {

        Route::get('/', [App\Http\Controllers\DispatcheController::class, 'dispatcheSend'])->name('dispatche.send');
        Route::get('/{id}/{slug}', [App\Http\Controllers\DispatcheController::class, 'dispatcheSendShow'])->name('dispatche.send.view');
    }
);
//luận văn
Route::group(
    [
        'prefix' => 'luan-van',
        'middleware' => 'auth',

    ],
    function () {

        Route::get('/', [App\Http\Controllers\ThesesController::class, 'index'])->name('theses');
        Route::get('/{id}/{slug}', [App\Http\Controllers\ThesesController::class, 'show'])->name('theses.view')->where([
            'id' => '[0-9]+',
            'slug' => '[a-z0-9-]+'
        ]);
    }
);

Route::group(
    [
        'prefix' => 'y-tuong-sang-tao',
        'middleware' => 'auth',

    ],
    function () {

        Route::get('/', function () {
            return view('creative_idea.index', ['tittlePage' => '- Ý Tưởng Sáng Tạo Khởi Nghiệp']);
        })->name('creativeidea');
        Route::get('/{id}/{slug}', [App\Http\Controllers\CreativeIdeaController::class, 'show'])->name('creativeidea.view');
    }
);

Route::group(
    [
        'prefix' => 'nghien-cuu-khoa-hoc-sinh-vien',
        'middleware' => 'auth',

    ],
    function () {

        Route::get('/', function () {
            return view('student_research.index', ['tittlePage' => '- Nghiên Cứu Khoa Học Sinh Viên',]);
        })->name('studentresearch');
        Route::get('/{id}/{slug}', [App\Http\Controllers\StudentResearchController::class, 'show'])->name('studentresearch.view');
    }
);

Route::group(
    [
        'prefix' => 'nghien-cuu-khoa-hoc-co-so',
        'middleware' => 'auth',

    ],
    function () {

        Route::get('/', function () {
            return view('basic_research.index', ['tittlePage' => '- Nghiên Cứu Khoa Học Cơ Sở',]);
        })->name('basicresearch');
        Route::get('/{id}/{slug}', [App\Http\Controllers\BasicResearchController::class, 'show'])->name('basicresearch.view');
    }
);

Route::get('/sinh-vien', function () {
    return view('student.index', ['tittlePage' => '- Sinh Viên',]);
})->name('student')->middleware(['auth','checkphokhoa']);

Route::get('/loai-cong-van', function () {
    return view('dispatch_type.index', ['tittlePage' => '- Loại Công Văn',]);
})->middleware('auth')->name('dispatche_type');
//profile
Route::group(
    [
        'prefix' => 'profile',
        'middleware' => 'auth'
    ],
    function () {
        Route::post('/update', [ProfileController::class, 'update'])->name('api.profile.update');
    }
);
Route::view('/support','support.index')->name('support');


