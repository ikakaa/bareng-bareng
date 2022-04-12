<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    protected $table = 'product_comments';

    public function productdetail(){
        //sambungin productid di table product_details_file ke table product_details
        return $this->belongsTo(ProductDetail::class, 'product_id');
    }
}
