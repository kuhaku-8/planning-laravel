<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use View;

use App\Model\ItemBuy;
use App\Model\ItemHistory;

class ItemBuyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $rules =
        [
            'name' => 'required|min:5',
            'price' => 'required|min:500|numeric',
            'qty' => 'required|min:1|numeric'
        ];

    public function index(){
      $itembuys=ItemBuy::orderBy('price', 'asc')->get();
      return view('application.itembuy',['itembuys'=>$itembuys]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $itembuy = new ItemBuy();
            $itembuy->name = $request->name;
            $itembuy->price = $request->price;
            $itembuy->qty = $request->qty;
            $itembuy->save();
            return response()->json($itembuy);
        }
    }

    public function move(Request $request, $id)
    {
//        $user = User::findOrFail($request->iduser);
//        if($request->via="atm"){
//            $user->atm = $user->atm-($request->price*$request->qty);
//        }
//        else if($request->via="tunai") {
//            $user->cash = $user->cash-($request->price*$request->qty);
//        }
//        $user->save();

        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $itemhistory = new ItemHistory();
            $itemhistory->name = $request->name;
            $itemhistory->price = $request->price;
            $itemhistory->qty = $request->qty;
            $itemhistory->vendor = $request->vendor;
            $itemhistory->official_web = $request->official_web;
            $itemhistory->save();
        }

        $itembuy = ItemBuy::findOrFail($id);
        $itembuy->delete();

        return response()->json($itembuy);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $itembuy = ItemBuy::findOrFail($id);
            $itembuy->name = $request->name;
            $itembuy->price = $request->price;
            $itembuy->qty = $request->qty;
            $itembuy->save();
            return response()->json($itembuy);
        }
    }

    public function destroy($id)
    {
        $itembuy = ItemBuy::findOrFail($id);
        $itembuy->delete();

        return response()->json($itembuy);
    }
}
