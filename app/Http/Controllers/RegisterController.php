<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests\RegisterRequest;
use App\User;

class RegisterController extends Controller
{
    public function create(RegisterRequest $request){
    	$user = User::create($request->only(['name', 'email', 'password']));
    	return Response()->json( ['status_code' => ($user ? 200 : 404 ) , 'body' => $user] );
    }
}
