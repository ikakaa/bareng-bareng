<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetailsFile extends Model
{
    protected $table = 'product_details_files';

    public function productdetail(){
        //sambungin productid di table product_details_file ke table product_details
        return $this->belongsTo(ProductDetail::class, 'productid');
    }

    public $timestamps = true;

}
