<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DateController;

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

# Task 1 Routes

Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'login']);

// Student Routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard']);
    Route::post('/student/percentage', [StudentController::class, 'storePercentage']);
});

// Teacher Routes (Admin)
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/students', [TeacherController::class, 'index']);
    Route::get('/teacher/student/{id}', [TeacherController::class, 'show']);
});

# Task 3 Routes 

Route::get('/calculate-years', [DateController::class, 'showForm']);
Route::post('/calculate-years', [DateController::class, 'calculateYears']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

