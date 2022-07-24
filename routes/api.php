<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\admin\ResultManageController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {


//    route::get('BasicUser/getproduct',[DefaultController::class,'getPorudct'])->name('getPorudct');

    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);


    Route::post('me', [AuthController::class,'me']);

    route::get('/department-all', [DepartmentController::class,'DepartmentAll']);
    route::post('/department-post', [DepartmentController::class,'DepartmentPost']);
    route::post('/department-update', [DepartmentController::class,'DepartmentUpdate']);
    route::get('/department-edit/{id}', [DepartmentController::class,'DepartmentEdit']);
    route::get('/department-delete/{id}',[DepartmentController::class,'DepartmentDelete']);

    //---------------Student Manage--------
    route::get('/student-all', [StudentController::class,'StudentAll']);
    route::post('/student-post', [StudentController::class,'StudentPost']);
    route::post('/student-update', [StudentController::class,'StudentUpdate']);
    route::get('/student-edit/{id}', [StudentController::class,'StudentEdit']);
    route::get('/student-delete/{id}',[StudentController::class,'StudentDelete']);
    route::get('/department-dataview',[StudentController::class,'DepartmentDataView']);

        //---------------Result Manage--------
        route::get('/result-all', [ResultManageController::class,'ResultAll']);
        route::post('/result-post', [ResultManageController::class,'ResultPost']);
        route::post('/result-update', [ResultManageController::class,'ResultUpdate']);
        route::get('/result-edit/{id}', [ResultManageController::class,'ResultEdit']);
        route::get('/result-delete/{id}',[ResultManageController::class,'ResultDelete']);
        route::get('/student-dataview',[ResultManageController::class,'StudentDataView']);



    // Route::get('admin_home', 'AuthController@me');
});
