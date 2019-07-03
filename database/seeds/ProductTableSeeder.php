<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 30; $i++) {
            DB::table('products')->insert([
                'title' => str_random(20),
                'slug' => str_random(20),
                'description' => str_random(150),
                'image' => str_random(8) . '.png',
            ]);
        }
    }
}
