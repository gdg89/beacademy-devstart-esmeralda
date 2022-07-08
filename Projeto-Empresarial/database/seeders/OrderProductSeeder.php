<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\order_product;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('order_product')->insert([
                'order_id' => Order::all()->random()->id,
                'product_id' => Product::all()->random()->id,
            ]);
        }
    }
}
