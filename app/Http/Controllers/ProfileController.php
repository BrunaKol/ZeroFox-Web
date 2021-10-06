<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;




class ProfileController extends Controller
{
    
    public function show($user_id)
    {

        $profile = Profile::find($user_id);
        return view("profile", compact('profile')); 

        /*$userData = DB::table('users')
        ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id'
        ->get();
      return view('profile')->with('userData', $userData);*/
        //$profile = DB::table('profile')->where('user_id', $user_id)->first()
        /*$user = User::find(1);
        $user_profile = Profile::info($user_id)->first();
        return view('profile.show', compact('profile', 'user'));*/
        /*public function show($id = null)
    {
        if (Auth::check()){
            $userId = Auth::user()->getId();
            $user = User::with('profile')->findOrFail($userId);
        return view('profile.show', compact('user'));
        }
    }*/

    }


    public function add(Request $request){
        $data = $request->all();
        $user = Auth::user();
        $userid = $user->id;
        $validator = Validator::make($data, [
            'birthday' => ['required', 'date'],
            'image' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
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
        Profile::create([
            'user_id' => auth()->user()->id,
            'birthday' => $data['birthday'],
            'image' => $data['image'],
            'gender' => $data['gender'],
        ]);
        if($request->ajax()) return Response::json(array('success' => true), 200);
        return redirect('profile/{users_id}');}
    }


    public function mineprofile(){
        return view("mineprofile");
    }

    
}




?>