<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::post('student/personal', [StudentController::class, 'personal_details_validation'])->name('personal_validation');
// Route::post('student/education', [StudentController::class, 'educational_information_validation'])->name('education_validation');
// Route::post('student/accessibility', [StudentController::class, 'accessibility_and_availability_validation'])->name('accessibility_validation');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
