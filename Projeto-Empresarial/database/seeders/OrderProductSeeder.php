<?php

namespace Database\Seeders;

use App\Models\OrderProduct;
use App\Models\Product;
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
        // Para não haver pedidos sem produto
        for ($i = 1; $i <= 10; $i++) {
            DB::table('order_product')->insert([
                'order_id' => $i,
                'product_id' => Product::all()->random()->id,
            ]);
        }

        OrderProduct::factory(30)->create();
    }
}
