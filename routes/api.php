<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ForgotController;
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





Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('forgot', [\App\Http\Controllers\ForgotController::class, 'forgotten']);
Route::get('articles', [\App\Http\Controllers\ArticleController::class, 'index']);
Route::get('articles/{id}', [\App\Http\Controllers\ArticleController::class, 'show']);
Route::delete('articles/{id}', [\App\Http\Controllers\ArticleController::class, 'destroy']);
Route::put('articles/{id}', [\App\Http\Controllers\ArticleController::class, 'update']);
Route::post('articles', [\App\Http\Controllers\ArticleController::class, 'store']);

Route::get('calendars', [\App\Http\Controllers\CalendarController::class, 'index']);
Route::get('calendars/{id}', [\App\Http\Controllers\CalendarController::class, 'show']);
Route::delete('calendars/{id}', [\App\Http\Controllers\CalendarController::class, 'destroy']);
Route::put('calendars/{id}', [\App\Http\Controllers\CalendarController::class, 'update']);
Route::post('calendars', [\App\Http\Controllers\CalendarController::class, 'store']);
Route::post('file', [\App\Http\Controllers\ImageController::class, 'store']);
Route::get('images/{fileName}', [\App\Http\Controllers\ImageController::class, 'show']);
Route::post('roles', [\App\Http\Controllers\RoleController::class, 'store']);
Route::get('roles', [\App\Http\Controllers\RoleController::class, 'index']);
Route::put('roles/{id}', [\App\Http\Controllers\RoleController::class, 'update']);
Route::delete('roles/{id}', [\App\Http\Controllers\RoleController::class, 'destroy']);
Route::get('users', [\App\Http\Controllers\AuthController::class, 'index']);


Route::middleware('auth:sanctum')->group(function () {

    Route::get('user', [\App\Http\Controllers\AuthController::class, 'user']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('change-password', [\App\Http\Controllers\ProfileController::class, 'change_password']);
    Route::get('users', [\App\Http\Controllers\AuthController::class, 'index']);
});
