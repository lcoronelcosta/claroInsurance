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

//admmin routes
Route::get('/admin/users',[App\Http\Controllers\Usercontroller::class, 'index'])->name('users')->middleware('auth');
Route::get('/admin/add-user',[App\Http\Controllers\Usercontroller::class, 'create'])->name('add-user')->middleware('auth');
Route::get('/admin/edit-user/{user}',[App\Http\Controllers\Usercontroller::class, 'edit'])->middleware('auth');
Route::post('/admin/ajax/estados',[App\Http\Controllers\Ajaxcontroller::class, 'estados'])->middleware('auth');
Route::post('/admin/ajax/ciudades',[App\Http\Controllers\Ajaxcontroller::class, 'ciudades'])->middleware('auth');
