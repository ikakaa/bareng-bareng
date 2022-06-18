<?php

namespace Database\Seeders;

use App\Models\ProductDetailsFile;
use Illuminate\Database\Seeder;

class ProductFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productfiles=[
            [
            'productid'=>'1',
            'filename'=>'item1.png',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg1/item1.png',


        ],
            [
            'productid'=>'2',
            'filename'=>'item2.png',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg2/q1.jpg',


        ],
            [
            'productid'=>'3',
            'filename'=>'item3.png',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg3/qk65.jpg',


        ],


    ];

    foreach($productfiles as $key=>$value){
       ProductDetailsFile::create($value);
    }
}}
