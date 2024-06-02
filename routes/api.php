<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\V1\CompleteTaskController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    //タスクの全件取得
    Route::apiResource('/tasks', TaskController::class);
    Route::patch('/tasks/{task}/complete',CompleteTaskController::class);
});

// Route::controller(PostController::class)->group(function () {
//     Route::get('post/index', [PostController::class, 'index']);
// });

// Route::get('/login/{provider}', 'App\Http\Controllers\SocialController@redirect')->name('social_login');
// Route::get('/login/{provider}/callback', 'App\Http\Controllers\SocialController@callback')->name('social_login_callback');