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
        $user=[[
            'email'=>'admin@admin.com',
            'name'=>'admin',
            'phonenum'=>'0812341234',
            'address'=>'Jl. Jakarta',
            'password'=>bcrypt('admin'),

        ],
      [
            'email'=>'adriansvn0@gmail.com',
            'name'=>'adrian123',
            'phonenum'=>'0812341234',
            'address'=>'Jl. Surabaya',
            'password'=>bcrypt('adrian123'),

        ],
      [
            'email'=>'adrian.putra002@binus.ac.id',
            'name'=>'adrian123',
            'phonenum'=>'0812341234',
            'address'=>'Jl. Bali',
            'password'=>bcrypt('adrian123'),

        ],

    ];
foreach($user as $key=>$value){
       User::create($value);
    }
}
}
