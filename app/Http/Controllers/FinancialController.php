<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\FinancialOwe;
use App\Model\FinancialDebt;
use App\Model\ItemHistory;

class FinancialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $debts=FinancialDebt::all();
        $countdebt=0;
        foreach ($debts as $debt) {
            $countdebt+=$debt->jumlah_berhutang;
        }

        $owes=FinancialOwe::all();
        $countowe=0;
        foreach ($owes as $owe) {
            $countowe+=$owe->sisa_yang_hutang;
        }

        $haves=ItemHistory::all();
        $counthave=0;
        foreach ($haves as $have){
            $counthave+=$have->harga*$have->qty;
        }

        return view('application/financial',['totaldebt'=>$countdebt,'totalowe'=>$countowe,'totalhave'=>$counthave]);
    }
}
