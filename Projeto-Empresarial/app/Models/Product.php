<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'stock',
        'cost_price',
        'price_sell'
    ];

    /**
     * @param string $price
     * @return string
     */
    static public function format_price(?string $price): string
    {
        return number_format(!empty($price) ? $price : 0, 2, ",", ".");
    }
}
