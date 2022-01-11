<?php

namespace App;

use App\OrderContent;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =['user_id','subtotal','shipping','total','payment_status','general_status', 'public_key'];

    public function content(){
        return $this->hasMany(OrderContent::class);
    }
}
