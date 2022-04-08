<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $dates = ['date'];

    public function orders(){
        return $this->belongsTo(Orders::class, 'order_id');
    }
}
