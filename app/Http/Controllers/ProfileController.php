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
    /*public function show($id = null)
    {
        if (Auth::check()){
            $userId = Auth::user()->getId();
            $user = User::with('profile')->findOrFail($userId);
        return view('profile.show', compact('user'));
        }
        
        
    }*/

    public function show($user_id)
    {
        /*$userData = DB::table('users')
        ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id'
        ->get();
      return view('profile')->with('userData', $userData);*/





        //$profile = DB::table('profile')->where('user_id', $user_id)->first();


        
        
        
        $profile = Profile::find($user_id);
        
        return view("profile", compact('profile')); 


        /*$user = User::find(1);
        $user_profile = Profile::info($user_id)->first();
        return view('profile.show', compact('profile', 'user'));*/
    }

    
}




?>