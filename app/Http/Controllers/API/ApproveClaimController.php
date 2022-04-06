<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class ApproveClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (isset(Auth::user()->id)) {
            $ids = Auth::user()->emp_id;
            $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();

            $count = 0;
            if (isset($ann)) {
                foreach ($ann as $val) {
                    if ($val['auth_reference'] == 'approveclaim') {
                        $count = 1;
                        break;
                    }
                }
            }

            if ($count == 1) {
                return view('approveClaim')->with(compact('announcement', 'ann'));
            } else {
                return redirect('error');
            }
        } else {
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
        //dd($cycle);


        $request->session()->put('cycle', $cycle);
        $request->session()->put('month', $month);
        $request->session()->put('year', $year);


        $ids = Auth::user()->emp_id;
        $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
        $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();



        if ($cycle == null) {
            $start_day = "00";
            $end_day = "00";
        }

        if ($cycle == "h1") {
            $start_day = "01";
            $end_day = "15";
        }
        if ($cycle == "h2") {
            $start_day = "16";
            $end_day = "31";
        }

        $start_date = $year . "-" . $month . "-" . $start_day;
        $end_date = $year . "-" . $month . "-" . $end_day;


        $claim = Http::get('http://localhost/suprsales_api/Claim/getAllEmpClaim.php?id=' . $ids . '&start_date=' . $start_date . '&end_date=' . $end_date)->json();
        //dd($claim);
        $claims = Http::get('http://localhost/suprsales_api/Claim/getAllClaim.php?start_date=' . $start_date . '&end_date=' . $end_date)->json();

        //dd($claim);
        return view('approveClaim', ['start_date' => $start_date], ['end_date' => $end_date])->with(compact('announcement', 'ann', 'claim', 'claims'));
    }

    public function approve(Request $request)
    {

        $claim = $request->get('claim');
        $status = $request->get('status');

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost',
        ]);

        $response = $client->request('POST', '/suprsales_api/Claim/approveClaim.php', [
            'json' => [
                'CLAIM_ID' => $claim,
                'APPROVAL_STATUS' => $status
            ]
        ]);



        return redirect('/adminn');
    }



    public function show($id)
    {
        //
    }

    public function editcust(Request $request, $id, $start_date, $end_date)
    {
        $id = $request->route('approveclaim');
        $start_date = $request->route('start_date');
        $end_date = $request->route('end_date');
        $ids = Auth::user()->emp_id;

        $claim = Http::get('http://localhost/suprsales_api/Claim/getAllEmpClaim.php?id=' . $ids . '&start_date=' . $start_date . '&end_date=' . $end_date)->json();

        $count = 0;

        if (isset($claim)) {
            foreach ($claim as $value) {
                if ($value['EMPLOYEE_ID'] == $id) {
                    $count = 1;
                    break;
                }
            }
        }

        if ($count == 1) {

            $pending = Http::get('http://localhost/suprsales_api/Claim/getClaim.php?id=' . $id . '&start_date=' . $start_date . '&end_date=' . $end_date)->json();
            $ids = Auth::user()->emp_id;
            $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

            $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();


            return view('approval', ['start_date' => $start_date], ['end_date' => $end_date])->with(compact('announcement', 'ann', 'pending'));
        } else {
            return redirect('error');
        }
    }




    public function update(Request $request, $id)
    {
        $ids = Auth::user()->emp_id;

        $user = Http::get('http://localhost/suprsales_api/Level/getEmployeeLevelExpRates.php?id=' . $ids)->json();

        foreach ($user as $value) {
            $da = $value['DA_RATES_LOCAL'];
            $out = $value['DA_RATES_OUTST'];
            $kms = $value['EXP_PER_KM_RATE'];
            $bus = $value['EXP_BUS_TRAIN'];
            $mis = $value['LEFT_MAX_MISC'];
            $plane = $value['EXP_PLANE'];
            $auto = $value['EXP_TAXI_AUTO'];
            $vehicle = $value['EXP_VEH_REPAIR'];
            $hotel = $value['EXP_HOTEL'];
            $stat = $value['EXP_STATIONARY'];
            $mobile = $value['LEFT_MAX_MOBILE_INTERNET'];
            $fuel = $value['LEFT_MAX_ALLOWED_FUEL'];
        }

        $rules = [
            'DA_RATES_LOCAL' => 'lte:' . $da,
            'DA_RATES_OUTST' => 'lte:' . $out,
            'EXP_PER_KM_RATE' => 'lte:' . $kms,
            'EXP_BUS_TRAIN' => 'lte:' . $bus,
            'EXP_MISC' => 'lte:' . $mis,
            'EXP_PLANE' => 'lte:' . $plane,
            'EXP_TAXI_AUTO' => 'lte:' . $auto,
            'EXP_VEH_REPAIR' => 'lte:' . $vehicle,
            'EXP_HOTEL' => 'lte:' . $hotel,
            'EXP_STATIONARY' => 'lte:' . $stat,
            'EXP_MOBILE_INTERNET' => 'lte:' . $mobile,
            'EXP_FUEL' => 'lte:' . $fuel,
        ];

        $customMessages = [
            'DA_RATES_LOCAL.lte' => 'Daily Allowance Local should be less than or equal to ' . $da,
            'DA_RATES_OUTST.lte' => 'Daily Allowance Outstation should be less than or equal to ' . $out,
            'EXP_PER_KM_RATE.lte' => 'Per Km Rate should be less than or equal to ' . $kms,
            'EXP_BUS_TRAIN.lte' => 'Bus/Train Expense should be less than or equal to ' . $bus,
            'EXP_MISC.lte' => 'Miscellaneous should be less than or equal to ' . $mis,
            'EXP_PLANE.lte' => 'Air Expense should be less than or equal to' . $plane,
            'EXP_TAXI_AUTO.lte' => 'Taxi/Auto/Rickshaw Exepnse should be less than or equal to ' . $auto,
            'EXP_VEH_REPAIR.lte' => 'Vehicle Repair Expense should be less than or equal to ' . $vehicle,
            'EXP_HOTEL.lte' => 'Hotel Expense should be less than or equal to ' . $hotel,
            'EXP_STATIONARY.lte' => 'Stationary Expense should be less than or equal to ' . $stat,
            'EXP_MOBILE_INTERNET.lte' => 'Internet/Phone Expense should be less than or equal to ' . $mobile,
            'EXP_FUEL.lte' => 'Fuel Expense should be less than or equal to ' . $fuel,
        ];

        $this->validate($request, $rules, $customMessages);


        $DA_RATES_LOCAL = $request->get('DA_RATES_LOCAL');
        $DA_RATES_OUTST = $request->get('DA_RATES_OUTST');
        $EXP_FUEL = $request->get('EXP_FUEL');
        $EXP_BUS_TRAIN = $request->get('EXP_BUS_TRAIN');
        $EXP_PLANE = $request->get('EXP_PLANE');
        $EXP_TAXI_AUTO = $request->get('EXP_TAXI_AUTO');
        $EXP_VEH_REPAIR = $request->get('EXP_VEH_REPAIR');
        $EXP_HOTEL = $request->get('EXP_HOTEL');
        $EXP_STATIONARY = $request->get('EXP_STATIONARY');
        $EXP_MOBILE_INTERNET = $request->get('EXP_MOBILE_INTERNET');
        $EXP_MISC = $request->get('EXP_MISC');
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        $EMPLOYEE_ID = $request->get('EMPLOYEE_ID');
        $MISC_COMMENTS = $request->get('MISC_COMMENTS');
        $id = $request->route('approveclaim');

        $TOTAL_CLAIMED_AMOUNT = $DA_RATES_LOCAL + $DA_RATES_OUTST + $EXP_FUEL + $EXP_BUS_TRAIN + $EXP_PLANE + $EXP_TAXI_AUTO + $EXP_VEH_REPAIR + $EXP_HOTEL + $EXP_STATIONARY + $EXP_MOBILE_INTERNET + $EXP_MISC;


        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost',
        ]);

        $response = $client->request('PUT', '/suprsales_api/Claim/updateClaim.php?id=' . $id, [
            'json' => [
                'DA_RATES_LOCAL' => $DA_RATES_LOCAL,
                'DA_RATES_OUTST' => $DA_RATES_OUTST,
                'EXP_FUEL' => $EXP_FUEL,
                'EXP_BUS_TRAIN' => $EXP_BUS_TRAIN,
                'EXP_PLANE' => $EXP_PLANE,
                'EXP_TAXI_AUTO' => $EXP_TAXI_AUTO,
                'EXP_VEH_REPAIR' => $EXP_VEH_REPAIR,
                'EXP_HOTEL' => $EXP_HOTEL,
                'EXP_STATIONARY' => $EXP_STATIONARY,
                'EXP_MOBILE_INTERNET' => $EXP_MOBILE_INTERNET,
                'EXP_MISC' => $EXP_MISC,
                'MISC_COMMENTS' => $MISC_COMMENTS,
                'TOTAL_CLAIMED_AMOUNT' => $TOTAL_CLAIMED_AMOUNT,
                'EMPLOYEE_ID' => $EMPLOYEE_ID
            ]
        ]);

        $pending = Http::get('http://localhost/suprsales_api/Claim/getClaim.php?id=' . $EMPLOYEE_ID . '&start_date=' . $start_date . '&end_date=' . $end_date)->json();
        $ids = Auth::user()->emp_id;
        $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

        $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();

        if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
            //return view('approval',['start_date' => $start_date],['end_date' => $end_date])->with(compact('announcement','ann','pending'),'message','Claim Updated Successfully');
            return redirect('approveclaim/' . $EMPLOYEE_ID . '/' . $start_date . '/' . $end_date)->with('message', 'Claim Updated Successfully');

            //return redirect('/approval')->with('message','Claim Updated Successfully');
        } else {
            return redirect('approveclaim/' . $EMPLOYEE_ID . '/' . $start_date . '/' . $end_date)->with('message', 'Claim Not Updated');

            //return view('approval',['start_date' => $start_date],['end_date' => $end_date])->with(compact('announcement','ann','pending'),'error','Claim Not Updated');

        }
    }

    public function state(Request $request, $id, $start_date, $end_date, $status)
    {
        $id = $request->route('approveclaim');
        $start_date = $request->route('start_date');
        $end_date = $request->route('end_date');
        $status = $request->route('status');

        $approv = Http::get('http://localhost/suprsales_api/Claim/getClaimByApprovalStatus.php?id=' . $id . '&start_date=' . $start_date . '&end_date=' . $end_date . '&approval_status=' . $status)->json();


        $userData['data'] = $approv;

        echo json_encode($userData);
        exit;
    }

    public function submitted(Request $request, $id, $start_date, $end_date, $status, $submitted)
    {
        $id = $request->route('approveclaim');
        $start_date = $request->route('start_date');
        $end_date = $request->route('end_date');
        $status = $request->route('status');
        $submitted = $request->route('submitted');

        $sub = Http::get('http://localhost/suprsales_api/Claim/getClaim.php?id=' . $id . '&start_date=' . $start_date . '&end_date=' . $end_date)->json();


        $userData['data'] = $sub;

        echo json_encode($userData);
        exit;
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
