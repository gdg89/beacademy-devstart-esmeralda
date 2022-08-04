<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::getAllFormatted($request);

        return view('product.index', [
            'products' => $products
        ]);
    }

    /**
     * Display single product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->price_sell = Product::format_price($product->price_sell);
        $product->cover = Product::getProductCoverPath($product);


        return view('product.show', compact('product'));
    }
}
