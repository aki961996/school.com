<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClassModelController;
use App\Http\Controllers\ClassSubjectModelController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
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
    Route::post('admin/admin/update', [AdminController::class, 'update'])->name('Update');
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete'])->name('delete');

    //search
    // Route::get('admin/admin/search', [AdminController::class, 'search'])->name('search');

    //class urls
    Route::get('admin/class/list', [ClassModelController::class, 'list'])->name('class-list');
    Route::get('admin/class/add', [ClassModelController::class, 'add'])->name('class-add');
    Route::post('admin/class/store', [ClassModelController::class, 'ClassAdd'])->name('store');
    Route::get('admin/class/edit/{id}', [ClassModelController::class, 'ClassEdit'])->name('ClassEdit');
    Route::get('admin/class/delete/{id}', [ClassModelController::class, 'classDelete'])->name('classDelete');
    Route::post('admin/class/update', [ClassModelController::class, 'classUpdate'])->name('classUpdate');

    //subject urls
    Route::get('admin/subject/list', [SubjectController::class, 'index'])->name('subject-list');
    Route::get('admin/subject/add', [SubjectController::class, 'create'])->name('subject-add');
    Route::post('admin/subject/store', [SubjectController::class, 'store'])->name('subject-store');
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit'])->name('subject-edit');
    Route::post('admin/subject/update', [SubjectController::class, 'update'])->name('subject-update');
    Route::get('admin/subject/destroy/{id}', [SubjectController::class, 'destroy'])->name('subject-destroy');
    //ajax req
    // Route::delete('admin/subject/destroy/{id}', [SubjectController::class, 'destroy'])->name('subject-destroy');

    // assign subject url
    Route::get('admin/assign_subject/list', [ClassSubjectModelController::class, 'index'])->name('assign-subject-list');
    Route::get('admin/assign_subject/add', [ClassSubjectModelController::class, 'add'])->name('assign-subject-add');
    Route::post('admin/assign_subject/add', [ClassSubjectModelController::class, 'assignSubjectsAdd'])->name('assign-subject-add-P');
    Route::get('admin/assign_subject/edit/{id}', [ClassSubjectModelController::class, 'assignSubjectsEdit'])->name('assingSubEdit');
    Route::get('admin/assign_subject/delete/{id}', [ClassSubjectModelController::class, 'destroy'])->name('assign-subject-delete');
    Route::post('admin/assign_subject/update', [ClassSubjectModelController::class, 'update'])->name('assign-subject-update');

    Route::get('admin/assign_subject/edit_single/{id}', [ClassSubjectModelController::class, 'editSingle'])->name('editSingle');
    Route::post('admin/assign_subject/edit_single/{id}', [ClassSubjectModelController::class, 'single_update']);

    //change password
    Route::get('admin/change_password', [UserController::class, 'change_password'])->name('change_password');
    Route::post('admin/change_password', [UserController::class, 'update_change_password']);

    //studentsroute
    Route::get('admin/student/list', [StudentController::class, 'index'])->name('student-list');
    Route::get('admin/student/add', [StudentController::class, 'add'])->name('student-add');
    Route::post('admin/student/add', [StudentController::class, 'store'])->name('student-store');
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit'])->name('student-edit');
    Route::post('admin/student/update', [StudentController::class, 'StudentUpdate'])->name('student-update');
    Route::get('admin/student/destroy/{id}', [StudentController::class, 'destory'])->name('student-destroy');

    //parents route
    Route::get('admin/parent/list', [ParentController::class, 'index'])->name('parent-list');
    Route::get('admin/parent/add', [ParentController::class, 'add'])->name('parent-add');
});

Route::middleware(['teacher'])->group(function () {
    Route::get('teacher/admin/dashboard', [DashboardController::class, 'dashboard'])->name('teacher-dashboard');

    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);
});
Route::middleware(['student'])->group(function () {
    Route::get('student/admin/dashboard', [DashboardController::class, 'dashboard'])->name('student-dashboard');
    Route::get('student/change_password', [UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password']);
});

Route::middleware(['parent'])->group(function () {
    Route::get('parent/admin/dashboard', [DashboardController::class, 'dashboard'])->name('parent-dashboard');
    Route::get('parent/change_password', [UserController::class, 'change_password']);
    Route::post('parent/change_password', [UserController::class, 'update_change_password']);
});
