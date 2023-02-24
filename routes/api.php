<?php

use App\Http\Controllers\Api\DispatchTypeController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    [
        'prefix' => 'dispatch-type'
    ],
    function () {
        Route::get('/get-all', [DispatchTypeController::class, 'getAll'])->name('api.dispatch-type.getAll');
        Route::get('/find', [DispatchTypeController::class, 'find'])->name('api.dispatch-type.find');
        Route::post('/store', [DispatchTypeController::class, 'store'])->name('api.dispatch-type.store');
        Route::put('/update', [DispatchTypeController::class, 'update'])->name('api.dispatch-type.update');
        Route::post('/distroy', [DispatchTypeController::class, 'distroy'])->name('api.dispatch-type.distroy');
    }
);
Route::group(
    [
        'prefix' => 'student'
    ],
    function () {
        Route::get('/get-all', [StudentController::class, 'getAll'])->name('api.student.getAll');
        Route::get('/find', [StudentController::class, 'find'])->name('api.student.find');
        Route::post('/store', [StudentController::class, 'store'])->name('api.student.store');
        Route::put('/update', [StudentController::class, 'update'])->name('api.student.update');
        Route::post('/distroy', [StudentController::class, 'distroy'])->name('api.student.distroy');
        Route::get('/filter', [StudentController::class, 'filter'])->name('api.student.filter');
    }
);
