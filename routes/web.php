<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index']);

Route::get('/login', [UserController::class, 'login']);

Route::get('/register', [UserController::class, 'register']);

Route::get('dashboard', [UserController::class, 'dashboard']);

Route::get('contact/{id}', [UserController::class, 'edit']);

Route::get('close', [UserController::class, 'logout']);

Route::post('update', [UserController::class, 'update']);

Route::get('delete/{id}', [UserController::class, 'delete']);

Route::post('contact/make', [UserController::class, 'createContact']);

Route::group(['prefix' => 'user'],function() {
    Route::post('login', [UserController::class, 'loger'] );
    Route::post('register', [UserController::class, 'make'] );
});
