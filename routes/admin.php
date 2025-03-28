<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdminMiddleware::class]], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');
    Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');

    Route::get('/categories/', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');

    Route::get('/tags/', [TagController::class, 'index'])->name('admin.tags.index');
    Route::get('/tags/create', [TagController::class, 'create'])->name('admin.tags.create');
    Route::get('/tags/{tag}', [TagController::class, 'show'])->name('admin.tags.show');

    Route::post('/tags', function () {
        dd(111111);
    })->name('admin.tags.store');

});
