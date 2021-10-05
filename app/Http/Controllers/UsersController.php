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

class UsersController extends Controller
{
    //

    /**/ 
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:Administrator');
    }

    /*prikaz korisnika*/
    public function index()
    {
        $users = DB:: table("users")->get();
    
        return view('users', ["users"=>$users]); 
    }

    /*brisanje iz baze */

    public function delete($id){
        DB::table("users")->where("id", $id)->delete();
        return redirect('users');
    }

    /*promjena podataka u bazi, prima crud objekt id od korisnika i koristimo ga u edit bladeu 
    public function edit($id)  
    {  
        return view('edit');
    }  */

    public function edit(User $user)
    {
        return view('edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $project
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user->update($request->all());

        return redirect('users')
            ->with('success', 'User updated successfully');
    }

    /*dodavanje u bazu*/

    public function add(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
                return redirect('/prijava')->withErrors($validator)->withInput();
            }
            
        }else {
        User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        if($request->ajax()) return Response::json(array('success' => true), 200);
        return redirect("users");}
    }
}
