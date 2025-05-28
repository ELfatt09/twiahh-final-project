<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('threads');
});

Route::get('/threads', [ThreadController::class, 'index'])->middleware(['auth', 'verified'])->name('threads');


Route::get('/dashboard', function () {
    return redirect()->route('threads');
});

Route::post('/threads', [ThreadController::class, 'store'])->name('threads.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
