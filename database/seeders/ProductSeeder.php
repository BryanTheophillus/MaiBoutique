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

        Product::create([
            'name'=> 'White Shirt',
            'price'=> '100000',
            'detail'=> 'Ini Baju Putih Banget',
            'stock'=>'15',
            'image'=>'product/WhiteShirt.jpg'
        ]);

        Product::create([
            'name'=> 'Blue Shirt',
            'price'=> '90000',
            'detail'=> 'Ini Baju Biru Gelap',
            'stock'=>'20',
            'image'=>'product/BlueShirt.png'
        ]);

        Product::create([
            'name'=> 'Blue Jacket',
            'price'=> '190000',
            'detail'=> 'Ini Jacket Biru Terang Sekali',
            'stock'=>'25',
            'image'=>'product/BlueJacket.jpeg'
        ]);

        Product::create([
            'name'=> 'White Tshirt Limited Edition ',
            'price'=> '100000',
            'detail'=> 'Ini Baju Ada Gambar Anya',
            'stock'=>'5',
            'image'=>'product/WhiteShirt(Limited).jpg'
        ]);

        Product::create([
            'name'=> 'Bape X Minion Limited ',
            'price'=> '1000000',
            'detail'=> 'Ini Hoodie Bape Ada Minion Banyak',
            'stock'=>'10',
            'image'=>'product/BapexMinion.png'
        ]);

        Product::create([
            'name'=> 'Minion Costume ',
            'price'=> '250000',
            'detail'=> 'Ini Costume Minion Lengkap Atas Bawah',
            'stock'=>'50',
            'image'=>'product/BajuMinion.jpeg'
        ]);

        Product::create([
            'name'=> 'Baju Panda ',
            'price'=> '350000',
            'detail'=> 'Ini Baju Ada Gambar Pandanya',
            'stock'=>'30',
            'image'=>'product/BajuPanda.jpg'
        ]);

        Product::create([
            'name'=> 'Baju Biru ',
            'price'=> '50000',
            'detail'=> 'Ini Baju Bewarna Biru',
            'stock'=>'350',
            'image'=>'product/BajuBiru.png'
        ]);

        Product::create([
            'name'=> 'Kemeja ',
            'price'=> '150000',
            'detail'=> 'Ini Cuma Kemeja Biasa Gak Ada Yang Special',
            'stock'=>'100',
            'image'=>'product/Kemeja.jpg'
        ]);

        Product::create([
            'name'=> 'Kemeja Biru',
            'price'=> '550000',
            'detail'=> 'Ini Kemeja Special Warna Biru',
            'stock'=>'30',
            'image'=>'product/KemejaBiru.jpeg'
        ]);
    }
}
