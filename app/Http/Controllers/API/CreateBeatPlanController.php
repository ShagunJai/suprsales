<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;
use SebastianBergmann\Environment\Console;

class CreateBeatPlanController extends Controller
{

        //private $variable;
    public function index()
    {
        
        //this api use for reporting employee
        $admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
//$custAll = Http::get('http://localhost/suprsales_api/Employee/Customer/employeeCustomerArray.php')->json();
      // $custAll = Http::get('http://localhost/suprsales_api/Customer/getCustomerByEmpId.php?id=' . $variable)->json();

        if (isset(Auth::user()->id)) {
            $ids = Auth::user()->emp_id;
            $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
            //$custsAll = Http::get('http://localhost/suprsales_api/Customer/getCustomerByEmpId.php?id=' . $ids)->json();            
            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
            $emp = Http::get('http://localhost/suprsales_api/Employee/getReportingEmpWithCust.php?id=' . $ids)->json();
            
            $count = 0;
            if (isset($ann)) {
                foreach ($ann as $val) {
                    if ($val['auth_reference'] == 'createbeatplan') {
                        $count = 1;
                        break;
                    }
                }
            }
            if ($count == 1) {
                
                return view('createBeatPlan')->with(compact('emp', 'announcement', 'ann', 'admins'));
            } else {
                return redirect('error');
            }
        } else {
            return redirect('userlogin');
        }
    
    

    }





    public function show(Request $request, $id)
    {
       
        //it gives the emp_id with authenticated user ID
        if (isset(Auth::user()->id)) {
            //  in $id put the data by route 'empss'
            // $id = $request->route('createbeatplan');
            
            $cust = Http::get('http://localhost/suprsales_api/Customer/getCustomerByEmpId.php?id=' . $id)->json();
            $ids = Auth::user()->emp_id;
            //It shows authenticated uses references and store it in $ann
            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
            //initialize the $count =0
            $count = 0;
            /*If $ann is not null
       then for each $ann value is set in $val
       if 'auth_reference' of $val specified id equals to 'empss'
       then take $count=1 */
            if (isset($ann)) {
                foreach ($ann as $val) {
                    if ($val['auth_reference'] == 'createbeatplan') {
                        $count = 1;
                        break;
                    }
                }
            }
            //If count became 1 then
            if ($count == 1) {

                $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
                //It shows authenticated uses references and store it in $ann by their ID
                $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
                //$cust contain the Customers and define by their ID
                //The  compact() function is used to convert given variable to array in which the key of the array will be the name of the variable and the value of the array will be the value of the variable

                // it will make the array of announcement', 'ann', 'cust' and store it inside the  .
                return view('beatPlan', ['emp' => $id])->with(compact('announcement', 'ann', 'cust'));
            }
            // it will return 404 eror if the cust is not authenticate
            else {
                return redirect('error');
            }
        }
        // otherwise it will return to the userlogin page
        else {
            return redirect('userlogin');
        }

       
    }


    public function edits(Request $request)
    {
       
        $id = $request->route('reptsplann');
        $startdate = $request->route('start_date');
        //echo json_encode($startdate);
        
        $reptsBeatPlanData = Http::get('http://localhost/suprsales_api/Beat_Plan/getBeatPlanByEmp.php?id=' . $id . '&date=' .$startdate )->json();               
       
        $userData['data'] = $reptsBeatPlanData;       
       // echo json_encode($userData);
     
         return response()->json($userData);
        exit;
    }
   
    public function update(Request $request)
    {
        $custIdArr = $request->get('selectedCustId');
        $beatdate = $request->route('updatedate');
        $reptid = $request->route('reptsid');
        
        

        $client = new Client([
            'base_uri' => 'http://localhost',
        ]);


        // return ("$CREATED_BY,$CUST_NAME,$CREATED_FOR, $BEAT_PLAN_DATE ");

        $response = $client->request('PUT', '/suprsales_api/Beat_Plan/updateBeatPlan.php?id='.$reptid. '&date='.$beatdate, [
            'json' => [
                //'CUST_CITY' => $CUST_CITY,
                'CUSTOMER_ID' => $custIdArr,
                
            ]
        ]);

        
          if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
            return redirect('/createbeatplan')->with('message', 'Role Updated Successfully');
          } else {
            return redirect('/createbeatplan')->with('error', 'Role Not Updated');
          }
        
    
    }


    public function beatupdate(Request $request)
    {
    //
    }

    

    public function store(Request $request)
    {
       // $CUST_CITY = $request->get('cust_city');
        $CUST_ID = $request->get('cust_ids');
        $CREATED_FOR = $request->get('created_for');
        $BEAT_PLAN_DATE = $request->get('beat_plan_date');
        $CREATED_BY = Auth::user()->emp_id;

       
        $client = new Client([
            'base_uri' => 'http://localhost',
        ]);


        // return ("$CREATED_BY,$CUST_NAME,$CREATED_FOR, $BEAT_PLAN_DATE ");

        $response = $client->request('POST', '/suprsales_api/Beat_Plan/createBeatPlan.php', [
            'json' => [
                //'CUST_CITY' => $CUST_CITY,
                'CUSTOMER_ID' => $CUST_ID,
                'CREATED_FOR' => $CREATED_FOR,
                'BEAT_PLAN_DATE' => $BEAT_PLAN_DATE,
                'CREATED_BY' => $CREATED_BY
            ]
        ]);

        
    }


    // public function store(Request $request)
	// {


	// 	//$status = $request->get('status');
	// 	 $emp = $request->get('created_for');
	// 	//$REGION_ID = $request->get('REGION_ID');
	// 	$AREA_ID = $request->get('AREA_ID');

	// 	$SHOW_PLAN_DATE = $request->get('plans_date');

    //     list($month1, $day1, $year1) = explode('/', $SHOW_PLAN_DATE);
	// 	$PLAN_DATE = $year1 . '-' . $month1 . '-' . $day1;


	// 	$ids = Auth::user()->emp_id;

	// 	$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
	// 	$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
	// 	$admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
	// 	//$area = Http::get('http://localhost/suprsales_api/Area/allArea.php')->json();
	// 	//$region = Http::get('http://localhost/suprsales_api/Region/')->json();
	// 	$emps = Auth::user()->emp_id;
	// 	$custdata = Http::get('http://localhost/suprsales_api/Beat_Plan/getBeatPlanByEmp.php?id=' . $emp . '&date=' . $PLAN_DATE)->json();
    //     $cust = Http::get('http://localhost/suprsales_api/Customer/getCustomerByEmpId.php?id=' . $ids)->json();

	
	// 	//return view('allclaims',['cycle' => $cycle],['status' => $status],['emps' => $emp],['REGION_ID' => $REGION_ID],['AREA_ID' => $AREA_ID],['start_date' => $start_date],['end_date' => $end_date])->with(compact('announcement','ann','region','area','admins','claim','cycle'));

	// 	return view('beatPlan')->with(compact('announcement', 'ann', 'admins', 'custdata','cust'));
	// }






}
