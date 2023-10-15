<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('web');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios')->middleware('admin');;
Route::get('/usuarios/{id}', [UsuarioController::class, 'showEdit'])->name('usuarios.edit');
Route::post('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('home')->middleware('web');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');



