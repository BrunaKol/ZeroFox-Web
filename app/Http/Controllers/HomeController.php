<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index (){
         return view("home");
     }
    
}
