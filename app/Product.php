<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','reference','name','description','image','gallery_id','price','discount'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
