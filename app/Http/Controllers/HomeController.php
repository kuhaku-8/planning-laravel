<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\FinancialOwe;
use App\Model\FinancialDebt;
use App\Model\ItemBuy;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $debts=FinancialDebt::all();
        $countdebt=0;
        $debtcount=0;
        foreach ($debts as $debt) {
            $countdebt+=$debt->jumlah_berhutang;
            $debtcount++;
        }

        $owes=FinancialOwe::all();
        $countowe=0;
        $owecount=0;
        foreach ($owes as $owe) {
            $countowe+=$owe->sisa_yang_hutang;
            $owecount++;
        }

        $total=$countowe-$countdebt;

        $item_check = ItemBuy::orderBy('harga', 'asc')->first();

        return view('home',['debt'=>$debtcount,'owe'=>$owecount,'item'=>$item_check,'total'=>$total]);
    }
}
