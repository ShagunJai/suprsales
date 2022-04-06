<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;
use SebastianBergmann\Environment\Console;

class BeatPlanController extends Controller
{


    public function index()
    {

        //this api use for reporting employee
        $admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();

        if (isset(Auth::user()->id)) {
            $ids = Auth::user()->emp_id;
            $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
            $cust = Http::get('http://localhost/suprsales_api/Customer/getCustomerByEmpId.php?id=' . $id)->json();

            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
            $emp = Http::get('http://localhost/suprsales_api/Employee/getReportingEmp.php?id=' . $ids)->json();

            $count = 0;
            if (isset($ann)) {
                foreach ($ann as $val) {
                    if ($val['auth_reference'] == 'beatplan') {
                        $count = 1;
                        break;
                    }
                }
            }
            if ($count == 1) {
                return view('repCustomer')->with(compact('emp', 'announcement', 'ann', 'admins', 'cust'));
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
                    if ($val['auth_reference'] == 'beatplan') {
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
                return view('repCustomer', ['emp' => $id])->with(compact('announcement', 'ann', 'cust'));
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
}
