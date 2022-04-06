<?php
namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

trait AssignRoleTrait {
    
	
        public function index() {
        $emp = Http::get('http://localhost/suprsales_api/Employee/')->json();
		$role = Http::get('http://localhost/suprsales_api/Role/')->json();
		$details = Http::get('http://localhost/suprsales_api/UserMapping/')->json();
		
        //return response()->view('cust', $data, 200);
		return view('assignRole')->with(compact('emp','role','details'));
    }
    
}