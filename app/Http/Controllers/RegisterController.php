<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class RegisterController extends Controller
{
    public function register(Register $request){
        $user = User::create([
        	'name' => $request->name,
        	'email' => $request->email,
        	'password' => bcrypt($request->password)
    	]);
    	return $user;
    }

}
