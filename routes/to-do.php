<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;

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

Route::middleware(['auth'])->prefix('to-do')->as('toDo.')->group(function () {
    Route::get('/', [ToDoController::class, 'index'])->name('index');

    Route::get('/create', [ToDoController::class, 'create'])->name('create');
    Route::post('/create', [ToDoController::class, 'store'])->name('store');

    Route::get('/{toDo}/edit', [ToDoController::class, 'edit'])->name('edit');
    Route::put('/{toDo}/update', [ToDoController::class, 'update'])->name('update');

    Route::delete('/{toDo}/destroy', [ToDoController::class, 'destroy'])->name('destroy');
});
