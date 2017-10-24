<?php

namespace App\Http\Controllers;

use Request;
use App\Release;
use Carbon\Carbon;

class ReleaseController extends Controller
{
    public function create(){
    	$params = Request::only(['description', 'user_id', 'method_id', 'category_id', 'value']);
    	$r = Release::create($params);
        return Response()->json(['status' => ($r) ? 200 : 400, 'body' => $r]);
    }

    public function find(){
    	$release = Release::find(Request::input('id'))->first();
    	$release['category'] = $release->category;
        $release['method'] = $release->method;
    	return Response()->json(['status' => ($release) ? 200 : 404, 'body' => $release]);
    }

    public function delete(){
        $r = Release::destroy(Request::input('id'));
        return Response()->json(['stauts' => ($r) ? 200 : 404]);
    }

    public function update(){
        $r = Release::find(Request::input('id'))->update(Request::all());
        return Response()->json(['status' => ($r) ? 200 : 404, 'body' => $r]);
    }

    public function findWeekly(){
        $startOfWeek = Carbon::now('America/Sao_Paulo')->startOfWeek();
        $endOfWeek = Carbon::now('America/Sao_Paulo')->endOfWeek();
        $releases = Release::where('user_id', '=', Request::input('user_id'))
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        $releases->map(function($release){
            $release['category'] = $release->category;
            $release['method'] = $release->method;
        });

        return Response()->json(['status' => ($releases) ? 200 : 404, 'body' => $releases]);
    }

    public function findMonth(){
        $startOfMonth = Carbon::now('America/Sao_Paulo')->startOfMonth();
        $endOfMonth = Carbon::now('America/Sao_Paulo')->endOfMonth();
        $releases = Release::where('user_id', '=', Request::input('user_id'))
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])->get();
        $releases->map(function($release){
            $release['category'] = $release->category;
            $release['method'] = $release->method;
        });
        return Response()->json( ['status' => ($releases) ? 200 : 404, 'body' => $releases] );
    }
}
