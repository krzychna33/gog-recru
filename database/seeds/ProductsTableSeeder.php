<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => "Fallout",
            'price' => 1.99
        ]);

        DB::table('products')->insert([
            'title' => "Don't Strave",
            'price' => 2.99
        ]);

        DB::table('products')->insert([
            'title' => "Baldur's Gate",
            'price' => 3.99
        ]);
    }
}
