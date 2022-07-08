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

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logoff', [UserController::class, 'logoff'])->name('logoff');

Route::get('/cadastro', [UserController::class, 'create'])->name('user.create');
Route::post('/cadastro', [UserController::class, 'store'])->name('user.store');

Route::get('/produto/{product}', [ProductController::class, 'show'])->name('product.show');

Route::prefix('usuario')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');

    Route::get('/carrinho', [ClientController::class, 'cart'])->name('user.cart');
    Route::post('/carrinho', [ClientController::class, 'finish'])->name('user.index');
});

Route::prefix('admin')->group(function () {
    Route::get('/produtos', [AdminProductController::class, 'index'])->name('admin.product.index');
    Route::get('/pedidos', [AdminOrderController::class, 'index'])->name('admin.order.index');
});

Route::prefix('admin/produto')->group(function () {
    Route::get('/cadastro', [AdminProductController::class, 'create'])->name('admin.product.create');
    Route::post('/cadastro', [AdminProductController::class, 'store'])->name('admin.product.store');

    Route::get('/editar/{product}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/editar/{product}', [AdminProductController::class, 'update'])->name('admin.product.update');

    Route::delete('/delete/{product}', [AdminProductController::class, 'destroy'])->name('admin.product.destroy');

    Route::get('/delete/image/{product}', [AdminProductController::class, 'destroyImage'])->name('admin.product.destroy.image');
});

Route::prefix('admin/pedido')->group(function () {
    Route::get('/editar/{order}', [AdminOrderController::class, 'create'])->name('admin.order.edit');
    Route::put('/editar/{order}', [AdminOrderController::class, 'store'])->name('admin.order.update');

    Route::delete('/delete/{order}', [AdminOrderController::class, 'destroy'])->name('admin.order.destroy');
});

Route::prefix('pedidos')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');

    Route::get('/cadastro', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/cadastro', [OrderController::class, 'store'])->name('orders.store');
});
