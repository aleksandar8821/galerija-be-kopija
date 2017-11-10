<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class RegisterController extends Controller
{
    public function register(Request $request){
        $user = User::create([
        	'first_name' => $request->firstName,
        	'last_name' => $request->lastName,
        	'email' => $request->email,
        	'password' => bcrypt($request->password)
    	]);
      $token = \JWTAuth::fromUser($user);  
    	return response()->json(compact('token', 'user'));
    }

}
