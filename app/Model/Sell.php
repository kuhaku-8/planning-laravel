<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable = ['name', 'price', 'qty'];
}
