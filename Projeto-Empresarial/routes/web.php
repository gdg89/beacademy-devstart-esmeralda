<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('usuario')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/login', [UserController::class, 'newAccess']);
	Route::get('/logoff', [UserController::class, 'logoff']);
	Route::post('/request', [UserController::class, 'request']);
    Route::get('/cadastro',[UserController::class, 'create']);
    Route::post('/cadastro',[UserController::class, 'store']);
    Route::get('/editar',[UserController::class, 'edit']);
    Route::post('/editar',[UserController::class, 'update']);
    Route::post('/delete/{id}',[UserController::class, 'destroy']);
    Route::get('/carrinho',[ClientController::class, 'cart']);
    Route::post('/carrinho',[ClientController::class, 'finish']);
});

Route::prefix('produtos')->group(function () {
    Route::get('/',[ProductController::class, 'index']);
    Route::get('/cadastro',[ProductController::class, 'create']);
    Route::post('/cadastro',[ProductController::class, 'store']);
    Route::get('/editar/{id}',[ProductController::class, 'edit']);
    Route::post('/editar/{id}',[ProductController::class, 'update']);
    Route::post('/delete/{id}',[ProductController::class, 'destroy']);
});

Route::prefix('/pedidos')->group(function () {
    Route::get('/',[OrderController::class, 'index']);
    Route::get('/cadastro',[OrderController::class, 'create']);
    Route::post('/cadastro',[OrderController::class, 'store']);
    Route::get('/editar/{id}',[OrderController::class, 'edit']);
    Route::post('/editar/{id}',[OrderControllerer::class, 'update']);
    Route::post('/delete/{id}',[OrderControllerer::class, 'destroy']);
});