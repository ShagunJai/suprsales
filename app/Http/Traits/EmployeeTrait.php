<?php
namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

trait EmployeeTrait {
    
	
        public function index() {
		
		$admins = Http::get('http://localhost/suprsales_api/Employee/')->json();
        $login = Http::get('http://localhost/suprsales_api/Login_Details/')->json();
         
		  if(isset(Auth::user()->emp_id)){
		  $ids = Auth::user()->emp_id;
		   $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'empss'){
				$count = 1;	
				break;
			}
        }
		}
		
		if($count == 1){
			return view('employee')->with(compact('admins','login','announcement','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
		
		
    }
    
}