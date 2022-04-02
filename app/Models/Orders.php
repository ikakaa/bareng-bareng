<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    public function order_details(){
        return $this->hasMany(OrderDetails::class, 'id');
    }

    public $timestamps = true;
}
