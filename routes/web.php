<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\CreateController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These Alert::error('Error Title', 'Error Message');
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    Alert::success('Success Title', 'Success Message');

    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/create', [App\Http\Controllers\CreateController::class, 'index'])->name('create');
Route::post('/save', [App\Http\Controllers\CreateController::class, 'store'])->name('save');
Route::get('/editTaskForm/{id}', [CreateController::class, 'editTaskForm'])->name('editTaskForm');
