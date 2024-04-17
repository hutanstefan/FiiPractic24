<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AdminController;

Route::get('/', [ProductController::class, 'allproducts'])->name('products.allproducts');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.product');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('edit_profile', [LoginController::class, 'showEditForm'])->name('edit_profile');
Route::post('update_profile', [LoginController::class, 'updateProfile'])->name('update_profile');
Route::get('/forgot_password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('showLinkRequestForm');
Route::post('/forgot-password', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', function ($token) { return view('auth.passwords.reset', ['token' => $token]);})->name('password.reset');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/create', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/myproducts', [ProductController::class, 'myproducts'])->name('products.myproducts');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.delete');
Route::get('/pending-products', [ProductController::class, 'pendingProducts'])->name('products.pendingProducts');
Route::post('/products/{id}/accept', [ProductController::class, 'accept'])->name('products.accept');
Route::delete('/products/{id}/reject', [ProductController::class, 'reject'])->name('products.reject');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/{id}/hide', [ProductController::class,'hide'])->name('products.hide');
Route::post('/product/{product}/add-to-favorites', [ProductController::class, 'addToFavorites'])->name('addToFavorites');
Route::delete('/product/{product}/remove-from-favorites', [ProductController::class, 'removeFromFavorites'])->name('removeFromFavorites');
Route::get('/products/favorite-products', [ProductController::class, 'viewFavorites'])->name('products.favoriteProducts');
Route::post('/product/{product}/review', [ReviewController::class, 'store'])->name('addReview');
Route::get('/all_chats', [MessageController::class, 'allChats'])->name('messages.all_chats');
Route::get('/messages/{otherUser}', [MessageController::class, 'index'])->name('messages.index');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

Route::get('/adminPanel', [AdminController::class, 'index'])->name('adminPanel');

















