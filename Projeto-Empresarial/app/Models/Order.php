<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
    ];

    protected $with = ['user', 'products'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    static public function getStatusList()
    {
        $orders = Order::all();

        $statusList = [];

        foreach ($orders as $order) {
            if (!in_array($order->status, $statusList)) {
                $statusList[] = $order->status;
            }
        }

        return $statusList;
    }

    /**
     * Get the total, cost, and profit  of the order.
     *
     * @param Order $order
     * @return void
     */
    static public function setOrderInfo(Order $order)
    {
        $order->quantity = $order->products->count();

        $order->cost = $order->products->sum('price_cost');
        $order->total = $order->products->sum('price_sell');
        $order->profit = $order->total - $order->cost;

        $order->cost = Product::format_price($order->cost);
        $order->total = Product::format_price($order->total);
        $order->profit = Product::format_price($order->profit);
    }

    /**
     * Set unique product information in the order.
     *
     * @param Product $product
     * @param int $productQuantity
     * @return Collection
     */
    static public function setProductInfo(Product $product, int $productQuantity)
    {
        $product->quantity = $productQuantity;

        $product->total_cost = $product->quantity * $product->price_cost;
        $product->total = $product->quantity * $product->price_sell;
        $product->profit = $product->total - $product->total_cost;

        $product->total_cost = Product::format_price($product->total_cost);
        $product->total = Product::format_price($product->total);
        $product->profit = Product::format_price($product->profit);

        $product->price_cost = Product::format_price($product->price_cost);
        $product->price_sell = Product::format_price($product->price_sell);
    }

    /**
     * Get unique products in the order.
     *
     * @param Order $order
     * @return Collection
     */
    static public function getUniqueProducts(Order $order): Collection
    {
        foreach ($order->products as $product) {

            $productId = $product->id;

            if (isset($order->$productId)) {
                $order->$productId += 1;
            }

            if (!isset($order->$productId)) {
                $order->$productId = 1;
            }
        }

        $uniqueProducts = $order->products->unique();

        foreach ($uniqueProducts as $product) {
            self::setProductInfo($product, $order[$product->id]);
        }

        return $uniqueProducts;
    }
}
