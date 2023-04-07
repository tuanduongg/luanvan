<?php

use App\Http\Controllers\ProfileController;
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
    return view('home.index',['tittlePage' => '- Trang Chủ']);
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

//giảng viên
Route::get('/giang-vien', function () {
    return view('lecturer.index',['tittlePage' => '- Giảng Viên',]);
})->name('lecturer');
//công văn đến
Route::group(
    [
        'prefix' => 'cong-van-den',
        'middleware' =>'auth',

    ],
    function () {

        Route::get('/',[App\Http\Controllers\DispatcheController::class,'index'])->name('dispatche.receive');
        Route::get('/{id}',[App\Http\Controllers\DispatcheController::class, 'show'])->name('dispatche.receive.view');
    }
);
Route::group(
    [
        'prefix' => 'cong-van-di',
        'middleware' =>'auth',

    ],
    function () {

        Route::get('/',[App\Http\Controllers\DispatcheController::class,'dispatcheSend'])->name('dispatche.send');
        Route::get('/{id}',[App\Http\Controllers\DispatcheController::class, 'dispatcheSendShow'])->name('dispatche.send.view');
    }
);
// Route::get('/cong-van-den', [App\Http\Controllers\DispatcheController::class,'index'])->name('dispatche.receive');
//công văn đi
// Route::get('/cong-van-di', function () {
//     return view('dispatche.send.index');
// });
//luận văn
Route::group(
    [
        'prefix' => 'luan-van',

    ],
    function () {

        Route::get('/', function () {
            return view('theses.index',['tittlePage' => '- Luận Văn Sinh Viên',]);
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
            return view('creative_idea.index',['tittlePage' => '- Ý Tưởng Sáng Tạo Khởi Nghiệp']);
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
            return view('student_research.index',['tittlePage' => '- Nghiên Cứu Khoa Học Sinh Viên',]);
        })->name('studentresearch');
        Route::get('/{id}',[App\Http\Controllers\StudentResearchController::class, 'show'])->name('studentresearch.view');
    }
);

Route::group(
    [
        'prefix' => 'nghien-cuu-khoa-hoc-co-so',

    ],
    function () {

        Route::get('/', function () {
            return view('basic_research.index',['tittlePage' => '- Nghiên Cứu Khoa Học Cơ Sở',]);
        })->name('basicresearch');
        Route::get('/{id}',[App\Http\Controllers\BasicResearchController::class, 'show'])->name('basicresearch.view');
    }
);

Route::get('/sinh-vien', function () {
    return view('student.index',['tittlePage' => '- Sinh Viên',]);
})->name('student');

Route::get('/loai-cong-van', function () {
    return view('dispatch_type.index',['tittlePage' => '- Loại Công Văn',]);
});
//profile
Route::group(
    [
        'prefix' => 'profile',
    ],
    function () {
        Route::post('/update', [ProfileController::class, 'update'])->name('api.profile.update');
    }
);
Route::get('/test-mail',[App\Http\Controllers\DispatcheController::class,'testMail']);