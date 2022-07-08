<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        // dd($orders->toArray());

        return view('admin.orders.index', compact('orders'));
    }
}
