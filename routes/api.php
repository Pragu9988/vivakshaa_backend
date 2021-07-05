<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\SemesterController;
use App\Http\Controllers\Api\ProgramController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('questions', [QuestionController::class, 'index']);
Route::get('courses', [CourseController::class, 'index']);
Route::get('semesters', [SemesterController::class, 'index']);
Route::get('programs', [ProgramController::class, 'index']);
