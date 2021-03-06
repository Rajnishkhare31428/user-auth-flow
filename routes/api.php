<?php

use App\Http\Controllers\postController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'index']);

Route::get('/activeUsers', [UserController::class, 'getActiveUsers']);

Route::post('/getUserId', [postController::class, 'getUserId']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/register', [UserController::class, 'register']);

Route::post('/update', [UserController::class, 'update']);

Route::post('/createPost', [postController::class, 'createPost']);

Route::get('/getAllPosts', [postController::class, 'getAllPosts']);