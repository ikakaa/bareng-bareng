<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetailsFile extends Model
{
    protected $table = 'product_details_files';

    public function productdetail(){
        // return $this->belongsTo('App\Models\ProductDetail', 'productid');
        return $this->belongsTo(ProductDetail::class, 'productid');
    }

    public $timestamps = true;

}
