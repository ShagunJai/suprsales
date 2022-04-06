<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class AttnRegularityController extends Controller
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
                    if ($val['auth_reference'] == 'regularity') {
                        $count = 1;
                        break;
                    }
                }
            }
            if ($count == 1) {
                return view('attnRegularity')->with(compact('emp', 'announcement', 'ann', 'empattnd'));
            } else {
                return redirect('error');
            }
        } else {
            return redirect('userlogin');
        }
    }



   
}
