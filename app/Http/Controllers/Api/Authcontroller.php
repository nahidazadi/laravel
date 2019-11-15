<?php

namespace App\Http\Controllers\Api;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    public function register(Request $request)
    {
$validatadData = $request->validate([
    'name'=>'required|max:55',
    'email'=>'email|required|unique:users',
    'password'=>'required|confirmed'

]);

$validatadData['password']= bcrypt($request->password);

$user = User::create($validatadData);
$accessToken = $user->createToken('authToken')->accessToken;
return response(['user' =>$user,'access_Token'=>$accessToken]);

    }

    public function login(Request $request)
    {
        $loginDate = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        
        ]);

        if(!auth()->attempt($loginDate))
        {
            return response(['message'=>'Invalid credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(),'access_Token'=>$accessToken]);



    }

}
