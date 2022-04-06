<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpClient\HttpClient;
use GuzzleHttp\Client;
use Auth;
use Response;

class AllClaimsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		 $area = Http::get('http://localhost/suprsales_api/Area/allArea.php')->json();
		$region = Http::get('http://localhost/suprsales_api/Region/')->json();
		 
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'allclaims'){
				$count = 1;	
				break;
			}
        }
    }
		if($count == 1){
			return view('allclaims')->with(compact('announcement','ann','admins','region','area'));
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
        
		$status = $request->get('status');
		$emp = $request->get('emp');
		$REGION_ID = $request->get('REGION_ID');
		$AREA_ID = $request->get('AREA_ID');
		
		$days = $request->get('days');
		 
		 
		list($part1, $part2) = explode(' - ', $days);
		list($month1, $day1, $year1) = explode('/', $part1);
		list($month2, $day2, $year2) = explode('/', $part2);
		
		$start_date = $year1.'-'.$month1.'-'.$day1;
		$end_date = $year2.'-'.$month2.'-'.$day2;
		
		
		
		$ids = Auth::user()->emp_id;
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		$admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		 $area = Http::get('http://localhost/suprsales_api/Area/allArea.php')->json();
		$region = Http::get('http://localhost/suprsales_api/Region/')->json();
		
		
		
		if(empty($emp)){
			$employees = "";
			$claim = Http::get('http://localhost/suprsales_api/Claim/getEmpClaimByCycle.php?id='.$emp.'&approval_status='.$status.'&start_date='.$start_date.'&end_date='.$end_date.'&region_id='.$REGION_ID.'&area_id='.$AREA_ID)->json();
			//dd($claim);
		}
		else{
			$employees = join(',', $emp); 
		
		
		$claim = Http::get('http://localhost/suprsales_api/Claim/getEmpClaimByCycle.php?id='.$employees.'&approval_status='.$status.'&start_date='.$start_date.'&end_date='.$end_date.'&region_id='.$REGION_ID.'&area_id='.$AREA_ID)->json();
		
		}
		//return view('allclaims',['cycle' => $cycle],['status' => $status],['emps' => $emp],['REGION_ID' => $REGION_ID],['AREA_ID' => $AREA_ID],['start_date' => $start_date],['end_date' => $end_date])->with(compact('announcement','ann','region','area','admins','claim','cycle')); 
		
		return view('allclaims')->with(compact('announcement','ann','region','area','admins','claim','start_date','end_date','employees','REGION_ID','AREA_ID','status')); 
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
	  $emp_status = $request->get('emp_status'); 
	  $emp = $request->get('employees');
	  $regions = $request->get('regions'); 
	  $areas = $request->get('areas'); 
	  
	  
	   if(empty($emp)){
		   $emps = $emp;
			
		}
		else{
			
			$emps = join(',', $emp);
		}
		
	  
	 if(empty($start_date)){
		 return redirect('/allclaims');
	
	 }
	 
	 else {
	 
	  $order = Http::get('http://localhost/suprsales_api/Claim/getEmpClaimByCycle.php?id='.$emps.'&approval_status='.$emp_status.'&start_date='.$start_date.'&end_date='.$end_date.'&region_id='.$regions.'&area_id='.$areas)->json();
		//dd($order);
	 $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=claims.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );

    
    $columns = array('EMP Code', 'EMP Name', 'State', 'City', 'CLAIM DATE', 'DA', 'Internet', 'Hotel', 'Stationary', 'Misc', 'KM Done', 'Claim status', 'Approved BY','Claimed Amount');

    $callback = function() use ($order, $columns)
    {
		
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach($order as $review) {
			if($review['APPROVAL_STATUS'] == '0') {
				$claim_status = "Pending";
			}
			else if($review['APPROVAL_STATUS'] == '1'){
				$claim_status = "Approved";
			}
			else if($review['APPROVAL_STATUS'] == '2'){
				$claim_status = "Rejected";
			}
			else {
				$claim_status = "Zero Claim";
			}
			
             fputcsv($file, array($review['EMPLOYEE_ID'], $review['EMP_NAME'], $review['REGION_NAME'], $review['AREA_NAME'], $review['CLAIM_DATE'], $review['DA_RATES_OUTST'], $review['EXP_MOBILE_INTERNET'], $review['EXP_HOTEL'], $review['EXP_STATIONARY'], $review['EXP_MISC'], $review['TOTAL_KM'], $claim_status, $review['APPROVED_BY'], $review['TOTAL_CLAIMED_AMOUNT']));
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
