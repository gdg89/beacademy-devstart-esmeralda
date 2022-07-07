<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminProductController,
    HomeController,
    UserController,
    ProductController,
    OrderController
};

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produto/{product}', [ProductController::class, 'show'])->name('product.show');

Route::prefix('usuario')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');

    Route::get('/login', [UserController::class, 'login'])->name('user.login');
    Route::get('/logoff', [UserController::class, 'logoff'])->name('user.logoff');

    Route::get('/cadastro', [UserController::class, 'create'])->name('user.create');
    Route::post('/cadastro', [UserController::class, 'store'])->name('user.store');

    Route::get('/carrinho', [ClientController::class, 'cart'])->name('user.cart');
    Route::post('/carrinho', [ClientController::class, 'finish'])->name('user.index');
});

Route::prefix('admin/produtos')->group(function () {
    Route::get('/', [AdminProductController::class, 'index'])->name('admin.index');

    Route::get('/cadastro', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/cadastro', [AdminProductController::class, 'store'])->name('admin.products.store');

    Route::get('/editar/{id}', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/editar/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');

    Route::post('/delete/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
});

Route::prefix('pedidos')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');

    Route::get('/cadastro', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/cadastro', [OrderController::class, 'store'])->name('orders.store');
});

Route::prefix('admin/pedidos')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');

    Route::get('/editar/{id}', [OrderController::class, 'edit'])->name('orders.edit');
    Route::post('/editar/{id}', [OrderControllerer::class, 'update'])->name('orders.update');

    Route::post('/delete/{id}', [OrderControllerer::class, 'destroy'])->name('orders.destroy');
});
