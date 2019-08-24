<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $data = $request->only(['email','password']);
        if($auth = Auth::attempt($data)){
            $user = Auth::user();
            $tokenResult = $user->createToken('Laravel password Grant client');
            $token = $tokenResult->token;
            $token->save();
            $user=[
                'name'=>$user->name,
                'email'=>$user->email,
                'token'=>$tokenResult->accessToken,

            ];
            return response()->json($user);
        }
        return response()->json(['message'=>'invalid email or password'],422);
    }
}
