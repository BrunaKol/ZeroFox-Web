<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;


class AddressController extends Controller
{
    public function show($user_id)
    {

        $address = Address::find($user_id);
        
        return view("address", compact('address')); 

    }


    public function add(Request $request){
        $data = $request->all();
        $user = Auth::user();
        $userid = $user->id;
        $validator = Validator::make($data, [
            'country' => ['required', 'string', 'max:255'],
            'postalcode' => ['required', 'integer'],
            'region' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
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
        Address::create([
            'user_id' => auth()->user()->id,
            'country' => $data['country'],
            'postalcode' => $data['postalcode'],
            'region' => $data['region'],
            'address' => $data['address'],
        ]);
        if($request->ajax()) return Response::json(array('success' => true), 200);
        return redirect('address/{users_id}');}
    }


    public function mine(){
        return view("mine");
    }
}
