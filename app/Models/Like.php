<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }
    public function product()
    {
        return $this->belongsTo(ProductDetail::class, 'product_id', 'id');
    }
    use HasFactory;
}
