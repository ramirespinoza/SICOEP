<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ExamScheduleController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\CnbLevelController;
use App\Http\Controllers\DashboardController;


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

Route::get('student', [StudentController::class, 'read'])->name('api.student.get');//->middleware('auth:sanctum');

//Route::get('students_by_school', [\App\Http\Controllers\DashboardController::class, 'students_by_school'])->name('api.students_by_school');


Route::get('students_by_school', [DashboardController::class, 'students_by_school'])->name('api.students_by_school');
Route::get('students_by_department_municipality', [DashboardController::class, 'students_by_department_municipality'])->name('api.test1');
Route::get('students_by_professor', [DashboardController::class, 'students_by_professor'])->name('api.test1');


Route::get('test2', [DashboardController::class, 'test2'])->name('api.test2');



Route::post('course', [CourseController::class, 'store'])->name('api.course.create');
Route::put('course/{id}', [CourseController::class, 'update'])->name('api.course.update');
Route::delete('course/{id}', [CourseController::class, 'destroy'])->name('api.course.delete');
Route::get('course/{id}', [CourseController::class, 'show'])->name('api.course.show');
Route::get('course', [CourseController::class, 'read'])->name('api.course.get');



Route::get('municipality/{id}', [MunicipalityController::class, 'show'])->name('api.municipality.show');




Route::post('school', [SchoolController::class, 'store'])->name('api.school.create');

Route::put('school/{id}', [SchoolController::class, 'update'])->name('api.school.update');

Route::delete('school/{id}', [SchoolController::class, 'destroy'])->name('api.school.delete');

Route::get('school/{id}', [SchoolController::class, 'show'])->name('api.school.show');

Route::get('school', [SchoolController::class, 'read'])->name('api.school.get');

Route::middleware('api')->group(function () {
    Route::resource('CnbLevel', CnbLevelController::class);
});



Route::post('exam_schedule', [ExamScheduleController::class, 'store'])->name('api.exam_schedule.create');
Route::put('exam_schedule/{id}', [ExamScheduleController::class, 'update'])->name('api.exam_schedule.update');
Route::delete('exam_schedule/{id}', [ExamScheduleController::class, 'destroy'])->name('api.exam_schedule.delete');
Route::get('exam_schedule/{id}', [ExamScheduleController::class, 'show'])->name('api.exam_schedule.show');
Route::get('exam_schedule', [ExamScheduleController::class, 'read'])->name('api.exam_schedule.get');



//Route::middleware('api')->group(function () {
//    Route::resource('professors', ProfessorController::class);
//});

Route::post     ('activity',        [ActivityController::class, 'store'])->   name('api.course.create');

Route::put      ('activity/{id}',   [ActivityController::class, 'update'])->  name('api.course.update');

Route::delete   ('activity/{id}',   [ActivityController::class, 'destroy'])-> name('api.course.delete');

Route::get      ('activity/{id}',   [ActivityController::class, 'show'])->    name('api.course.show');

Route::get      ('activity',        [ActivityController::class, 'read'])->    name('api.course.get');


Route::get      ('departament',        [DepartamentController::class, 'read'])->    name('api.departament.get');


Route::post('professor', [ProfessorController::class, 'store'])->name('api.professor.create');
Route::put('professor/{id}', [ProfessorController::class, 'update'])->name('api.professor.update');
Route::delete('professor/{id}', [ProfessorController::class, 'destroy'])->name('api.professor.delete');
Route::get('professor/{id}', [ProfessorController::class, 'show'])->name('api.professor.show');
Route::get('professor', [ProfessorController::class, 'read'])->name('api.professor.get');
