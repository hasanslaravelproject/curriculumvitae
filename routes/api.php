<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('students', [\App\Http\Controllers\TestController::class, 'index']);
Route::get('students/{id}', [\App\Http\Controllers\TestController::class, 'getdetails']);
Route::post('students/create', [\App\Http\Controllers\StudentController::class, 'create']);
Route::get('students/edit/{id}', [\App\Http\Controllers\StudentController::class, 'edit']);
Route::post('students/update', [\App\Http\Controllers\StudentController::class, 'update']);
Route::post('students/delete', [\App\Http\Controllers\StudentController::class, 'delete']);
Route::get('students/status/{id}', [\App\Http\Controllers\StudentController::class, 'status']);
