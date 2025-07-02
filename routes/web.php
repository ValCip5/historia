<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|   
    le podemos poner el nombre a la url que queramos
*/
Route::post('api/historias/{id}/likes',
[NoticiaController::class, 'like'])->name('historia.like');

Route::get('/historias/crear', 
[NoticiaController::class, 'nuevoForm'])->name('historia.nuevoForm');

Route::get('historias/{id}', 
[NoticiaController::class, 'leerNoticia'])->name('historia.leerNoticia');

Route::post('historias/{id}/edit', 
[NoticiaController::class, 'actualizar'])->name('historia.actualizar');

Route::get('historias/{id}/editar', 
[NoticiaController::class, 'editarForm'])->name('historia.editarForm');

Route::get('historias/{id}/eliminar', 
[NoticiaController::class, 'eliminarNoticia'])->name('historia.eliminarNoticia');

Route::get('nosotros', function () {
    return view('nosotros');
})->name('nosotros');

Route::get('membresia', function () {
    return view('membresia');
})->name('membresia');

Route::get('pasarelapago', function () {
    return view('pasarelapago');
})->name('pasarelapago');

Route::post('api/pago', 
[PagoController::class, 'crearPago'])->name('mercado.pago');

Route::post('api/usuarios/{id}/desuscribirse', 
[PagoController::class, 'desuscribirse'])->name('user.desuscribirse');

Route::get('usuarios/{id}/historias', 
[UserController::class, 'historiasList'])->name('user.historias');

Route::get('historias', 
[NoticiaController::class, 'historiasList'])->name('historia.historias');

Route::post('api/historias', 
[NoticiaController::class, 'nuevo'])->name('historia.nuevo');

Route::post('api/usuarios', 
[UserController::class, 'registro'])->name('user.registro');

Route::get('/', 
[HomeController::class, 'home'])->name('home.home');

Route::get('registrar', 
[UserController::class, 'registroForm'])->name('user.registroForm');

Route::get('iniciarsesion', 
[AuthController::class, 'loginForm'])->name('auth.login');

Route::get('api/comentarios/{id}/eliminar', 
[NoticiaController::class, 'eliminarComentario'])->name('historia.eliminarComentario');

Route::post('iniciarsesion', [AuthController::class, 'login'])
    ->name('auth.login.ejecutar');

Route::get('cerrarsesion', [AuthController::class, 'logout'])
    ->name('auth.logout');

Route::post('api/historias/{id}/comentarios', 
[NoticiaController::class, 'comentar'])->name('historia.comentar');

Route::get('usuarios/{id}', 
[UserController::class, 'editForm'])->name('user.perfil');

Route::post('usuarios/{id}/imagen', 
[UserController::class, 'editarImagen'])->name('user.editarImagen');

Route::post('usuarios/{id}', 
[UserController::class, 'editar'])->name('user.editar');

Route::get('admin/panelmembresia', 
[UserController::class, 'usuariosAdminList'])->name('admin.membresia');