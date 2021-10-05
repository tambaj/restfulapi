<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $re){
      
        if (Auth::attempt(['email'=>$re->email,'password'=>$re->password])) {
            $user = Auth::user();
           $token= $user->createToken("key")->plainTextToken;
            return response(['user'=>$user,"token"=>$token],200);
        }
        return response(["message" =>' invalid credentials'], 401);

    }
    
}
