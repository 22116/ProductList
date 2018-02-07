<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run() :void
    {
        $this->call(TypeTableSeeder::class);
        $this->call(ProducerTableSeeder::class);
        $this->call(ProductTableSeeder::class);
    }
}
