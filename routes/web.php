<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Mark\MarkController;

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

Route::view('/', 'landing');
Route::view('/dashboard', 'dashboard');

/*
| route name: teachers
|
*/

Route::prefix('teachers')->namespace('teacher')->name('teachers.')->group(function () {
    Route::get('/',[TeacherController::class, 'index'])->name('index');
    Route::get('/create',[TeacherController::class, 'create'])->name('create');
    Route::post('/',[TeacherController::class, 'store'])->name('store');
    Route::get('/{teacher}/edit',[TeacherController::class, 'edit'])->name('edit');
    Route::put('/{teacher}',[TeacherController::class, 'update'])->name('update');
    Route::delete('/{teacher}',[TeacherController::class, 'destroy'])->name('delete');
});

/*
| route name: students
|
*/

Route::prefix('students')->namespace('Student')->name('students.')->group(function () {
    Route::get('/',[StudentController::class, 'index'])->name('index');
    Route::get('/create',[StudentController::class, 'create'])->name('create');
    Route::post('/',[StudentController::class, 'store'])->name('store');
    Route::get('/{student}/edit',[StudentController::class, 'edit'])->name('edit');
    Route::put('/{student}',[StudentController::class, 'update'])->name('update');
    Route::delete('/{student}',[StudentController::class, 'destroy'])->name('delete');
});

/*
| route name: Marks
|
*/

Route::prefix('marks')->namespace('Mark')->name('marks.')->group(function () {
    Route::get('/',[MarkController::class, 'index'])->name('index');
    Route::get('/create',[MarkController::class, 'create'])->name('create');
    Route::post('/',[MarkController::class, 'store'])->name('store');
    Route::get('/{mark}/edit',[MarkController::class, 'edit'])->name('edit');
    Route::put('/{mark}',[MarkController::class, 'update'])->name('update');
    Route::delete('/{mark}',[MarkController::class, 'destroy'])->name('delete');
});