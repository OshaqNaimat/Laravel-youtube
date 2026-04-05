<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerUser(Request $req){
       $formFields = [
                "name" => $req->input('name'),
                "email" => $req->input('email'),
                "password" => $req->input('password'),
       ];
        //  hashing the password
        $formFields['password'] = bcrypt($formFields['password']);
          $user = User::create($formFields);
         Auth::login($user);
         return redirect('/')->with('message','👏 Welcome back');
    }





    public function logoutUser(Request $req){
        Auth::logout();
        return redirect('/')->with('message','Hoping to see you again');
    }



    public function loginUser(Request $req){
         $formFields = [
          "email" => $req->input('email'),
          "password" => $req->input('password'),
         ];



          if(Auth::attempt($formFields)){
             return redirect('/')->with('message','👏 Welcome back');
          }else{
              return back()->with('message','🚫 Invalid Credentials');
          }
    }
}
