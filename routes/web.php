<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClassModelController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//login
Route::get('/', [LoginController::class, 'login'])->name('main-logn');
Route::post('login', [LoginController::class, 'AuthLogin'])->name('login');
//logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
//forgetpassword
Route::get('forgot-password', [ForgetController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password', [ForgetController::class, 'postForgotPassword'])->name('post-forgot-password');
//eth mail btn get req aan
Route::get('reset/{token}', [ForgetController::class, 'resetPassword'])->name('reset');
Route::post('reset/{token}', [ForgetController::class, 'postReset'])->name('Post-reset');


// Route::get('admin/admin/list', function () {
//     return view('admin.admin.list');
// });

// Route::group(["middleware" => "admin"], function () {
//     Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin-dashboard');
// });

//middelwares
Route::middleware(['admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('admin/admin/list', [AdminController::class, 'list'])->name('admin-list');
    Route::get('admin/admin/add', [AdminController::class, 'add'])->name('admin-add');
    Route::post('admin/admin/add', [AdminController::class, 'insert'])->name('add');
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('admin/admin/update', [AdminController::class, 'update'])->name('update');
    Route::get('admin/admin/delete/{i}', [AdminController::class, 'delete'])->name('delete');

    //search
    // Route::get('admin/admin/search', [AdminController::class, 'search'])->name('search');
    //class
    Route::get('admin/class/list', [ClassModelController::class, 'list'])->name('class-list');
    Route::get('admin/class/add', [ClassModelController::class, 'add'])->name('class-add');
    Route::post('admin/class/add', [ClassModelController::class, 'insert'])->name('add');
});

Route::middleware(['teacher'])->group(function () {
    Route::get('teacher/admin/dashboard', [DashboardController::class, 'dashboard'])->name('teacher-dashboard');
});
Route::middleware(['student'])->group(function () {
    Route::get('student/admin/dashboard', [DashboardController::class, 'dashboard'])->name('student-dashboard');
});

Route::middleware(['parent'])->group(function () {
    Route::get('parent/admin/dashboard', [DashboardController::class, 'dashboard'])->name('parent-dashboard');
});