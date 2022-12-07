<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'=> 'Red Dress',
            'price'=> '100000',
            'detail'=> 'Ini Dress Warna Merah Merona',
            'stock'=>'10',
            'image'=>'product/RedDress.jpeg'
        ]);

        Product::create([
            'name'=> 'Red Jacket',
            'price'=> '150000',
            'detail'=> 'Ini Jaket Warna Merah Merona',
            'stock'=>'12',
            'image'=>'product/RedJacket.jpg'
        ]);


    }
}
