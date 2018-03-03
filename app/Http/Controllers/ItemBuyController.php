<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use View;

use App\Model\ItemBuy;

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
      $no=1;
      //dd($itemhistory);
      return view('application.itembuy',['itembuys'=>$itembuys,'no'=>$no]);
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

    public function move($id)
    {
        $itembuy = ItemBuy::findOrFail($id);

        return view('application.itembuy', ['itembuy' => $itembuy]);
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
