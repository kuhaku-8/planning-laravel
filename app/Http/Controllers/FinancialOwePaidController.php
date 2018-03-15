<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\FinancialOwePaid;

class FinancialOwePaidController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $financialowepaids=FinancialOwePaid::orderBy('id','desc')->get();
        $no=1;
        return view('/application/financialowepaid',['financialowepaids'=>$financialowepaids,'no'=>$no]);
    }
}
