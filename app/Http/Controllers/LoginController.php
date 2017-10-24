<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests\LoginRequest;
use App\User;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
    	$user = User::where('email', '=', $request->input('email') )
			->where('password', '=', $request->input('password') )->first();
    	return Response()->json( ['status_code' => ($user ? 200 : 404 ) , 'body' => $user] );
    }
}
