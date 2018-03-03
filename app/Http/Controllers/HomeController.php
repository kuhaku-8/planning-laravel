<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\FinancialOwe;
use App\Model\FinancialDebt;
use App\Model\ItemBuy;
use App\Model\ItemHistory;

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
            $countdebt+=($debt->total-$debt->balance);
            $debtcount++;
        }

        $owes=FinancialOwe::all();
        $countowe=0;
        $owecount=0;
        foreach ($owes as $owe) {
            $countowe+=$owe->balance;
            $owecount++;
        }

        $total=$countowe-$countdebt;

        $itemhistorys = ItemHistory::orderby('id','desc')->get();
        $itembuys = ItemBuy::orderBy('price', 'asc')->get();
        $no=1;

        return view('home',['debt'=>$debtcount,'owe'=>$owecount,'total'=>$total,'itembuys'=>$itembuys,'itemhistorys'=>$itemhistorys,'nobuy'=>$no,'nohistory'=>$no]);
    }
}
