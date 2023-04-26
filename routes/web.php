<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/listProfiles', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'editProfileById']);
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/{id}/delete', [ProfileController::class, 'destroyProfileById']);
    Route::get('/profiles/search', [ProfileController::class, 'searchProfile']);
    Route::get('/profileRegister', [ProfileController::class, 'create']);
    Route::post('registerProfile', [ProfileController::class, 'insertProfile']);

    Route::get('/listCategories', [CategorieController::class, 'index']);
    Route::get('/registerCategory', [CategorieController::class, 'create']);
    Route::post('/categoryRegister', [CategorieController::class, 'store']);
    Route::post('/category/{id}/update', [CategorieController::class, 'update']);
    Route::get('/category/{id}/edit', [CategorieController::class, 'edit']);
    Route::get('/category/{id}/delete', [CategorieController::class, 'destroy']);
});

Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::get('/users/{id}/delete', [UserController::class, 'destroy']);

require __DIR__.'/auth.php';
