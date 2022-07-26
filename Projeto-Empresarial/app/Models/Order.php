<?php

namespace App\Models;

use App\Http\Requests\UpdateOrderFormRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

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

    /**
     * Return orders array with status list, and pagination.
     *
     * @param Request $request
     * @return LengthAwarePaginator $orders
     */
    static public function getAllFormatted(Request $request): LengthAwarePaginator
    {
        $orders = Order::query();

        $orders = $orders->when($request->search, function ($query, $search) {
            return $query->whereHas('user', function ($query) use ($search) {
                $query->where('email', 'like', "%{$search}%");
            });
        });

        $orders = $orders->when($request->status, function ($query, $status) {
            return $query->where('status', $status);
        });

        $orders = $orders->orderBy('id', 'desc')->paginate(10);

        foreach ($orders as $order) {
            Order::setOrderInfo($order);
        }

        $orders->statusList = Order::getStatusList();

        if ($request->search) {
            $orders->appends('search', $request->search);
        }

        return $orders;
    }

    static public function getStatusList()
    {
        $statusList = ['Processando', 'Aprovado', 'Recusado'];

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
        $product->cover = Product::getProductCoverPath($product);
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
        $quantities = [];

        foreach ($order->products as $product) {

            $productId = $product->id;

            if (isset($quantities[$productId])) {
                $quantities[$productId] += 1;
            }

            if (!isset($quantities[$productId])) {
                $quantities[$productId] = 1;
            }
        }

        $uniqueProducts = $order->products->unique();

        foreach ($uniqueProducts as $product) {
            self::setProductInfo($product, $quantities[$product->id]);
        }

        return $uniqueProducts;
    }

    static public function updateProductsAndStatus(UpdateOrderFormRequest $request, Order $order)
    {
        $removeProductIds = array_keys($request->except(['_token', '_method', 'status']));

        // all order products
        $products = $order->products;

        // if removeProductIds is not empty, remove products from order with the same id in removeProductIds
        if (!empty($removeProductIds)) {
            $products = $products->whereNotIn('id', $removeProductIds);
        }

        $order->products()->sync($products);

        $order->status = $request->status;
        $order->save();
    }
}
