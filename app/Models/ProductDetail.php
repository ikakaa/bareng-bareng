<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_details';

    public function productdetailfiles(){
        //sambungin id di table product_details ke table product_details_files
        return $this->hasOne(ProductDetailsFile::class, 'id');
    }

    public $timestamps = true;
}
