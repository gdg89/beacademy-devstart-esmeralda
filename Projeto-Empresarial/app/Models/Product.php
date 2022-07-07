<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='admin_products';
    use HasFactory;
    protected $fillable =[
        'product_name',
        'product_description',
        'stock_quantity',
        'cost_price',
        'sale_price',
        'image'

    ];
}
