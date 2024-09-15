<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/info', function () {
        return view('info');
    })->name('family.info');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('families', [FamilyController::class, 'store'])->name('families.store');
    Route::post('families/join', [FamilyController::class, 'join'])->name('families.join');
    Route::post('families/{familyId}/approve/{userId}', [FamilyController::class, 'approveMember'])->name('families.approve');
    Route::post('families/{familyId}/remove/{userId}', [FamilyController::class, 'removeMember'])->name('families.remove');
    Route::delete('/families/{id}', [FamilyController::class, 'destroy'])->name('families.destroy');
    Route::get('family', [FamilyController::class, 'index'])->name('families.index');
    Route::post('families/edit', [FamilyController::class, 'editFamily'])->name('families.edit');

    Route::get('recipes', [RecipeController::class, 'index'])->name('recipes.index');
    Route::get('recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::post('recipes/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('recipes/update', [RecipeController::class, 'update'])->name('recipes.update');
    Route::post('recipes/view', [RecipeController::class, 'show'])->name('recipes.show');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
});


require __DIR__ . '/auth.php';
