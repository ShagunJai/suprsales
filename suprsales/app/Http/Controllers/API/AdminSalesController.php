<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpClient\HttpClient;
use GuzzleHttp\Client;
use Auth;
use Response;

class AdminSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
			if($val['auth_reference'] == 'asales'){
				$count = 1;	
				break;
			}
        }
    }
		if($count == 1){
			return view('orders')->with(compact('announcement','ann','admins'));
		}
		else{
			return redirect('error');
		}
		 }
		 else {
			return redirect('userlogin');
		}
        
        //return response()->view('orders');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp = $request->get('emp');
		$days = $request->get('days');
		$status = $request->get('status');
		 
		list($part1, $part2) = explode(' - ', $days);
		list($month1, $day1, $year1) = explode('/', $part1);
		list($month2, $day2, $year2) = explode('/', $part2);
		
		$start_date = $year1.'-'.$month1.'-'.$day1;
		$end_date = $year2.'-'.$month2.'-'.$day2;
		
		$ids = Auth::user()->emp_id;
		$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		$admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
	 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
	if(empty($emp)){
	$order = Http::get('http://localhost/suprsales_api/Order/getOrderByEmp.php?start_date='.$start_date.'&end_date='.$end_date.'&id='.$emp.'&status='.$status)->json();	
	
		
		return view('orders',['start_date' => $start_date],['end_date' => $end_date])->with(compact('announcement','ann','order','admins')); 
		
	}
	else{
	 $emps = join(',', $emp); 
	 $em = '['.$emps.']';
	 
	$order = Http::get('http://localhost/suprsales_api/Order/getOrderByEmp.php?start_date='.$start_date.'&end_date='.$end_date.'&id='.$em.'&status='.$status)->json();	
		
		
		return view('orders',['start_date' => $start_date],['end_date' => $end_date])->with(compact('announcement','ann','order','admins')); 
	}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show(Request $request, $id)
    {
   
    }
	
	 public function shows(Request $request, $id, $rid)
    {
        $id = $request->route('asale'); 
		$rid = $request->route('rid'); 
	   
      $orders = Http::get('http://localhost/suprsales_api/Order/getOrderDetail.php?id='.$id)->json();
		
     
     $userData['data'] = $orders;

     echo json_encode($userData);
     exit;
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
      $start_date = $request->get('start_date'); 
	  $end_date = $request->get('end_date'); 
	  
	 if(empty($start_date)){
		 return redirect('/asales');
	
	 }
	 
	 else {
	 $downloads = Http::get('http://localhost/suprsales_api/Order/downloadAllEmpOrder.php?start_date='.$start_date.'&end_date='.$end_date)->json();	 
		
	  $order = Http::get('http://localhost/suprsales_api/Order/getAllEmpOrder.php?start_date='.$start_date.'&end_date='.$end_date)->json();
		//dd($order);
	 $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=orders.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );

    
    $columns = array('orderId', 'status', 'latitude', 'longitude', 'dateTime', 'order_value', 'distributor_br_id', 'distributor_erp_id', 'distributorName', 'Reported-By ID', 'Reported-By Name', 'Reported-By Role', 'Reported-By Email', 'sku_br_id', 'sku_erp_id', 'description', 'brand', 'sub_brand', 'uom', 'skuPrice', 'quantity', 'value', 'remarks', 'order_timestamp', 'Ack_Order_ID');

    $callback = function() use ($order, $columns)
    {
		
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach($order as $review) {
			
            fputcsv($file, array($review['ORDER_ID'], $review['STATUS'], $review['CUSTOMER_LATITUDE'], $review['CUSTOMER_LONGITUDE'], $review['ORDER_DATE'], $review['TOTAL_ORDER_VALUE'], $review['CUSTOMER_ID'], $review['CUSTOMER_ID'], $review['CUSTOMER_NAME'], $review['CREATED_BY'], $review['PLACED_BY'], $review['ROLE_NAME'], $review['EMP_EMAIL'], $review['SKU_ID'], $review['SKU_ID'], $review['SKU_DESCRIPTION'], "", "", "", $review['PRICE'], $review['SKU_QUANTITY'], $review['TOTAL_SKU_VALUE'], $review['REMARKS'], strtotime($review['ORDER_DATE']), "0"));
        }
        fclose($file);
    };
	
    return Response::stream($callback, 200, $headers)->send();
	 }
	 
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
