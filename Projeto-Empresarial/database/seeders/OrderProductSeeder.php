<?php

namespace Database\Seeders;

use App\Models\OrderProduct;
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
        for ($i = 1; $i < 11; $i++) {
            DB::table('order_product')->insert([
                'order_id' => $i,
                'product_id' => $i,
            ]);
        }

        for ($i = 1; $i < 11; $i++) {
            DB::table('order_product')->insert([
                'order_id' => $i,
                'product_id' => $i,
            ]);
        }

        OrderProduct::factory(10)->create();
    }
}
