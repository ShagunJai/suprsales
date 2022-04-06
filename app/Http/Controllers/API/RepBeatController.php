<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class RepBeatController extends Controller
{



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
                    if ($val['auth_reference'] == 'reptsbeatview') {
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
                return view('reptsBeatView', ['emp' => $id])->with(compact('announcement', 'ann', 'cust'));
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

    

    public function store(Request $request)
	{


		//$status = $request->get('status');
		// $emp = $request->get('emp');
		
		//$AREA_ID = $request->get('AREA_ID');

		$SHOW_PLAN_DATE = $request->get('show_plan_date');

        list($month1, $day1, $year1) = explode('/', $SHOW_PLAN_DATE);
		$PLAN_DATE = $year1 . '-' . $month1 . '-' . $day1;
        $empid = $request->get('crtfor');
        //echo $empid;
        $emps = Auth::user()->emp_id;
		$ids = $empid = $request->get('crtfor');
        $cust = Http::get('http://localhost/suprsales_api/Customer/getCustomerByEmpId.php?id=' . $ids)->json();
		$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $emps)->json();
		$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $emps)->json();
		$admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		//$area = Http::get('http://localhost/suprsales_api/Area/allArea.php')->json();
		//$region = Http::get('http://localhost/suprsales_api/Region/')->json();
		
		$custdata = Http::get('http://localhost/suprsales_api/Beat_Plan/getBeatPlanByEmp.php?id=' . $empid . '&date=' . $PLAN_DATE)->json();

       // $cust = Http::get('http://localhost/suprsales_api/Customer/getCustomerByEmpId.php?id=' . $id)->json();
	
		//return view('allclaims',['cycle' => $cycle],['status' => $status],['emps' => $emp],['REGION_ID' => $REGION_ID],['AREA_ID' => $AREA_ID],['start_date' => $start_date],['end_date' => $end_date])->with(compact('announcement','ann','region','area','admins','claim','cycle'));

		return view('reptsBeatView')->with(compact('announcement', 'ann', 'admins', 'custdata','cust'));
	}



   



}
