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

        [
            'productid'=>'4',
            'filename'=>'1657003245903.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg4/1657003245903.jpg',


        ],

        [
            'productid'=>'5',
            'filename'=>'1657003625628.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg5/1657003625628.jpg',


        ],

        [
            'productid'=>'6',
            'filename'=>'1657004404889.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg6/1657004404889.jpg',


        ],
        
        [
            'productid'=>'7',
            'filename'=>'1657004542862.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg7/1657004542862.jpg',


        ],

        [
            'productid'=>'8',
            'filename'=>'1657004675431.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg8/1657004675431.jpg',


        ],

        [
            'productid'=>'9',
            'filename'=>'1657004775255.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg9/1657004775255.jpg',


        ],

        
        [
            'productid'=>'10',
            'filename'=>'1657004932107.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg10/1657004932107.jpg',


        ],

        [
            'productid'=>'11',
            'filename'=>'1657005153065.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg11/1657005153065.jpg',


        ],
        
        [
            'productid'=>'12',
            'filename'=>'1657005434708.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg12/1657005434708.jpg',


        ],

        [
            'productid'=>'13',
            'filename'=>'1657005450276.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg13/1657005450276.jpg',


        ],


        [
            'productid'=>'14',
            'filename'=>'1657005676616.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg14/1657005676616.jpg',


        ],

        [
            'productid'=>'15',
            'filename'=>'1657006173550.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg15/1657006173550.jpg',


        ],

        [
            'productid'=>'16',
            'filename'=>'1657006285189.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg16/1657006285189.jpg',


        ],

        [
            'productid'=>'17',
            'filename'=>'1657006367341.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg17/1657006367341.jpg',


        ],

        [
            'productid'=>'18',
            'filename'=>'1657006437658.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg18/1657006437658.jpg',


        ],

        [
            'productid'=>'19',
            'filename'=>'1657006490810.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg19/1657006490810.jpg',


        ],

        [
            'productid'=>'20',
            'filename'=>'1657006545713.jpg',
            'filesize'=>'181989',
            'filepath'=>'img/productseederimg20/1657006545713.jpg',


        ],


    ];

    foreach($productfiles as $key=>$value){
       ProductDetailsFile::create($value);
    }
}}
