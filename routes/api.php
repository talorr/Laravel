<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/posts', [ProductController::class, 'index']);
Route::get('/posts/{id}', [ProductController::class, 'show']);
Route::get('/posts/search/{name}', [ProductController::class, 'search']);



Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/posts/comment', [CommentController::class, 'index']);
    Route::post('/posts/{id}/comment', [CommentController::class, 'create']);
    Route::get('/posts/show/{id}/comment', [CommentController::class, 'show']);
    Route::put('/posts/update/{id}/comment', [CommentController::class, 'update']);
    Route::delete('/posts/delete/{id}/comment', [CommentController::class, 'destroy']);
    Route::post('/posts/create', [ProductController::class, 'store']);
    Route::put('/posts/update/{id}', [ProductController::class, 'update']);
    Route::delete('/posts/delete/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
