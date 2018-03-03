<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Model\ItemHistory;

class ItemHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
      $itemhistorys=ItemHistory::all();
      $no=1;
      return view('/application/itemhistory',['itemhistorys'=>$itemhistorys,'no'=>$no]);
    }
}
