<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class, 'login'])->name('main-logn');
Route::post('login', [LoginController::class, 'AuthLogin'])->name('login');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('forgot-password', [ForgetController::class, 'forgotPassword'])->name('forgot-password');






Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
});

// Route::group(["middleware" => "admin"], function () {
//     Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin-dashboard');
// });




Route::middleware(['admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin-dashboard');
});



Route::middleware(['teacher'])->group(function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard'])->name('teacher-dashboard');
});
Route::middleware(['student'])->group(function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard'])->name('student-dashboard');
});

Route::middleware(['parent'])->group(function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard'])->name('parent-dashboard');
});
