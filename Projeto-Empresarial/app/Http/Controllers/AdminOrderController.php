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

        $orders = $orders->paginate(5);

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
        $order->statusList = Order::getStatusList();

        return view('admin.orders.edit', compact('order'));
    }

    public function update(UpdateOrderFormRequest $request, Order $order)
    {
        $input = $request->validated();

        $order->fill($input);
        $order->save();

        return redirect()->route('admin.orders.show', $order);
    }
}
