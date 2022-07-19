<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateOrderFormRequest;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::getAllFormatted($request);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        Order::setOrderInfo($order);

        $order->uniqueProducts = Order::getUniqueProducts($order);

        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        Order::setOrderInfo($order);
        $order->statusList = Order::getStatusList();
        $order->uniqueProducts = Order::getUniqueProducts($order);

        return view('admin.orders.edit', compact('order'));
    }

    public function update(UpdateOrderFormRequest $request, Order $order)
    {
        Order::updateProductsAndStatus($request, $order);

        return redirect()->route('admin.orders.show', $order);
    }
}
