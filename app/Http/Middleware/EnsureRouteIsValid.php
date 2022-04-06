<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Redirect;
use Auth;

class EnsureRouteIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ids = Auth::id();
		$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		
		
		
		
	
		
		if (Auth::check() && Auth::user()->name == 'ABHAY SINGH') {
            return redirect('empss');
        }
		else {
            
        }
		
    }
}
