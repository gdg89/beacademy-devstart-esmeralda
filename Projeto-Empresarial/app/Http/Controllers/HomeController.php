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

        $products = $products->paginate(12);

        foreach ($products as $product) {
            $product->price_sell = Product::format_price($product->price_sell);
            $product->cover = Product::getProductCoverPath($product);
        }

        if ($request->search) {
            $products->appends('search', $request->search);
        }

        return view('home', [
            'products' => $products
        ]);
    }
}
