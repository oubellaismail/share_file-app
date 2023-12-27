<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
        });

Route::get('/register' ,[UserController::class ,'create'])->name('user.register');
Route::post('/store', [UserController::class, 'store'])->name('user.store');

Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::post('/auth', [UserController::class, 'auth'])->name('user.auth');

Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/home', [FileController::class, 'index'])->name('home');
Route::get('/file/create', [FileController::class, 'create'])->name('file.create')->middleware('auth');
Route::post('/file/store', [FileController::class, 'store'])->name('file.store');
Route::get('/file/show/{file}', [FileController::class, 'show'])->name('file.show');
Route::put('/file/download/{file}', [FileController::class, 'download'])->name('file.download');
Route::get('/file/manage', [FileController::class, 'manage'])->name('file.manage');