<?php


use Lib\Route\Route;
use App\Controllers\HomeController;
use App\Controllers\PublicationController;
use App\Controllers\UserController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/register', [UserController::class, 'create']);
Route::post('/sign-up', [UserController::class, 'signup']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/sign-in', [UserController::class, 'signin']);
Route::get('/logout', [HomeController::class, 'logout']);

Route::get('/publications', [PublicationController::class, 'index']);
Route::get('/publications/:id/edit', [PublicationController::class, 'edit']);
Route::get('/publications/:id/delete', [PublicationController::class, 'destroy']);
Route::get('/add-publication', [PublicationController::class, 'create']);
Route::post('/publications', [PublicationController::class, 'store']);
Route::post('/publications/:id', [PublicationController::class, 'update']);



Route::init();
