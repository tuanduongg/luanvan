<?php

use App\Http\Controllers\Api\CreativeIdeaController;
use App\Http\Controllers\Api\DispatchTypeController;
use App\Http\Controllers\Api\LecturerController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\ThesesController;
use App\Http\Controllers\Api\StudentResearchController;
use App\Http\Controllers\Api\BasicResearchController;
use App\Http\Controllers\Api\DispatcheController;
use App\Http\Controllers\Api\EventController;
use App\Models\BasicResearch;
use App\Repositories\DispatchType\DispatchTypeRepository;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(
    [
        'prefix' => 'home',
        'middleware' =>'authapi',
    ],
    function () {
        Route::get('/get-data/theses-chart', [\App\Http\Controllers\Api\HomeController::class, 'dataThesesChart'])->name('api.home.dataThesesChart');
        Route::get('/get-data/creative-chart', [\App\Http\Controllers\Api\HomeController::class, 'dataCreativeChart'])->name('api.home.dataCreativeChart');
        Route::get('/get-data/research-chart', [\App\Http\Controllers\Api\HomeController::class, 'dataResearchChart'])->name('api.home.dataResearchChart');
        Route::get('/get-data', [\App\Http\Controllers\Api\HomeController::class, 'getAllRecordEachTable'])->name('api.home.getAllRecordEachTable');
        
    }
);
Route::group(
    [
        'prefix' => 'dispatche',
        'middleware' =>'authapi',
    ],
    function () {
        Route::get('/get-all/{type}', [DispatcheController::class, 'getAll'])->name('api.dispatche.getAll');
        Route::get('/find', [DispatcheController::class, 'find'])->name('api.dispatche.find');
        Route::post('/store', [DispatcheController::class, 'store'])->name('api.dispatche.store');
        Route::post('/store-multiple/{type}', [DispatcheController::class, 'storeMultiple'])->name('api.dispatche.storeMultiple');
        Route::post('/update', [DispatcheController::class, 'update'])->name('api.dispatche.update');
        Route::post('/distroy', [DispatcheController::class, 'distroy'])->name('api.dispatche.distroy');
        Route::get('/filter/{type}', [DispatcheController::class, 'filter'])->name('api.dispatche.filter');
        Route::get('/get-codes', [DispatcheController::class, 'getAllCode'])->name('api.dispatche.getAllCode');
        Route::get('/check-code/{type}', [DispatcheController::class, 'checkCodeExist'])->name('api.dispatche.checkCodeExist');
        Route::get('/get-receive-by-week', [DispatcheController::class, 'getDispatcheReceiveByWeek'])->name('api.dispatche.getDispatcheReceiveByWeek');
    }
);

Route::group(
    [
        'prefix' => 'dispatch-type',
        'middleware' =>'authapi',
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
        'prefix' => 'student',
        'middleware' =>'authapi',
    ],
    function () {
        Route::get('/get-all', [StudentController::class, 'getAll'])->name('api.student.getAll');
        Route::get('/find', [StudentController::class, 'find'])->name('api.student.find');
        Route::post('/store', [StudentController::class, 'store'])->name('api.student.store');
        Route::put('/update', [StudentController::class, 'update'])->name('api.student.update');
        Route::post('/distroy', [StudentController::class, 'distroy'])->name('api.student.distroy');
        Route::get('/filter', [StudentController::class, 'filter'])->name('api.student.filter');
        Route::get('/select-two', [StudentController::class, 'selectTwo'])->name('api.student.select2');
        Route::get('/get-all-id', [StudentController::class, 'getAllId'])->name('api.student.getAllId');
    }
);
Route::group(
    [
        'prefix' => 'lecturer',
        'middleware' =>'authapi',
    ],
    function () {
        Route::get('/get-all', [LecturerController::class, 'getAll'])->name('api.lecturer.getAll');
        Route::get('/find', [LecturerController::class, 'find'])->name('api.lecturer.find');
        Route::post('/store', [LecturerController::class, 'store'])->name('api.lecturer.store');
        Route::put('/update', [LecturerController::class, 'update'])->name('api.lecturer.update');
        Route::post('/distroy', [LecturerController::class, 'distroy'])->name('api.lecturer.distroy');
        Route::get('/filter', [LecturerController::class, 'filter'])->name('api.lecturer.filter');
        Route::get('/select-two', [LecturerController::class, 'selectTwo'])->name('api.lecturer.select2');
        Route::get('/get-all-name', [LecturerController::class, 'getAllName'])->name('api.lecturer.getAllName');
    }
);
Route::group(
    [
        'prefix' => 'theses',
        'middleware' =>'authapi',
    ],
    function () {
        Route::get('/get-all', [ThesesController::class, 'getAll'])->name('api.theses.getAll');
        Route::get('/find', [ThesesController::class, 'find'])->name('api.theses.find');
        Route::post('/store', [ThesesController::class, 'store'])->name('api.theses.store');
        Route::post('/update', [ThesesController::class, 'update'])->name('api.theses.update');
        Route::post('/distroy', [ThesesController::class, 'distroy'])->name('api.theses.distroy');
        Route::get('/filter', [ThesesController::class, 'filter'])->name('api.theses.filter');
        Route::post('/store-multiple', [ThesesController::class, 'storeMultiple'])->name('api.theses.storeMultiple');
    }
);
Route::group(
    [
        'prefix' => 'creativeidea',
        'middleware' =>'authapi',
    ],
    function () {
        Route::get('/get-all', [CreativeIdeaController::class, 'getAll'])->name('api.creativeidea.getAll');
        Route::get('/find', [CreativeIdeaController::class, 'find'])->name('api.creativeidea.find');
        Route::post('/store', [CreativeIdeaController::class, 'store'])->name('api.creativeidea.store');
        Route::post('/update', [CreativeIdeaController::class, 'update'])->name('api.creativeidea.update');
        Route::post('/distroy', [CreativeIdeaController::class, 'distroy'])->name('api.creativeidea.distroy');
        Route::get('/filter', [CreativeIdeaController::class, 'filter'])->name('api.creativeidea.filter');
    }
);
Route::group(
    [
        'prefix' => 'studentresearch',
        'middleware' =>'authapi',
    ],
    function () {
        Route::get('/get-all', [StudentResearchController::class, 'getAll'])->name('api.studentresearch.getAll');
        Route::get('/find', [StudentResearchController::class, 'find'])->name('api.studentresearch.find');
        Route::post('/store', [StudentResearchController::class, 'store'])->name('api.studentresearch.store');
        Route::post('/update', [StudentResearchController::class, 'update'])->name('api.studentresearch.update');
        Route::post('/distroy', [StudentResearchController::class, 'distroy'])->name('api.studentresearch.distroy');
        Route::get('/filter', [StudentResearchController::class, 'filter'])->name('api.studentresearch.filter');
    }
);

Route::group(
    [
        'prefix' => 'basicresearch',
        'middleware' =>'authapi',
    ],
    function () {
        Route::get('/get-all', [BasicResearchController::class, 'getAll'])->name('api.basicresearch.getAll');
        Route::get('/find', [BasicResearchController::class, 'find'])->name('api.basicresearch.find');
        Route::post('/store', [BasicResearchController::class, 'store'])->name('api.basicresearch.store');
        Route::post('/update', [BasicResearchController::class, 'update'])->name('api.basicresearch.update');
        Route::post('/distroy', [BasicResearchController::class, 'distroy'])->name('api.basicresearch.distroy');
        Route::get('/filter', [BasicResearchController::class, 'filter'])->name('api.basicresearch.filter');
    }
);

Route::group(
    [
        'prefix' => 'event',
        'middleware' =>'authapi',
    ],
    function () {
        Route::get('/get-all', [EventController::class, 'getAll'])->name('api.event.getAll');
        Route::get('/find', [EventController::class, 'find'])->name('api.event.find');
        Route::post('/store', [EventController::class, 'store'])->name('api.event.store');
        Route::post('/update', [EventController::class, 'update'])->name('api.event.update');
        Route::post('/distroy', [EventController::class, 'distroy'])->name('api.event.distroy');
    }
);

