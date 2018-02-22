<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemHistory extends Model
{
  public $timestamp = 'false';
  protected $table = 'barang_punya';
  protected $guarded = ['id'];
}
