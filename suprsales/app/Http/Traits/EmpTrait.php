<?php
namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

trait EmpTrait {
    public function getEmpAll() {
        // Get all the brands from the Brands Table.
		
        $data['admins'] = Http::get('http://localhost/suprsales_api/Employee/')->json();

        //return response()->view('cust', $data, 200);
		return $data['admins'];
 
    }
	public function authAll() {
        // Get all the brands from the Brands Table.
        $data['admins'] = Http::get('http://localhost/suprsales_api/Authorization/')->json();

        //return response()->view('cust', $data, 200);
		return $data['admins'];
    }
	protected function serializeDate(DateTimeInterface $date) : string
    {
        return $date->format('Y-m-d');
    }
}