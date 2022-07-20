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
        OrderProduct::factory(30)->create();
    }
}
