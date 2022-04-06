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


class customerOrder extends Controller
{
  //
  
      
      //return response()->view('orders');
      public function index()
      {
          if(isset(Auth::user()->id)){
          $ids = Auth::user()->emp_id;
          $emps = Auth::user()->emp_id;
         // $ORD=Http::get('http://localhost/suprsales_api/Order/order.php?id='.$ids)->json();
         // $status=Http::get('http://localhost/suprsales_api/PRACTICEONLY/status.php?id='.$ids).->json();
           $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
          $plant=Http::get('http://localhost/suprsales_api/Plant/getPlantByRegion.php?id='.$ids)->json();
           $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
           $order = Http::get('http://localhost/suprsales_api/customerOrder/getCustomerOrder.php?id='.$emps.'&start_date='.'&end_date='.'&status=')->json();	
	
          $count = 0;
          if(isset($ann)){
          foreach ($ann as $val) {
              if($val['auth_reference'] == 'corder'){
                  $count = 1;	
                  break;
              }
          }
      }
          
          if($count == 1){
              return view('customerorder')->with(compact('announcement','ann','plant','order'));
          }
          else{
              return redirect('error');
          }
          }
           else {
              return redirect('userlogin');
          }
      }
    
    //public function show(Request $request, $id)
    //{
   
   // }
	
	/* public function shows(Request $request, $id, $rid)
    {
        $id = $request->route('asale'); 
		$rid = $request->route('rid'); 
	   
      $orders = Http::get('http://localhost/suprsales_api/Order/getOrderDetail.php?id='.$id)->json();
		
     
     $userData['data'] = $orders;

     echo json_encode($userData);
     exit;
    }*/
  //  public function show(Request $request, $id)
    //{
   
    //}
   public function store(Request $request)
{
	$days = $request->get('days');
	$status=$request->get('status'); 
		 
	list($part1, $part2) = explode(' - ', $days);
	list($month1, $day1, $year1) = explode('/', $part1);
	list($month2, $day2, $year2) = explode('/', $part2);
		
	$start_date = $year1.'-'.$month1.'-'.$day1;
	$end_date = $year2.'-'.$month2.'-'.$day2;
		
	$ids = Auth::user()->emp_id;
  $plant=Http::get('http://localhost/suprsales_api/Plant/getPlantByRegion.php?id='.$ids)->json();
	$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
	$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
	$emps = Auth::user()->emp_id;
	$order = Http::get('http://localhost/suprsales_api/customerOrder/getCustomerOrder.php?id='.$emps.'&start_date='.$start_date.'&end_date='.$end_date.'&status='.$status)->json();	
		
		
		return view('customerorder',['start_date' => $start_date],['end_date' => $end_date],['status'=>$status])->with(compact('announcement','ann','order','plant')); 
		
    }
    



     
	 
    public function show(Request $request, $id)
    {
        $order_id = $request->route('corder');
       
       $corders = Http::get('http://localhost/suprsales_api/customerOrder/getCustomerOrderDetail.php?order_id=' . $id)->json();
       
      $userData['data'] = $corders;
      echo json_encode($userData);
       exit;
    }
   
    /*public function orderput(Request $request, $id)
    {

      $plant_id = $request->get('plant_id');
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
      
    }
*/

    public function approve(Request $request)
    {     $Aa=$request->route('a');
        $ord=$request->route('orderr_id');
        $sku_idd=$request->get('prooduct');
        $statusss=$request->get('statuses');
         $plant_id= $request->get('plant_id');
        
         $client = new Client([
          'base_uri' => 'http://localhost',
        ]);
         $response = $client->request('POST', '/suprsales_api/customerOrder/updateCustomerOrder.php?order_id='.$ord, [
            'json' => [
              'PLANT_ID'=>$plant_id,
             'SKU_ID' => $sku_idd,
             'STATUS'=>$statusss
             
            ]
        ]);
        if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
          return redirect('/corder')->with('message','Order Updated Successfully');
           }
           else{
             return redirect('/corder')->with('error','Order Not Updated');
           }
        
    }

    
 

}
