<?php

use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login'); 
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [NotesController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/nota', [NotesController::class, 'store'])->name('nota.store');
    Route::get('/dashboard/nota/create', [NotesController::class, 'create'])->name('nota.create');
    Route::get('/dashboard/nota/{id}', [NotesController::class, 'show'])->name('nota.show');
    Route::get('/dashboard/nota/{id}/edit', [NotesController::class, 'edit'])->name('nota.edit');
    Route::put('/dashboard/nota/{id}', [NotesController::class, 'update'])->name('nota.update');
    Route::delete('/dashboard/{id}', [NotesController::class, 'destroy'])->name('nota.destroy');

    // rotas do perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
