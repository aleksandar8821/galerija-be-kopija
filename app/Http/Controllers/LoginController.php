<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
				// $a = '{"aaa": "bbbb"}';
    // 		return $a;

        $credentials = $request->only([ 'email', 'password' ]);

        try {
        	if (! $token = \JWTAuth::attempt($credentials)) {
        		return response()->json(['error' => 'invalid_credentials'], 401);
        	}
        } catch (JWTException $e) {
        	return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    
}
