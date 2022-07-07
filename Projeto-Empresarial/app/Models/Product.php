<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
