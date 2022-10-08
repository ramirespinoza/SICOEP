<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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


Route::get('student', [StudentController::class, 'index'])->name('api.student.get');

Route::post('student/', [StudentController::class, 'store'])->name('api.student.create');

Route::put('student/{personal_code}', [StudentController::class, 'update'])->name('api.student.update');

Route::delete('student/{personal_code}', [StudentController::class, 'destroy'])->name('api.student.delete');