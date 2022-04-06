<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class RejectedClaimController extends Controller
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
			if($val['auth_reference'] == 'rejectedclaim'){
				$count = 1;	
				break;
			}
        }
      }
		
		if($count == 1){
			return view('rejectedClaim')->with(compact('announcement','ann'));
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
        $cycle = $request->get('cycle');
		$month = $request->get('month');
		$year = $request->get('year');
		
		
		$ids = Auth::user()->emp_id;
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		
			 
		if($cycle == "null"){
			$start_day = "00";
			$end_day = "00";	
		}
			 
	    if($cycle == "h1"){
			$start_day = "01";
			$end_day = "14";
		}
		if($cycle == "h2"){
			$start_day = "16";
			$end_day = "31";
		}
		
	    $start_date = $year."-".$month."-".$start_day;
		$end_date = $year."-".$month."-".$end_day;
		
		$claim = Http::get('http://localhost/suprsales_api/Claim/getRejectedClaim.php?start_date='.$start_date.'&end_date='.$end_date)->json();

		return view('rejectedClaim',['start_date' => $start_date],['end_date' => $end_date])->with(compact('announcement','ann','claim')); 
		 
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $id = $request->route('rejectedclaim');
		//dd($id);
		
		 $client = new Client([
          // Base URI is used with relative requests
          'base_uri' => 'http://localhost',
        ]);
		
		$response = $client->request('DELETE', '/suprsales_api/Claim/deleteClaim.php?id='.$id);
		
		 if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/rejectedclaim')->with('message','Claim Record Deleted Successfully!');
	   }
	   else{
		   return redirect('/rejectedclaim')->with('error','Claim Record Not Deleted');
	   }
      
    }
}
