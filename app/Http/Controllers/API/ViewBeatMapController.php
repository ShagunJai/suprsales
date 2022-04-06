<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class ViewBeatMapController extends Controller
{


    public function index()
    {


        if (isset(Auth::user()->id)) {
            $ids = Auth::user()->emp_id;
            $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

            $empattnd = Http::get('http://localhost/suprsales_api/Attendance/empattendance.php?id=' . $ids)->json();

            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
            $emp = Http::get('http://localhost/suprsales_api/Employee/getReportingEmp.php?id=' . $ids)->json();

            $count = 0;
            if (isset($ann)) {
                foreach ($ann as $val) {
                    if ($val['auth_reference'] == 'viewbeatmap') {
                        $count = 1;
                        break;
                    }
                }
            }
            if ($count == 1) {
                return view('viewBeatMap')->with(compact('emp', 'announcement', 'ann', 'empattnd'));
            } else {
                return redirect('error');
            }
        } else {
            return redirect('userlogin');
        }
    }



    public function store(Request $request)
	{


		//$status = $request->get('status');
		// $emp = $request->get('emp');
		//$REGION_ID = $request->get('REGION_ID');
		$AREA_ID = $request->get('AREA_ID');

		$SHOW_PLAN_DATE = $request->get('plan_date');

        list($month1, $day1, $year1) = explode('/', $SHOW_PLAN_DATE);
		$PLAN_DATE = $year1 . '-' . $month1 . '-' . $day1;


		$ids = Auth::user()->emp_id;

		$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
		$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
		$admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		//$area = Http::get('http://localhost/suprsales_api/Area/allArea.php')->json();
		//$region = Http::get('http://localhost/suprsales_api/Region/')->json();
		$emps = Auth::user()->emp_id;
		$custdata = Http::get('http://localhost/suprsales_api/Beat_Plan/getBeatPlanByEmp.php?id=' . $emps . '&date=' . $PLAN_DATE)->json();


	
		//return view('allclaims',['cycle' => $cycle],['status' => $status],['emps' => $emp],['REGION_ID' => $REGION_ID],['AREA_ID' => $AREA_ID],['start_date' => $start_date],['end_date' => $end_date])->with(compact('announcement','ann','region','area','admins','claim','cycle'));

		return view('viewBeatMap')->with(compact('announcement', 'ann', 'admins', 'custdata'));
	}


	


}
