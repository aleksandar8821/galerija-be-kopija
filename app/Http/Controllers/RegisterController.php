<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class RegisterController extends Controller
{
    public function register(Request $request){

        $isValidated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'min:8', 'regex:~[0-9]~', 'confirmed'],
            'password_confirmation' => ['required', 'min:8', 'regex:~[0-9]~'],
            'accepted_terms' => 'accepted'
        ]);



        $user = User::create([
        	'first_name' => $request->first_name,
        	'last_name' => $request->last_name,
        	'email' => $request->email,
        	'password' => bcrypt($request->password)
    	]);
        
        $token = \JWTAuth::fromUser($user);
        \Auth::login($user);
        $logedUser = \Auth::user();
    	return response()->json(compact('token', 'logedUser'));
    }

}
