<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::get('/profile/games', [ProfileController::class, 'showLibrary'])->name('profile.library');
    Route::get('/profile/wished-games', [ProfileController::class, 'showWishlist'])->name('profile.wishlist');
});

Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'usersList'])->name('admin.users-list');
});

    
    
Route::get('/game/{slug}', [HomeController::class, 'showGame'])->name('show.game');
Route::get('/{category}/{slug}', [HomeController::class, 'category'])->name('categorypage');


require __DIR__.'/auth.php';
