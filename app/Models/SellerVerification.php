<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class SellerVerification extends Model
{
    // protected $table = 'seller_verifications';
    public function sellerverification(){
        return $this->belongsTo(User::class, 'id');
    }
    public $timestamps = true;

}
