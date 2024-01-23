<?php

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

Route::get('/', [App\Http\Controllers\GeneratorTextController::class, 'index'])->name('index');

Route::post('/generation_text', [App\Http\Controllers\GeneratorTextController::class, 'generation_text'])->name('generation_text');

Route::get('/list_text', [App\Http\Controllers\CRUDTextController::class, 'list_text'])->name('list_text');

Route::get('/form_create_text', [App\Http\Controllers\CRUDTextController::class, 'form_create_text'])->name('form_create_text');

Route::post('/create_text', [App\Http\Controllers\CRUDTextController::class, 'create_text'])->name('create_text');

Route::get('/delete_text/{id}', [App\Http\Controllers\CRUDTextController::class, 'delete_text'])->name('delete_text');

Route::get('/form_update_text/{id}', [App\Http\Controllers\CRUDTextController::class, 'form_update_text'])->name('form_update_text');

Route::post('/update_text', [App\Http\Controllers\CRUDTextController::class, 'update_text'])->name('update_text');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
