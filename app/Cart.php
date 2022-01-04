<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['uid','product_id','quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
