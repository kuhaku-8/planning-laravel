<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FinancialOwe extends Model
{
    public $timestamp = 'false';
    protected $table = 'yang_hutang';
    protected $guarded = ['id_yang_hutang'];
}