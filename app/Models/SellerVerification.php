<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class SellerVerification extends Model
{
    protected $table = 'seller_verifications';
    public function sellerverification(){
        //sambungin productid di table product_details_file ke table product_details
        return $this->belongsTo(User::class, 'user_id');
    }
    public $timestamps = true;

}
