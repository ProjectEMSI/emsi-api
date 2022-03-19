<?php

use App\Http\Controllers\API\ArticlesController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ShortsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;

Broadcast::routes(['middleware' => 'auth:sanctum']);

Route::prefix('v1')->group(function () {

    Route::middleware(['auth:sanctum'])->get('/me', function (Request $request) {
        return $request->user();
    });

    Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {
        Route::post('login', 'login')->name('login');
        Route::post('register', 'register')->name('register');
    });

    Route::controller(ArticlesController::class)->prefix('articles')->name('articles.')->group(function () {
        Route::get('latest', 'latest')->name('latest');
        Route::get('featured', 'featured')->name('featured');
        Route::get('{article:slug}', 'show')->name('show');
    });

    Route::controller(ShortsController::class)->prefix('shorts')->name('shorts.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/widget', 'widget')->name('widget');
    });
});
