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
        $debt=count(FinancialDebt::all());
        $owe=count(FinancialOwe::all());

        $item_check = ItemBuy::orderBy('harga', 'asc')->first();

        return view('home',['debt'=>$debt,'owe'=>$owe,'item_check'=>$item_check]);
    }
}
