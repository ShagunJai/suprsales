<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;
use Response;

class MyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'myorder'){
				$count = 1;	
				break;
			}
        }
    }
		
		if($count == 1){
			return view('myOrder')->with(compact('announcement','ann'));
		}
		else{
			return redirect('error');
		}
		 }
		 else {
			return redirect('userlogin');
		}
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
		$admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
	$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
	 $emps = Auth::user()->emp_id;
	 //$em = '['.$emps.']';
	 
	$order = Http::get('http://localhost/suprsales_api/Order/getOrderByLoginEmp.php?id='.$emps.'&start_date='.$start_date.'&end_date='.$end_date)->json();	
		
		
		return view('myOrder',['start_date' => $start_date],['end_date' => $end_date])->with(compact('announcement','ann','order','admins')); 
		
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
        $id = $request->route('myorder'); 
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
	  
	 
	  $order = Http::get('http://localhost/suprsales_api/Order/getAllEmpOrder.php?start_date='.$start_date.'&end_date='.$end_date)->json();
		
	 $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=myorders.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );

    
    $columns = array('Order No', 'Customer Code', 'Customer Name', 'Date', 'Placed By', 'Total Ordered Value', 'Plant', 'Remarks', 'Status', 'Order Code', 'Description', 'Quantity', 'Price', 'Total Value');

    $callback = function() use ($order, $columns)
    {
		
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach($order as $review) {
			
            fputcsv($file, array($review['ORDER_ID'], $review['CUSTOMER_ID'], $review['CUSTOMER_NAME'], $review['ORDER_DATE'], $review['PLACED_BY'], $review['TOTAL_ORDER_VALUE'], $review['PLANT_NAME'], $review['REMARKS'], $review['STATUS'], $review['SKU_ID'], $review['SKU_DESCRIPTION'], $review['SKU_QUANTITY'], $review['PRICE'], $review['TOTAL_SKU_VALUE']));
        }
        fclose($file);
    };
	//dd($callback);
    return Response::stream($callback, 200, $headers)->send();
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
