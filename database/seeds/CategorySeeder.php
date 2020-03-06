<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Category::class,3)->create();
        factory(\App\Brand::class,5)->create();
        factory(\App\Product::class,1000)->create();
    }
}
