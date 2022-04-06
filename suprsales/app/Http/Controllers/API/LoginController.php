<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	 
	$username =  $request->get("username");
    $password =  $request->get("password");	
	
	
	$users = Http::get('http://localhost/suprsales_api/Dummy/')->json();
	
	foreach($users as $user) {
		if($user['username'] == $username) {
			if($user['password'] == $password) {
				return redirect()->intended('adminn');
			}
			else
			{
			return back()->with('danger','Incorrect Login Details');	
			}
		}
		else {
			return back()->with('danger','Incorrect Login Details');
		}
	
	
	}
	
	
    }

    public function userlogin(Request $request)
    {
	 
	$username =  $request->get("username");
    $password =  $request->get("password");	
	
	
	$users = Http::get('http://localhost/suprsales_api/Dummy/')->json();
	
	foreach($users as $user) {
		if($user['username'] == $username) {
			if($user['password'] == $password) {
				return redirect()->intended('adminn');
			}
			else
			{
			return back()->with('danger','Incorrect Login Details');	
			}
		}
		else {
			return back()->with('danger','Incorrect Login Details');
		}
	
	
	}
	
    }
	
    public function show($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
