<?php

use App\Http\Controllers\NotesController;
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

Route::get('notes', [NotesController::class, 'notes'])->name('notes');

Route::post('notes', [NotesController::class, 'create'])->name('notes.create');

Route::get('notes/{id?}', [NotesController::class, 'detail'])->name('notes.detail');

Route::get('notes/edit/{id?}', [NotesController::class, 'edit'])->name('notes.edit');

Route::put('notes/edit/{id?}', [NotesController::class, 'update'])->name('notes.update');

Route::delete('delete/{id?}', [NotesController::class, 'delete'])->name('notes.delete');