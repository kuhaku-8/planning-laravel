<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Model\FinancialDebt;

class FinancialDebtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $rules=[
        'name' => 'required|min:5',
        'total' => 'required|min:500|numeric'
    ];

    public function index(){
        $financialdebts=FinancialDebt::all();
        return view('application.financialdebt',['financialdebts'=>$financialdebts]);
    }
}
