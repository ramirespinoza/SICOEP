<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ExamScheduleController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::resource('student', StudentController::class, ['except' => 'show', 'create', 'edit'])->middleware(['auth:sanctum', 'verified']);
Route::resource('school', SchoolController::class, ['except' => 'show', 'create', 'edit'])->middleware(['auth:sanctum', 'verified']);
Route::resource('course', CourseController::class, ['except' => 'show', 'create', 'edit'])->middleware(['auth:sanctum', 'verified']);
Route::resource('activity', ActivityController::class, ['except' => 'show', 'create', 'edit'])->middleware(['auth:sanctum', 'verified']);
Route::resource('exam_schedule', ExamScheduleController::class, ['except' => 'show', 'create', 'edit'])->middleware(['auth:sanctum', 'verified']);


