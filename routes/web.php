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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('families/create', [FamilyController::class, 'create'])->name('families.create');
    Route::post('families', [FamilyController::class, 'store'])->name('families.store');
    Route::get('families/join', [FamilyController::class, 'showJoinForm'])->name('families.joinForm');
    Route::post('families/join', [FamilyController::class, 'join'])->name('families.join');

    Route::get('families/{familyId}/manage', [FamilyController::class, 'manageMembers'])->name('families.manage');
    Route::post('families/{familyId}/approve/{userId}', [FamilyController::class, 'approveMember'])->name('families.approve');
    Route::post('families/{familyId}/remove/{userId}', [FamilyController::class, 'removeMember'])->name('families.remove');

    Route::get('recipes', [RecipeController::class, 'index'])->name('recipes.index');
    Route::get('recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::get('recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
});


require __DIR__ . '/auth.php';
