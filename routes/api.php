<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('posts', PostController::class);

Route::apiResource('users', UserController::class);

Route::apiResource('comments', CommentController::class);

Route::apiResource('categories', CategoryController::class);

Route::apiResource('roles', RoleController::class);

Route::apiResource('tags', TagController::class);
