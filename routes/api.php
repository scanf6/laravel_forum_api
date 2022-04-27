<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Answer\AnswerController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public Routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{id}', [PostController::class, 'show']);
Route::get('answers/post/{post_id}', [AnswerController::class, 'postAnswers']);

// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('posts', [PostController::class, 'store']);
    Route::post('answers', [AnswerController::class, 'store']);
    Route::post('logout', [AuthController::class, 'logout']);
});