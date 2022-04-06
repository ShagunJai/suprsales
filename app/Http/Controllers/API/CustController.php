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
	
	
	
	class CustController extends Controller
	{
	
	
		public function index()
		{
	
			return view('login');
		}
	
	
	
	
		public function store(Request $request)
		{
			$emp_id = $request->get('emp_id');
			$customer = Customer::where('emp_id', $emp_id)->first();
			if ($customer != null) {
	
				if ($customer['flag'] == 1) {
	
					$customer_data = array(
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
	
	
					if (Auth::attempt($customer_data, $remember)) {
	
	
						$request->session()->regenerate();
						$EMP_ID = Auth::customer()->emp_id;
	
	
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
					return back()->with('error', 'customer Not Found');
				}
			} else {
				return back()->with('error', 'customer Not Found');
			}
		}
	
		public function logout(Request $request)
		{
	
	
			if (isset(Auth::customer()->id)) {
	
	
				$login_time = Session::get('LOGIN_TIME');
				$LOGOUT_TIME = Carbon::now()->toDateTimeString();
				$EMP_ID = Auth::customer()->emp_id;
	
	
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
	
	
				return redirect('/customerlogin');
				//return redirect()->intended('/customerlogin');
				//return (request()->header('customerlogin')) ?  : redirect('customerlogin');
				//return (request()->header('customerlogin/logout')) ? redirect('customerlogin') : redirect('customerlogin');
	
	
			} else {
				return redirect('/customerlogin')->with('error', 'customer Not Found');
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
	