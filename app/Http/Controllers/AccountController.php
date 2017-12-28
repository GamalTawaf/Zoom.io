<?php

namespace Zoom\Http\Controllers;
use Auth;
use Zoom\User as User;
use Hash;
use Illuminate\Http\Request;

use Zoom\Http\Requests;
use Zoom\Http\Controllers\Controller;

class Accountcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    *Shows the user's information
    */
    public function index()
    {
        $profile = Auth::user();
        $data['profile'] = $profile;
        return view('Admin.UpdateAccount',$data);
    }

    /*
    *updates the user's information
    */
    public function update(Request $request)
    {
        //
        $inputs = $request->all();
        $id                    = trim($inputs['id']);
        $name                  = trim($inputs['name']);
        $email                 = trim($inputs['email']);
        $password              = trim($inputs['password']);
        $passwordConfirmation  = trim($inputs['passwordConfirmation']);
        $hashedPassword        = Hash::make($password);

        $User = User::find($id);
        $User->name     =$name;
        $User->email    =$email;
        $User->password =$hashedPassword;
        if($User->save()) {
            return("Done");
        }
    }

}
