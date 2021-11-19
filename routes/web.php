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

    Route::get('/', function(){
        return view('pages.dashboard')
            ->with(['title' => 'Dashboard | ALS DATABASE', 'linkname' => 'dashboard']); })
        ->name('dashboard');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');


    Route::get('als/list', [StudentController::class, 'index'])->name('listals');
    Route::resource('students', StudentController::class);


    Route::get('student/data', [StudentController::class, 'datatable'])->name('student');
    Route::post('student/personal', [StudentController::class, 'personal_details_validation'])->name('personal_validation');
    Route::post('student/education', [StudentController::class, 'educational_information_validation'])->name('education_validation');
    Route::post('student/accessibility', [StudentController::class, 'accessibility_and_availability_validation'])->name('accessibility_validation');

    Route::middleware(AllowRole::role(User::$ADMIN))->group(function(){
        Route::resource('users', UserController::class);
    });

});
