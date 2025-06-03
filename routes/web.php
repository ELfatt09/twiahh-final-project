<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ThreadLikeController;
use App\Http\Controllers\ThreadSaveController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('threads.index');
});

Route::get('threads', [ThreadController::class, 'index'])->name('threads.index')->middleware('auth');
Route::post('threads', [ThreadController::class, 'store'])->name('threads.store')->middleware('auth');
Route::get('threads/show/{thread}', [ThreadController::class, 'show'])->name('threads.show')->middleware('auth');
Route::delete('threads/', [ThreadController::class, 'destroy'])->name('threads.destroy')->middleware('auth');

Route::get('/dashboard', function () {
    return redirect()->route('threads.index');
})->name('dashboard')->middleware('auth');

Route::post('/thread/{thread}/like', [ThreadLikeController::class, 'store'])->name('thread.like')->middleware('auth');
Route::post('/thread/{thread}/save', [ThreadSaveController::class, 'store'])->name('thread.save')->middleware('auth');

Route::get('/threads/bookmarks', [ThreadController::class, 'bookmarks'])->name('threads.bookmarks')->middleware('auth');
Route::get('/threads/following', [ThreadController::class, 'following'])->name('threads.following')->middleware('auth');
Route::post('/threads/search/', [ThreadController::class, 'search'])->name('threads.search')->middleware('auth');

Route::post('/profile/{user}/follow', [FollowController::class, 'store'])->name('profile.follow')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
