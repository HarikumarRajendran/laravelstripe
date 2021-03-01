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
            [
                'name' => 'Samrt Phone',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor',
                'price' => 10000.00,
            ],
            [
                'name' => 'Powerbank',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor',
                'price' => 999.00,
            ],
            [
                'name' => 'Bluetooth Headset',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor',
                'price' => 1300.00,
            ],
            [
                'name' => 'Charger',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor',
                'price' => 899.00,
            ],
            [
                'name' => 'Datacable',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor',
                'price' => 499.00,
            ],
        ]);
    }
}
