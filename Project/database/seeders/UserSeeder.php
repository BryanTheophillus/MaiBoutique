<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id'=>'2',
            'username'=>'member',
            'email'=>'member@gmail.com',
            'password'=>bcrypt('Testing1234'),
            'address'=>'asdsadasd',
            'phonenumber'=>'082122732502',
        ]);

        User::create([
            'role_id'=>'1',
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('Testing1234'),
            'address'=>'sdsdsdasdasd',
            'phonenumber'=>'082225732502',
        ]);
    }
}
