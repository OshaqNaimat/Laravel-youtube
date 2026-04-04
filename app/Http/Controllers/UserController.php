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
         return redirect('/');
    }
}
