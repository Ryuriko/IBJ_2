<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Course_categoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\User_courseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('signin', [AdminController::class, 'registrasi']);
Route::post('login', [AdminController::class, 'login']);
Route::apiResource('user', UserController::class);
Route::apiResource('course_category', Course_categoryController::class);
Route::apiResource('course', CourseController::class);
Route::apiResource('user_course', User_courseController::class);
