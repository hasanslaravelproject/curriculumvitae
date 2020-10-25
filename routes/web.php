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
    return view('welcome');
});
//student:
Route::get('students', [\App\Http\Controllers\StudentController::class, 'index']);
Route::post('students/create', [\App\Http\Controllers\StudentController::class, 'create']);
Route::get('students/edit/{id}', [\App\Http\Controllers\StudentController::class, 'edit']);
Route::post('students/update', [\App\Http\Controllers\StudentController::class, 'update']);
Route::post('students/delete', [\App\Http\Controllers\StudentController::class, 'delete']);
Route::get('students/status/{id}', [\App\Http\Controllers\StudentController::class, 'status']);

//student Details:
Route::get('studentdetail', [\App\Http\Controllers\FamilyInfoController::class, 'index']);
Route::post('studentdetail/create', [\App\Http\Controllers\StudentdetailController::class, 'create']);
Route::get('studentdetail/edit/{id}', [\App\Http\Controllers\StudentdetailController::class, 'edit']);
Route::post('studentdetail/update', [\App\Http\Controllers\StudentdetailController::class, 'update']);
Route::post('studentdetail/delete', [\App\Http\Controllers\StudentdetailController::class, 'delete']);
Route::get('studentdetail/status/{id}', [\App\Http\Controllers\StudentController::class, 'status']);

//family
Route::get('family', [\App\Http\Controllers\FamilyInfoController::class, 'index']);
Route::post('family/create', [\App\Http\Controllers\FamilyInfoController::class, 'create']);
Route::get('family/edit/{id}', [\App\Http\Controllers\FamilyInfoController::class, 'edit']);
Route::post('family/update', [\App\Http\Controllers\FamilyInfoController::class, 'update']);
Route::post('family/delete', [\App\Http\Controllers\FamilyInfoController::class, 'delete']);
Route::get('family/status/{id}', [\App\Http\Controllers\FamilyInfoController::class, 'status']);
//all
Route::get('all', [\App\Http\Controllers\AllController::class, 'index']);
Route::post('all/create', [\App\Http\Controllers\AllController::class, 'create']);
Route::get('all/edit/{id}', [\App\Http\Controllers\AllController::class, 'edit']);
Route::post('all/update', [\App\Http\Controllers\AllController::class, 'update']);
Route::post('all/delete', [\App\Http\Controllers\AllController::class, 'delete']);
Route::get('all/status/{id}', [\App\Http\Controllers\AllController::class, 'status']);

