<?php

use Illuminate\Database\Seeder;
use App\Models\Producer;

class ProducerTableSeeder extends Seeder
{
    public function run() :void
    {
        factory(Producer::class, 10)->create();
    }
}
