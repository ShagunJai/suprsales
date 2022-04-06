<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class customerdashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	/* index function is used to take data from database*/
    public function index()
    {
		
		/*if condition is set to check the user is authorized to came to this page or not*/
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		/* create a 'announcement' variable used to get announcement if any for the particular id */	
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
       $user = Http::get('http://localhost/suprsales_api/Customer_Dashboard/getCustomerByCustId.php?id='.$ids)->json();
		    $balances= Http::get('http://localhost/suprsales_api/Customer_Dashboard/getAgingByCustId.php?id='.$ids)->json();
        $details= Http::get('http://localhost/suprsales_api/Customer_Dashboard/getOrderStatusCountByCustId.php?id='.$ids)->json();
		$ledger = Http::get('http://localhost/suprsales_api/Ledger/viewLedger.php?id='.$ids.'&code=DIS')->json();
		
       $priority = Http::get('http://localhost/suprsales_api/Task/assignedTaskPriorityChart.php?id='.$ids)->json();
		 
		$count = 0;
		 /* if count=0 then if condition */
		/* if condition to check 'ann' variable is not null */
		if(isset($ann)){
	    /* if 'ann' is not null then using each value of 'ann' in 'val' variable */
		foreach ($ann as $val) {
			 /*if 'val' variable value of 'auth_reference' is equal to 'dashboard' then our count will become 1 */
			if($val['auth_reference'] == 'home'){
				$count = 1;	
				break;
			}
        }
		}
		
		/* if count is 1 then return view 'dashboard' */
		if($count == 1){
			 /* compact() it will create array having variable 'announcement','ann', 'user','currentSales','currentClaim','currentTicket','quat_sales','mon_sales','top_dist','top_prod','top_plant','mon_tic','Task','task_det'*/
		    /* with() it will use the variable individually */
			return view('customerdashboard')->with(compact('announcement','ann','user','balances','details','ledger','priority'));
		}
		// else show error
		else{
			return redirect('error');
		}
		}
		// if authorized user not found then redirect to userlogin
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
        //
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
    public function destroy($id)
    {
        //
    }
}
