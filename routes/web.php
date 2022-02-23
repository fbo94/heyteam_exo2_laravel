<?php

use App\Http\Controllers\TodoController;
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
Route::get('/', [TodoController::class, 'index'])->name('todos.index');
Route::get('//new', [TodoController::class, 'new'])->name('todos.new');
Route::get('/{id}', [TodoController::class, 'show'])->name('todos.get');
Route::post('/', [TodoController::class, 'create'])->name('todos.create');
Route::post('/{id}', [TodoController::class, 'update'])->name('todos.update');
Route::get('/{id}/delete', [TodoController::class, 'delete'])->name('todos.delete');
