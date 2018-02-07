<?php

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeTableSeeder extends Seeder
{
    public function run() :void
    {
	    factory(Type::class, 5)->create();
    }
}
