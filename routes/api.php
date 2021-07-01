<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;

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


Route::post('/login', [LoginController::class, 'login']);
Route::post('/registration', [RegistrationController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function ($route) {
    $route->get('/user', [LoginController::class, 'user']);
    $route->post('/logout', [LogoutController::class, 'logout']);

    Route::get('clothes', [App\Http\Controllers\ClotheController::class, 'index']);
});

