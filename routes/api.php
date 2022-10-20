<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SchoolController;

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




Route::post('course', [CourseController::class, 'store'])->name('api.course.create');

Route::put('course/{id}', [CourseController::class, 'update'])->name('api.course.update');

Route::delete('course/{id}', [CourseController::class, 'destroy'])->name('api.course.delete');

Route::get('course/{id}', [CourseController::class, 'show'])->name('api.course.show');

Route::get('course', [CourseController::class, 'read'])->name('api.course.get');



Route::post('school', [SchoolController::class, 'store'])->name('api.school.create');

Route::put('school/{id}', [SchoolController::class, 'update'])->name('api.school.update');

Route::delete('school/{id}', [SchoolController::class, 'destroy'])->name('api.school.delete');

Route::get('school/{id}', [SchoolController::class, 'show'])->name('api.school.show');

Route::get('school', [SchoolController::class, 'read'])->name('api.school.get');




Route::middleware('api')->group(function () {
    Route::resource('professors', ProfessorController::class);
});

Route::post     ('activity',        [ActivityController::class, 'store'])->   name('api.course.create');

Route::put      ('activity/{id}',   [ActivityController::class, 'update'])->  name('api.course.update');

Route::delete   ('activity/{id}',   [ActivityController::class, 'destroy'])-> name('api.course.delete');

Route::get      ('activity/{id}',   [ActivityController::class, 'show'])->    name('api.course.show');

Route::get      ('activity',        [ActivityController::class, 'read'])->    name('api.course.get');

