<?php

use App\Classes\Middleware\AllowRole;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Models\User;

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

Route::get('/login', function(){ return view('pages.login'); })->name('login-page');
Route::post('/login', [UserController::class, 'login'])->name('login');


Route::middleware(['auth'])->group(function () {

    Route::get('/', [UserController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');


    Route::get('als/list', [StudentController::class, 'index'])->name('listals');
    Route::get('als/list/all', [StudentController::class, 'displayAllColumn'])->name('listall');
    Route::get('als/generate', [StudentController::class, 'generateExport'])->name('generateExport');
    Route::get('als/generate/table', [StudentController::class, 'generateTable'])->name('generateTable');
    Route::resource('students', StudentController::class);


    Route::post('student/data', [StudentController::class, 'datatable'])->name('student');
    Route::post('student/personal', [StudentController::class, 'personal_details_validation'])->name('personal_validation');
    Route::post('student/education', [StudentController::class, 'educational_information_validation'])->name('education_validation');
    Route::post('student/accessibility', [StudentController::class, 'accessibility_and_availability_validation'])->name('accessibility_validation');

    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::resource('users', UserController::class)->only('update');

    Route::middleware(AllowRole::role(User::$ADMIN))->group(function(){
        Route::resource('users', UserController::class)->except('update');
        Route::get('teachers', [UserController::class, 'datatable'])->name('all.users');
        Route::get('teachers/{id}', [UserController::class, 'toggleStatus'])->name('teachers.status');
        Route::get('profile/{id}', [UserController::class, 'teacherEdit'])->name('teachers.edit');
    });

});
