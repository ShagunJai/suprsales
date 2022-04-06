<?php

namespace App\Http\Controllers\API;
use App\Http\Traits\EmpTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use DB;
use Auth;


class CustController extends Controller
{
    use EmpTrait;
	
    public function index()
    {
		$admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		 
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'custs'){
				$count = 1;	
				break;
			}
        }
	}
		
		if($count == 1){
			return view('assignCustomer')->with(compact('admins','announcement','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
		
	}
		
    public function store(Request $request)
    {
        $emp_id = $request->get('emp_id');
		$farmer_id = $request->get('farmer_id');
		$retailer_id = $request->get('retailer_id');

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Assign_Customer/assign.php', [
			'json' => [
				'EMP_ID' => $emp_id,
				'FARMER_ID' => $farmer_id,
				'RETAILER_ID' => $retailer_id
			]
		]);
		 if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/custs')->with('message','Customer Assigned Successfully');
	   }
	   else{
		   return redirect('/custs')->with('error','Customer Not Assigned');
	   }
		
    }

    
    public function show(Request $request, $id)
    {
      $id = $request->route('cust'); 
	  $emp = Http::get('http://localhost/suprsales_api/Employee/getById.php?id='.$id)->json();
      $farmer = Http::get('http://localhost/suprsales_api/Assign_Customer/selectFarmer.php?id='.$id)->json();
	  $retailer = Http::get('http://localhost/suprsales_api/Assign_Customer/selectRetailer.php?id='.$id)->json();
	   
	   if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'custs'){
				$count = 1;	
				break;
			}
        }
	}
		
		if($count == 1){
			return view('farmer')->with(compact('announcement','emp','farmer','retailer','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
	   
	   
	  }

   
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
