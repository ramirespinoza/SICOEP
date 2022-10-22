<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\CnbLevelController;


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


Route::post('student', [StudentController::class, 'store'])->name('api.student.create');

Route::put('student/{id}', [StudentController::class, 'update'])->name('api.student.update');

Route::delete('student/{id}', [StudentController::class, 'destroy'])->name('api.student.delete');

Route::get('student/{id}', [StudentController::class, 'show'])->name('api.student.show');

Route::get('student', [StudentController::class, 'read'])->name('api.student.get');



Route::post('school', [SchoolController::class, 'store'])->name('api.school.create');

Route::put('school/{id}', [SchoolController::class, 'update'])->name('api.school.update');

Route::delete('school/{id}', [SchoolController::class, 'destroy'])->name('api.school.delete');

Route::get('school/{id}', [SchoolController::class, 'show'])->name('api.school.show');

Route::get('school', [SchoolController::class, 'read'])->name('api.school.get');

Route::middleware('api')->group(function () {
    Route::resource('CnbLevel', CnbLevelController::class);
});


Route::middleware('api')->group(function () {
    Route::resource('professors', ProfessorController::class);
});
