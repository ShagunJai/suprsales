<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Redirect;
//use Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Session;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;



class CustLoginController extends Controller
{


	public function index()
	{

		return view('login');
	}




	public function store(Request $request)
	{

		// This is for the autthetication of the customer

		$cust_id = $request->get('cust_id');
    
		$customer_data = Customer::where('cust_id', $cust_id)->first();
		if ($customer_data != null) {

			if ($customer_data['flag'] == 1) { // flag =1 signifies active/deactive customer

				$customer_auth_data = array(
					'cust_id'  => $request->get('cust_id'),
					'password' => $request->get('password')
				);

				$password = $request->get('password');
				$remember = $request->has('remember_me') ? true : false;



				$LOGIN_TIME = Carbon::now()->toDateTimeString();
				$LOGOUT_TIME = Carbon::now()->toDateTimeString();

				Session::put('LOGIN_TIME', $LOGIN_TIME);
				$APP_VERSION = "1.0";
				$DEVICE_MODEL = $request->get('device');
				$BROWSER = $request->get('browser');
				//dd($BROWSER);
				if ($BROWSER == "Browser Not compatible.") {
					return back()->with('message', 'This Application supports only Chrome/Firefox.');
				}

				if ($DEVICE_MODEL == "Android" || $DEVICE_MODEL == "iOS") {
					$DEVICE_TYPE = "Mobile";
				} else {
					$DEVICE_TYPE = "Desktop";
				}

				$client = new Client([
					// Base URI is used with relative requests
					'base_uri' => 'http://localhost',
				]);


				if (Auth::attempt($customer_auth_data, $remember)) {


					$request->session()->regenerate();
					$EMP_ID = Auth::user()->cust_id;


				/*	$response = $client->request('POST', '/suprsales_api/Login_Details/createloginDetails.php', [
						'json' => [
							'LOGIN_TIME' => $LOGIN_TIME,
							'APP_VERSION' => $APP_VERSION,
							'DEVICE_TYPE' => $DEVICE_TYPE,
							'DEVICE_MODEL' => $DEVICE_MODEL,
							'EMP_ID' => $EMP_ID,
							'LOGIN_LONG' => "0",
							'LOGIN_LAT' => "0",
							'MAKE' => "0",
							'FORCE_LOGOUT_STATUS' => "0",
							'LOGOUT_TIME' => $LOGOUT_TIME,
							'LOGOUT_LONG' => "0",
							'LOGOUT_LAT' => "0"
						]
					]);*/



					Auth::logoutOtherDevices($password);

					$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $cust_id)->json();
					$count = 'error';
					if (isset($ann)) {
						foreach ($ann as $val) {
							if ($val['auth_reference'] == 'home') {
								$count = $val['auth_reference'];
								break;
							} else {
								$count = $val['auth_reference'];
							}
						}
					}
					return redirect()->intended($count);
				}
				return back()->with('error', 'Wrong Login Details of customer. Here is the problem');
			} 
			else {
				return back()->with('error', 'Customer is deactive. Please contact your Administrator');
			}
		} 
		else {
			return back()->with('error', 'Customer Not Found');
		}
	  
	
	}

/*	public function storee(Request $request)
	{

		// This is for the customer 
		$emp_id = $request->get('empp_id');
        if($emp_id == "samishti"){


		
		
		//$emp_id = $request->get('emp_id');
		$user = Customer::where('emp_id', $emp_id)->first();
		if ($user != null) {

			if ($user['flag'] == 1) {

				$user_data = array(
					'emp_id'  => $request->get('emp_id'),
					'password' => $request->get('password')
				);

				$password = $request->get('password');
				$remember = $request->has('remember_me') ? true : false;



				$LOGIN_TIME = Carbon::now()->toDateTimeString();
				$LOGOUT_TIME = Carbon::now()->toDateTimeString();

				Session::put('LOGIN_TIME', $LOGIN_TIME);
				$APP_VERSION = "1.0";
				$DEVICE_MODEL = $request->get('device');
				$BROWSER = $request->get('browser');
				//dd($BROWSER);
				if ($BROWSER == "Browser Not compatible.") {
					return back()->with('message', 'This Application supports only Chrome/Firefox.');
				}

				if ($DEVICE_MODEL == "Android" || $DEVICE_MODEL == "iOS") {
					$DEVICE_TYPE = "Mobile";
				} else {
					$DEVICE_TYPE = "Desktop";
				}

				$client = new Client([
					// Base URI is used with relative requests
					'base_uri' => 'http://localhost',
				]);


				if (Auth::attempt($user_data, $remember)) {


					$request->session()->regenerate();
					$EMP_ID = Auth::user()->emp_id;


					$response = $client->request('POST', '/suprsales_api/Login_Details/createloginDetails.php', [
						'json' => [
							'LOGIN_TIME' => $LOGIN_TIME,
							'APP_VERSION' => $APP_VERSION,
							'DEVICE_TYPE' => $DEVICE_TYPE,
							'DEVICE_MODEL' => $DEVICE_MODEL,
							'EMP_ID' => $EMP_ID,
							'LOGIN_LONG' => "0",
							'LOGIN_LAT' => "0",
							'MAKE' => "0",
							'FORCE_LOGOUT_STATUS' => "0",
							'LOGOUT_TIME' => $LOGOUT_TIME,
							'LOGOUT_LONG' => "0",
							'LOGOUT_LAT' => "0"
						]
					]);



					Auth::logoutOtherDevices($password);

					$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $emp_id)->json();
					$count = 'error';
					if (isset($ann)) {
						foreach ($ann as $val) {
							if ($val['auth_reference'] == 'dashboard') {
								$count = $val['auth_reference'];
								break;
							} else {
								$count = $val['auth_reference'];
							}
						}
					}


					return redirect()->intended($count);
				}
				return back()->with('error', 'Wrong Login Details');
			} else {
				return back()->with('error', 'User Not Found');
			}
		} else {
			return back()->with('error', 'User Not Found');
		}

	  }
	else {
	 	return back()->with('error', 'You are an Customer');
	}


	}


*/


	public function logout(Request $request)
	{


		if (isset(Auth::user()->id)) {


			$login_time = Session::get('LOGIN_TIME');
			$LOGOUT_TIME = Carbon::now()->toDateTimeString();
			$EMP_ID = Auth::user()->cust_id;


			$client = new Client([
				// Base URI is used with relative requests
				'base_uri' => 'http://localhost',
			]);

			$response = $client->request('POST', '/suprsales_api/Login_Details/updateLoginDetails.php', [
				'json' => [
					'LOGIN_TIME' => $login_time,
					'EMP_ID' => $EMP_ID,
					'LOGOUT_TIME' => $LOGOUT_TIME
				]
			]);




			Auth::logout();
			$request->session()->invalidate();

			$request->session()->regenerateToken();


			return redirect('/userlogin');
			//return redirect()->intended('/userlogin');
			//return (request()->header('userlogin')) ?  : redirect('userlogin');
			//return (request()->header('userlogin/logout')) ? redirect('userlogin') : redirect('userlogin');


		} else {
			return redirect('/userlogin')->with('error', 'User Not Found');
		}
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
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

		return response()->download('storage/suprsales.apk');
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
