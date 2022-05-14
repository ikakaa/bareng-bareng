<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundRequest extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }
    public function order()
    {
        return $this->belongsTo(Orders::class, 'orderid', 'id');
    }

    use HasFactory;
}
