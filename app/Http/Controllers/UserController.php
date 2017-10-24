<?php

namespace App\Http\Controllers;

use Request;
use App\Release;
use App\User;

class UserController extends Controller
{
    public function findReleases(){
    	$params = Request::only(['user_id']);
    	$releases = Release::where('user_id', '=', $params['user_id'])->get();
    	$releases->map(function($release){
            $release['category'] = $release->category;
            $release['method'] = $release->method;
        });
    	return Response()->json( ['status_code' => ($releases ? 200 : 404 ) , 'body' => $releases] );
    }

    public function update(){
        $u = User::find(Request::input('user_id'))->update(Request::all());
        return Response()->json(['status' => ($u) ? 200 : 404, 'body' => null]);
    }
}
