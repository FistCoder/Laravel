<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tasks', [
    TaskController::class, 'index'
])->middleware(['auth', 'verified'])->name('tasks.index');

Route::get('/tasks/new', [
    TaskController::class, 'form'
])->middleware(['auth', 'verified'])->name('tasks.form');

Route::post('/tasks/store', [
    TaskController::class, 'store'
])->middleware(['auth', 'verified'])->name('tasks.store');

Route::get('/tasks/edit/{id}', [
    TaskController::class, 'edit'
])->middleware(['auth', 'verified'])->name('tasks.edit');

Route::put('/tasks/update/{id}', [
    TaskController::class, 'update'
])->middleware(['auth', 'verified'])->name('tasks.update');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
