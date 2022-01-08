<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['user_id','phone','street','enumber','inumber','city','state','suburb','zip','phone2','instructions'];
}
