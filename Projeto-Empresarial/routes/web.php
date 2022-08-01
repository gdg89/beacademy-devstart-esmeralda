<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminOrderController,
    AdminProductController,
    AdminUserController,
    UserController,
    ProductController,
    LoginController,
    OrderController
};

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/produto/{product:slug}', [ProductController::class, 'show'])->name('product.show');

Route::get('/cadastro', [UserController::class, 'create'])->name('user.create');
Route::post('/cadastro', [UserController::class, 'store'])->name('user.store');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logoff', [LoginController::class, 'logout'])->name('logoff');

Route::group(['prefix' => 'usuario', 'middleware' => ['auth']], function () {
    Route::get('/{user}', [UserController::class, 'show'])->name('user.show');

    Route::get('/editar/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/editar/{user}', [UserController::class, 'update'])->name('user.update');

    Route::get('/{user}/pedido/{order}', [UserController::class, 'order'])->name('user.order');
});

Route::group(['prefix' => 'pedidos', 'middleware' => ['auth']], function () {
    Route::get('/checkout', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/checkout', [OrderController::class, 'store'])->name('orders.store');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/usuarios', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/produtos', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/pedidos', [AdminOrderController::class, 'index'])->name('admin.orders.index');

    Route::prefix('/usuario')->group(function () {
        Route::get('/cadastro', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/cadastro', [UserController::class, 'store'])->name('admin.users.store');

        Route::get('/editar/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/editar/{user}', [UserController::class, 'update'])->name('admin.users.update');

        Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });

    Route::prefix('/produto')->group(function () {
        Route::get('/cadastro', [AdminProductController::class, 'create'])->name('admin.products.create');
        Route::post('/cadastro', [AdminProductController::class, 'store'])->name('admin.products.store');

        Route::get('/editar/{product}', [AdminProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/editar/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');

        Route::delete('/delete/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

        Route::get('/delete/image/{product}', [AdminProductController::class, 'destroyImage'])->name('admin.products.destroy.image');
    });

    Route::prefix('/pedido')->group(function () {
        Route::get('/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');

        Route::get('/editar/{order}', [AdminOrderController::class, 'edit'])->name('admin.orders.edit');
        Route::put('/editar/{order}', [AdminOrderController::class, 'update'])->name('admin.orders.update');

        Route::delete('/delete/{order}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');
    });
});
