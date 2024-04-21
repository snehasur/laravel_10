<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\FrontendController;
//use App\Http\Middleware\CheckStudentAuthentication;
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

Route::get('/login/student', [StudentController::class, 'loginStudent'])->name('loginStudent');
Route::post('/login/student', [StudentController::class, 'loginSubmit'])->name('students.login');


// //Route::group(['middleware' => 'CheckStudentAuthentication'], function () {
//     // Routes that require login
//     Route::resource('students', StudentController::class)->only(['index','show','edit','update','destroy']);//student@gmail.com //123456
//     Route::post('/logout/student', [StudentController::class, 'logout'])->name('students.logout');
// //});
// Route::group(['prefix' => 'admin'], function () {
//     Route::get('students', [AdminStudentController::class, 'index'])->name('admin.students.index');
//     Route::get('students/create', [AdminStudentController::class, 'create'])->name('admin.students.create');
//     Route::post('students', [AdminStudentController::class, 'store'])->name('admin.students.store');
//     Route::get('students/{student}', [AdminStudentController::class, 'show'])->name('admin.students.show');
//     Route::get('students/{student}/edit', [AdminStudentController::class, 'edit'])->name('admin.students.edit');
//     Route::put('students/{student}', [AdminStudentController::class, 'update'])->name('admin.students.update');
//     Route::delete('students/{student}', [AdminStudentController::class, 'destroy'])->name('admin.students.destroy');
// });

Route::get('/', [FrontendController::class, 'index']);



