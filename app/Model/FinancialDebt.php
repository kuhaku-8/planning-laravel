<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FinancialDebt extends Model
{
    public $timestamp = 'false';
    protected $table = 'berhutang';
    protected $guarded = ['id_berhutang'];
}
