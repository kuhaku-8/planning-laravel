<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Sell;

class ProfitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sells=Sell::orderBy('price', 'asc')->get();
        return view('application.profit',['sells'=>$sells]);
    }
}
