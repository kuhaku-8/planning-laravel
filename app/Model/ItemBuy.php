<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemBuy extends Model
{
    protected $fillable = ['name', 'price', 'qty'];
}
