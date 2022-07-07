<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();

        $products->when($request->search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        });

        $products = $products->get();

        foreach ($products as $product) {
            $product->price_sell = Product::format_price($product->price_sell);
            $product->cover = Product::getProductCoverPath($product);
        }

        return view('home', [
            'products' => $products
        ]);
    }
}
