<?php
namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

trait AuthorizationTrait {
    
	
        public function index() {
		
		$screen = Http::get('http://localhost/suprsales_api/Auth_Reference/getScreen.php')->json();
        $module = Http::get('http://localhost/suprsales_api/Auth_Reference/getModule.php')->json();
        $admins = Http::get('http://localhost/suprsales_api/Authorization/')->json();
         
		  if(isset(Auth::user()->id)){
		  $ids = Auth::user()->emp_id;
		   $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'auths'){
				$count = 1;	
				break;
			}
        }
		}
		
		if($count == 1){
			return view('auths')->with(compact('admins','module', 'screen','announcement','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
        //return response()->view('cust', $data, 200);
		
    }
    
}