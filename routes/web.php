<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Gestion de Usuarios
Route::get('/admin/users',[App\Http\Controllers\Usercontroller::class, 'index'])->name('users')->middleware('auth');
Route::get('/admin/add-user',[App\Http\Controllers\Usercontroller::class, 'create'])->name('add-user')->middleware('auth');
Route::get('/admin/edit-user/{user}',[App\Http\Controllers\Usercontroller::class, 'edit'])->name('edit-user')->middleware('auth');
Route::post('/admin/crear-user',[App\Http\Controllers\Usercontroller::class, 'store'])->middleware('auth');
Route::post('/admin/update-user',[App\Http\Controllers\Usercontroller::class, 'update'])->name('update-user')->middleware('auth');
Route::get('/admin/delete-user/{user}',[App\Http\Controllers\Usercontroller::class, 'destroy'])->name('delete-user')->middleware('auth');
Route::post('/admin/ajax/estados',[App\Http\Controllers\Ajaxcontroller::class, 'estados'])->middleware('auth');
Route::post('/admin/ajax/ciudades',[App\Http\Controllers\Ajaxcontroller::class, 'ciudades'])->middleware('auth');

//Gestion de Correos
Route::get('/admin/crear-email',[App\Http\Controllers\EmailController::class, 'create'])->name('crear-email')->middleware('auth');
Route::post('/admin/enviar-email',[App\Http\Controllers\EmailController::class, 'store'])->name('enviar-email')->middleware('auth');
Route::get('/admin/mails',[App\Http\Controllers\EmailController::class, 'index'])->name('mails')->middleware('auth');

