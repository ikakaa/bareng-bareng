<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_details';

    public function productdetailfiles(){
        return $this->hasMany('App\ProductDetailFiles');
    }
}
