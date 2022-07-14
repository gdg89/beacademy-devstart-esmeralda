<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
            $isPlaceholder = Str::contains($product->cover, 'https://via.placeholder.com');

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
