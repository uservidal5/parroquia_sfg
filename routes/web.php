<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerfilController;
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

Route::get('/', function () {
    // return view('welcome');
    return view('template.dashboard');
});
// PRIVATE
// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name("dashboard.index");
// Perfil => Estudiantes
Route::get('/dashboard/estudiantes', [PerfilController::class, 'index'])->name("estudiantes.index");
Route::get('/dashboard/estudiantes/create', [PerfilController::class, 'create'])->name("estudiantes.create");
Route::post('/dashboard/estudiantes/create', [PerfilController::class, 'store'])->name("estudiantes.store");
Route::get('/dashboard/estudiantes/{perfil}', [PerfilController::class, 'show'])->name("estudiantes.show");
Route::get('/dashboard/estudiantes/editar/{perfil}', [PerfilController::class, 'edit'])->name("estudiantes.edit");
Route::put('/dashboard/estudiantes/editar/{perfil}', [PerfilController::class, 'update'])->name("estudiantes.update");
Route::delete('/dashboard/estudiantes/{perfil}', [PerfilController::class, 'destroy'])->name("estudiantes.delete");

// PUBLIC
