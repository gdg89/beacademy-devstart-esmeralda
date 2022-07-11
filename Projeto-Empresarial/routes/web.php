<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminOrderController,
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
    Route::get('/carrinho', [ClientController::class, 'cart'])->name('users.cart.index');
});

Route::prefix('admin')->group(function () {
    Route::get('/produtos', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/pedidos', [AdminOrderController::class, 'index'])->name('admin.orders.index');
});

Route::prefix('admin/produto')->group(function () {
    Route::get('/cadastro', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/cadastro', [AdminProductController::class, 'store'])->name('admin.products.store');

    Route::get('/editar/{product}', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/editar/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');

    Route::delete('/delete/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

    Route::get('/delete/image/{product}', [AdminProductController::class, 'destroyImage'])->name('admin.products.destroy.image');
});

Route::prefix('admin/pedido')->group(function () {
    Route::get('/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');

    Route::get('/editar/{order}', [AdminOrderController::class, 'edit'])->name('admin.orders.edit');
    Route::put('/editar/{order}', [AdminOrderController::class, 'update'])->name('admin.orders.update');

    Route::delete('/delete/{order}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');
});

Route::prefix('pedidos')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');

    Route::get('/cadastro', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/cadastro', [OrderController::class, 'store'])->name('orders.store');
});
