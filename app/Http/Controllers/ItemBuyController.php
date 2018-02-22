<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Model\ItemBuy;

class ItemBuyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
      $itembuy=ItemBuy::orderBy('harga', 'asc')->get();
      $no=1;
      //dd($itemhistory);
      return view('/application/itembuy',['itembuy'=>$itembuy,'no'=>$no]);
    }
}
