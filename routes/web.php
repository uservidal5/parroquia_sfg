<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\InformacionParentalController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
// PUBLIC
Route::get('/', [PublicController::class, 'index'])->name("home");
Route::get('/login', [PublicController::class, 'login'])->name("login");
//
Route::get('/acceso_estudiantes/{type}', [PublicController::class, 'acceso_estudiantes'])->name("acceso_estudiantes");
Route::post('/acceso_estudiantes', [PublicController::class, 'public_estudiante_store'])->name("public_estudiante.store");
Route::post('/login_estudiantes', [PublicController::class, 'public_estudiante_login'])->name("public_estudiante.login");
// HA HECHO LOGIN
Route::get('/panel_estudiante', [PublicController::class, 'inicio_estudiante'])->name("inicio_estudiante.index")->middleware("auth.perfil");
Route::post('/logout_estudiantes', [PublicController::class, 'logout_estudiante'])->name("inicio_estudiante.logout")->middleware("auth.perfil");
// Route::get('/', [PublicController::class, 'index'])->name("home");
// PRIVATE
// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name("dashboard");
// Perfil => Estudiantes
Route::get('/estudiantes', [PerfilController::class, 'index'])->name("estudiantes.index");
Route::get('/estudiantes/create', [PerfilController::class, 'create'])->name("estudiantes.create");
Route::post('/estudiantes/create', [PerfilController::class, 'store'])->name("estudiantes.store");
Route::get('/estudiantes/{perfil}', [PerfilController::class, 'show'])->name("estudiantes.show");
Route::get('/estudiantes/editar/{perfil}/{tab}', [PerfilController::class, 'edit'])->name("estudiantes.edit");
Route::put('/estudiantes/editar/{perfil}', [PerfilController::class, 'update'])->name("estudiantes.update");
Route::put('/estudiantes/editar_clave/{perfil}', [PerfilController::class, 'cambio_clave'])->name("estudiantes.cambio_clave");
Route::delete('/estudiantes/{perfil}', [PerfilController::class, 'destroy'])->name("estudiantes.delete");
// Mi Perfil
Route::get('/mi_perfil', [UserController::class, 'mi_perfil'])->name("user.profile");
Route::put('/actualizar_datos_personales', [UserController::class, 'actualizar_datos_personales'])->name("user.actualizar_datos_personales");
Route::put('/cambiar_clave_acceso', [UserController::class, 'cambiar_clave_acceso'])->name("user.cambiar_clave_acceso");

Route::apiResource("/informacion_parental", InformacionParentalController::class);
Route::resource("/cursos", CursoController::class);
Route::apiResource("/matriculas", MatriculaController::class);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
