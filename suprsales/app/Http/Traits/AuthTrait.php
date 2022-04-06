<?php
namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

trait AuthTrait {
    
	
        public function index() {
        $auths = Http::get('http://localhost/suprsales_api/Authorization/')->json();
		$roles = Http::get('http://localhost/suprsales_api/Role/')->json();
         
		  if(isset(Auth::user()->id)){
		  $ids = Auth::user()->emp_id;
		   $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'roles'){
				$count = 1;	
				break;
			}
        }
		}
		
		if($count == 1){
			return view('role')->with(compact('announcement','auths','roles','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
		
        //return response()->view('cust', $data, 200);
		//return view('role')->with(compact('auths','roles'));
    }
    
}