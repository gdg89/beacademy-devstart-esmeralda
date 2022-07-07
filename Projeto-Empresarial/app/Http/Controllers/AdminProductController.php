<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductFormRequest;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


class AdminProductController extends Controller
{

    /**
     * List all products in the database.
     *
     * @return void
     */
    public function index()
    {
        $products = Product::all();

        foreach ($products as $product) {
            $product->price_cost = Product::format_price($product->price_cost);
            $product->price_sell = Product::format_price($product->price_sell);
            $product->cover = Product::getProductCoverPath($product);
        }

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a new Product on database.
     *
     * @param StoreProductFormRequest $request
     * @return void
     */
    public function store(StoreProductFormRequest $request)
    {
        $input = $request->all();

        $input['slug'] = Str::slug($input['name']);

        if ($input['cover']->isValid()) {
            $path = $input['cover']->store('products_covers', 'public');
            $input['cover'] = $path;
        }

        // dd($input);

        Product::create($input);

        return Redirect::route('admin.product.index');
    }

    /**
     * Show the form for editing a product.
     *
     * @param Product $product
     * @return void
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update a product on database.
     *
     * @param StoreProductFormRequest $request
     * @param Product $product
     * @return void
     */
    public function update(StoreProductFormRequest $request, Product $product)
    {
        $input = $request->validated();

        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
    }

    /**
     * Remove the specified resource from storage folder
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroyImage(Product $product)
    {
    }
}
