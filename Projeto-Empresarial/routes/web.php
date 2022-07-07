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

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminProductController::class, 'index'])->name('admin.index');

    Route::prefix('produto')->group(function () {
        Route::get('/cadastro', [AdminProductController::class, 'create'])->name('admin.product.create');
        Route::post('/cadastro', [AdminProductController::class, 'store'])->name('admin.product.store');

        Route::get('/editar/{product}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('/editar/{product}', [AdminProductController::class, 'update'])->name('admin.product.update');

        Route::delete('/delete/{product}', [AdminProductController::class, 'destroy'])->name('admin.product.destroy');

        Route::get('/delete/image/{product}', [AdminProductController::class, 'destroyImage'])->name('admin.product.destroy.image');
    });
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
