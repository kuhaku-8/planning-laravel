<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Model\FinancialOwe;

class FinancialOweController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        $financialowe=FinancialOwe::all();
        $no=1;
        //dd($itemhistory);
        return view('/application/financialowe',['financialowe'=>$financialowe,'no'=>$no]);
    }
}
