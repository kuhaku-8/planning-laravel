<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemBuy extends Model
{
  public $timestamp = 'false';
  protected $table = 'barang_akan_dibeli';
  protected $guarded = ['id'];
}
