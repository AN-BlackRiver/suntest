<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\UserController;

use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\IsPostCreatorMiddleware;
use App\Http\Middleware\PermissionMiddelware;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'jwt.auth', 'prefix' => 'auth'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});


Route::get('posts', [PostController::class, 'index']);
Route::post('/post', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::patch('posts/{post}', [PostController::class, 'update']);
Route::delete('posts/{post}', [PostController::class, 'destroy']);


Route::apiResource('users', UserController::class);
Route::apiResource('comments', CommentController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('tags', TagController::class);


