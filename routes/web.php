<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EventoController;
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


//Rutas para eventos
Route::post('obtener_eventos',[EventoController::class,'index'])->name('obtener_eventos');
Route::post('cargar_formatos', [EventoController::class, 'agregarFormatos'])->name('agregar_evento');
Route::post('guardar_evento', [EventoController::class, 'store'])->name('guardar_evento');
Route::post('mostrar_zonas_formato', [EventoController::class, 'mostrarZonasFormatos'])->name('mostrar_zonas_formatos');
Route::post('mostrar_zonas_agregadas', [EventoController::class, 'mostrarZonasFormatosAgregadas'])->name('mostrar_zonas_agregadas');
Route::post('eliminar_evento_zona', [EventoController::class, 'eliminarEventoZona'])->name('eliminar_evento_zona');
Route::post('deshabilitar_evento', [EventoController::class, 'deshabilitarEvento'])->name('deshabilitar_evento');
