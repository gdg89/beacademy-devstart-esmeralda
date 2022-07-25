<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $table = 'products';

    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price_cost',
        'price_sell',
        'cover',
        'stock',
        'description'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * Return products array with formatted prices, cover path and pagination.
     *
     * @param Request $request
     * @return LengthAwarePaginator $products
     */
    static public function getAllFormatted(Request $request): LengthAwarePaginator
    {
        $products = Product::query();

        $products->when($request->search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        });

        $products = $products
            ->orderBy('id', 'desc')
            ->paginate(12);

        foreach ($products as $product) {
            $product->price_sell = Product::format_price($product->price_sell);
            $product->price_cost = Product::format_price($product->price_cost);
            $product->cover = Product::getProductCoverPath($product);
        }

        if ($request->search) {
            $products->appends('search', $request->search);
        }

        return $products;
    }

    /**
     * Format price to pt-BR format.
     *
     * @param string|float|null $price
     * @return string
     */
    static public function format_price(string|float|null $price): string
    {
        return number_format(!empty($price) ? $price : 0, 2, ",", ".");
    }

    static public function getProductCoverPath(Product|Builder $product)
    {
        if ($product->cover) {
            $isPlaceholder = Str::contains($product->cover, 'https');

            $cover = $isPlaceholder ?
                $product->cover :
                Storage::url($product->cover);
        }

        if (!$product->cover) {
            $cover = "https://dummyimage.com/800x450";
        }

        return $cover;
    }
}
