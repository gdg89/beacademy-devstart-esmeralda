<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(5);

        // dd($orders->toArray());

        foreach ($orders as $order) {
            $order->quantity = $order->products->count();

            $order->cost = $order->products->sum('price_cost');
            $order->total = $order->products->sum('price_sell');
            $order->profit = $order->total - $order->cost;
        }

        foreach ($orders as $order) {
            $order->cost = Product::format_price($order->cost);
            $order->total = Product::format_price($order->total);
            $order->profit = Product::format_price($order->profit);
        }

        return view('admin.orders.index', compact('orders'));
    }
}
