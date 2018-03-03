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

    public function index(){
        $financialowes=FinancialOwe::all();
        $no=1;
        return view('/application/financialowe',['financialowes'=>$financialowes,'no'=>$no]);
    }
}
