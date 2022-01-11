<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class OrderContent extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity'. 'price_per','discount','shipped_at'];

    public function product(){
        return $this->BelongsTo(Product::class);
    }
}

