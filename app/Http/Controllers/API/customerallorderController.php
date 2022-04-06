<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpClient\HttpClient;
use GuzzleHttp\Client;
use Auth;
use Response;
//use Illuminate\Http\Request;
 

class customerallorderController extends Controller
{
      public function index()
      {
        
    if(isset(Auth::user()->id)){
        $ids = Auth::user()->emp_id;
       // $details=Http::get('http://localhost/suprsales_api/customerOrder/skuListByCustomerId.php?id=',$ids)->json();
        $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
        $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
        
        $cust=Http::get('http://localhost/suprsales_api/customerOrder/getCustomerOrderByCustID.php?id='.$ids.'&start_date='.'&end_date=')->json();
		
        $count = 0;
        if(isset($ann)){ 
        foreach ($ann as $val) {
            if($val['auth_reference'] == 'custallorder'){
                $count = 1;	
                break;
            }
        }
    }
        
        if($count == 1){
            return view('customerallorders')->with(compact('announcement','ann'));
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
		$days = $request->get('days');
		
		 
		list($part1, $part2) = explode(' - ', $days);
		list($month1, $day1, $year1) = explode('/', $part1);
		list($month2, $day2, $year2) = explode('/', $part2);
		
		$start_date = $year1.'-'.$month1.'-'.$day1;
		$end_date = $year2.'-'.$month2.'-'.$day2;
		
		$ids = Auth::user()->emp_id;
        $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
	    $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
	
        $cust=Http::get('http://localhost/suprsales_api/customerOrder/getCustomerOrderByCustID.php?id='.$ids.'&start_date='.$start_date.'&end_date='.$end_date)->json();
		
		return view('customerallorders',['start_date' => $start_date],['end_date' => $end_date])->with(compact('announcement','ann','cust')); 
		
    }
    public function show(Request $request, $id)
    {
    $id = $request->route('custallorder');
 $custallorders = Http::get('http://localhost/suprsales_api/customerOrder/getCustomerOrderDetail.php?order_id='.$id)->json();
      $userData['data'] = $custallorders;
      echo json_encode($userData);
       exit;
    }
    /*public function store(Request $request, $id)
    {

      $acknowle = $request->get('plant_id');
      $flag = $request->get('flag');
	  $id = $request->route('corder'); 
       if($flag==0){
         $flag=3;
       }
       
       
      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://localhost',
      ]);
      
      $response = $client->request('PUT', '/suprsales_api/customerOrder/updateCustomerOrder.php?order_id='.$id, [
        'json' => [
          
          'PLANT_ID' => $plant_id,
          'APPROVE_STATUS' => $flag,
        ]
      ]);
      if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/corder')->with('message','Order Updated Successfully');
	   }
	   else{
		   return redirect('/corder')->with('error','Order Not Updated');
	   }
      
    }*/
    public function update(Request $request)
    {
        $orderss = $request->route('orderss');
        $temps = $request->route('pqr');
        $flag = $request->get('flag');
        
  
        $client = new Client([
          // Base URI is used with relative requests
          'base_uri' => 'http://localhost',
        ]);

         
        $response = $client->request('PUT', '/suprsales_api/customerOrder/updateAcknowledge.php', [
          'json' => [
            'ORDER_ID' => $orderss,
            'ACKNOWLEDGE_STATUS' => $flag
          ]
        ]);
        
        if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/custallorder')->with('message','Acknowledge Updated Successfully');
	   }
	   else{
		   return redirect('/custallorder')->with('error','Acknowledge Not Updated');
	   }
    }


}