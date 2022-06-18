<?php

namespace Database\Seeders;

use App\Models\ProductDetail;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product=[[
            'user_id'=>'3',
            'product_name'=>'GMK-ABC',
            'folderpath'=>'img/productseederimg1',
            'owner'=>'adrian123',
            'shortdesc'=>'This is product 1',
            'product_type'=>'customkeyboard',
            'productlist'=>'red switch',
            'moq'=>'1',
            'productstock'=>'10',
            'productprice'=>'10000',
            'startdate'=>'2022-06-13',
            'enddate'=>'2022-12-13',
            'enddategb'=>'2023-12-13',
            'endtime'=>'18:06',
            'shippingdate'=>'2023-06-13',
            'discordlink'=>'https://discord.gg/',
            'deleted'=>'0',
            'verified'=>'1',
            'rejectreason'=>'0',
            'interestdone'=>'0',
            'isfinish'=>'0',
            'icfail'=>'0',


        ],
      [
        'user_id'=>'3',
        'product_name'=>'Keychron Q1',
        'folderpath'=>'img/productseederimg2',
        'owner'=>'adrian123',
        'shortdesc'=>'This is product 2',
        'product_type'=>'customkeyboard',
        'productlist'=>'red switch',
        'moq'=>'1',
        'productstock'=>'10',
        'productprice'=>'10000',
        'startdate'=>'2022-06-13',
        'enddate'=>'2022-12-13',
        'enddategb'=>'2023-12-13',
        'endtime'=>'18:06',
        'shippingdate'=>'2023-06-13',
        'discordlink'=>'https://discord.gg/',
        'deleted'=>'0',
        'verified'=>'1',
        'rejectreason'=>'0',
        'interestdone'=>'0',
        'isfinish'=>'0',
        'icfail'=>'0',

        ],
      [
        'user_id'=>'3',
        'product_name'=>'QK65',
        'folderpath'=>'img/productseederimg3',
        'owner'=>'adrian123',
        'shortdesc'=>'This is product 3',
        'product_type'=>'customkeyboard',
        'productlist'=>'red switch',
        'moq'=>'1',
        'productstock'=>'10',
        'productprice'=>'10000',
        'startdate'=>'2022-06-13',
        'enddate'=>'2022-12-13',
        'enddategb'=>'2023-12-13',
        'endtime'=>'18:06',
        'shippingdate'=>'2023-06-13',
        'discordlink'=>'https://discord.gg/',
        'deleted'=>'0',
        'verified'=>'1',
        'rejectreason'=>'0',
        'interestdone'=>'0',
        'isfinish'=>'0',
        'icfail'=>'0',

        ],
    ];
    foreach($product as $key=>$value){
        ProductDetail::create($value);
     }

    }
}
