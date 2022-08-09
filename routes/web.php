<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PublicController;
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

Route::get('/', [PublicController::class, 'index'])->name("home");
Route::get('/login', [PublicController::class, 'login'])->name("login");
Route::get('/acceso_estudiantes', [PublicController::class, 'acceso_estudiantes'])->name("acceso_estudiantes");
// Route::get('/', [PublicController::class, 'index'])->name("home");
// PRIVATE
// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name("dashboard");
// Perfil => Estudiantes
Route::get('/estudiantes', [PerfilController::class, 'index'])->name("estudiantes.index");
Route::get('/estudiantes/create', [PerfilController::class, 'create'])->name("estudiantes.create");
Route::post('/estudiantes/create', [PerfilController::class, 'store'])->name("estudiantes.store");
Route::get('/estudiantes/{perfil}', [PerfilController::class, 'show'])->name("estudiantes.show");
Route::get('/estudiantes/editar/{perfil}', [PerfilController::class, 'edit'])->name("estudiantes.edit");
Route::put('/estudiantes/editar/{perfil}', [PerfilController::class, 'update'])->name("estudiantes.update");
Route::delete('/estudiantes/{perfil}', [PerfilController::class, 'destroy'])->name("estudiantes.delete");

// PUBLIC
