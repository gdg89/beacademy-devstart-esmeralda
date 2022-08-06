<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductFormRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class AdminProductController extends Controller
{
    /**
     * List all products in the database.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $products = Product::getAllFormatted($request);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
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
            $coverUrl = ($input['cover'])
                ->storeOnCloudinary('devstart/covers')
                ->getSecurePath();
            $input['cover'] = $coverUrl;
        }

        $product = Product::create($input);

        return redirect()
            ->route('admin.products.index')
            ->with('create', "Produto {$product->id} cadastrado com sucesso!");
    }

    /**
     * Show the form for editing a product.
     *
     * @param Product $product
     * @return void
     */
    public function edit(Product $product)
    {
        $product->cover = Product::getProductCoverPath($product);

        return view('admin.products.edit', compact('product'));
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

        if (!empty($input['cover']) && $input['cover']->isValid()) {
            $coverUrl = ($input['cover'])
                ->storeOnCloudinary('devstart/covers')
                ->getSecurePath();
            $input['cover'] = $coverUrl;
        }

        $product->fill($input);
        $product->save();

        return redirect()
            ->route('admin.products.index')
            ->with('edit', "Produto {$product->id} atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete("public/{$product->cover}" ?? '');
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('destroy', "Produto {$product->id} excluído com sucesso!");
    }

    /**
     * Remove the specified resource from storage folder
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroyImage(Product $product)
    {
        Storage::delete("public/{$product->cover}" ?? '');
        $product->cover = null;
        $product->save();

        return back()
            ->with('destroyImage', "Imagem do Produto {$product->id} excluído com sucesso!");
    }
}
