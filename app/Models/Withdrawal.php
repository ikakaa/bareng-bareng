<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class withdrawal extends Model
{
    protected $table = 'withdrawals';

    public function product_details(){
        return $this->hasMany(ProductDetail::class, 'seller_id');
    }

    public $timestamps = true;
}
