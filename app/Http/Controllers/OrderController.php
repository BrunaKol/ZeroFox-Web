<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Order;
use App\Models\Order\getId;
use App\Models\User;
use App\Models\Address;
use App\Models\OrderProduct;
use Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function final(){

        return view("final");
    }

    public function checkout(Request $request){
        $data = $request->all();
        $id = Auth::user()->id;
        $address_id = Order::getId('App\Models\Address', 'user_id', $id);


        $validator = Validator::make($data, [
            'phone' => ['required', 'string', 'max:255'],
            'orderdate' => ['required', 'date'],
        ]);

        /*provjera da li je sve ok preko ajaxa i ako nije da error izbaci*/ 
        if ($validator->fails()) {
            if($request->ajax()){
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()
            
                ), 400);
            /*obična provjera */
            }else{
                return redirect('shop')->withErrors($validator)->withInput();
            }
            
        }else {
        Order::create([
            'address_id' => $address_id,
            'phone' => $data['phone'],
            'orderdate' => $data['orderdate'],
        ]);
        if($request->ajax()) return Response::json(array('success' => true), 200);
        return redirect('/shop');}
    }

}
