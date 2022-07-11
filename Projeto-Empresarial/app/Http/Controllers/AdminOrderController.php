<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateOrderFormRequest;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::query();

        $orders = $orders->when($request->search, function ($query, $search) {
            return $query->whereHas('user', function ($query) use ($search) {
                $query->where('email', 'like', "%{$search}%");
            });
        });

        $orders = $orders->when($request->status, function ($query, $status) {
            return $query->where('status', $status);
        });

        $orders = $orders->paginate(10);

        foreach ($orders as $order) {
            Order::setOrderInfo($order);
        }

        $orders->statusList = Order::getStatusList();

        if ($request->search) {
            $orders->appends('search', $request->search);
        }

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

        $removeProductIds = array_keys($request->except(['_token', '_method', 'status']));

        // get all products from order
        $products = $order->products;

        // if removeProductIds is not empty, remove products from order with the same id in removeProductIds
        if (!empty($removeProductIds)) {
            $products = $products->whereNotIn('id', $removeProductIds);
        }

        // dd($products);

        //update order products
        $order->products()->sync($products);

        // update order status
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.show', $order);
    }
}
