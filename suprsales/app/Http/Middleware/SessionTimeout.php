<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use GuzzleHttp\Client;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SessionTimeout
{

    public function __construct()
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
		
		if (!Session::has('lastActivityTime')) {
            Session::put('lastActivityTime', time());
        }
		
      if (Session::has('lastActivityTime') && (time() - Session::get('lastActivityTime')) >= 7200) {
	if(isset(Auth::user()->id)){
		$login_time = Session::get('LOGIN_TIME');
		$EMP_ID = Auth::user()->emp_id;
		$LOGOUT_TIME = Carbon::now()->toDateTimeString();
	 
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
		$request->session()->forget('lastActivityTime');
		 $request->session()->invalidate();

      $request->session()->regenerateToken();
	  //return redirect('userlogin');
		}
		
        }

        Session::put('lastActivityTime', time());

        return $next($request);
    }
}