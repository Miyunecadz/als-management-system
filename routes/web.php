<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/', function(){ return view('pages.users.edit'); })->name('dashboard');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::resource('users', UserController::class);
    Route::get('student/data', [UserController::class, 'datatable'])->name('student');
});
