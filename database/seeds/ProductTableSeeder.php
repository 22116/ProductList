<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    public function run() :void
    {
        factory(Product::class, 50)->create();
    }
}
