<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\FinancialDebtPaid;

class FinancialDebtPaidController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $financialdebtpaids=FinancialDebtPaid::orderBy('id','desc')->get();
        $no=1;
        return view('/application/financialdebtpaid',['financialdebtpaids'=>$financialdebtpaids,'no'=>$no]);
    }
}
