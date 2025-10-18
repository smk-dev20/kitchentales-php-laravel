<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RecipeController;

Route::get('/', function () {
        if (Auth::check()) {
        // If already logged in, redirect to dashboard
        return redirect()->route('dashboard');
    }
    // Otherwise, show the login page
    return view('auth.login'); 
});

Route::get('/dashboard', function () {
    return redirect()->route('recipes.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', function () {
    return view('about');
})->name('about')->middleware('auth'); 



Route::middleware(['auth'])->group(function () {
    Route::resource('recipes', RecipeController::class);
});

require __DIR__.'/auth.php';
