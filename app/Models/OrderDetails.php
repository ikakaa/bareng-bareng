<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';

    public function products(){
        return $this->belongsTo(ProductDetails::class, 'product_id');
    }

    public function orders(){
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public $timestamps = true;
}
