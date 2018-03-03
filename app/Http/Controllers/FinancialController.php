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
            $countdebt+=($debt->total-$debt->balance);
        }

        $owes=FinancialOwe::all();
        $countowe=0;
        foreach ($owes as $owe) {
            $countowe+=$owe->balance;
        }

        $haves=ItemHistory::all();
        $counthave=0;
        foreach ($haves as $have){
            $counthave+=$have->price*$have->qty;
        }

        return view('application/financial',['totaldebt'=>$countdebt,'totalowe'=>$countowe,'totalhave'=>$counthave]);
    }
}
