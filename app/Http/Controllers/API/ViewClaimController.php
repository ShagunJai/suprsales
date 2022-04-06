<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class ViewClaimController extends Controller
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
			$region = Http::get('http://localhost/suprsales_api/Employee/getById.php?id=' . $ids)->json();
			$level = Http::get('http://localhost/suprsales_api/Level/getEmployeeLevelExpRates.php?id=' . $ids)->json();

			$count = 0;
			if (isset($ann)) {
				foreach ($ann as $val) {
					if ($val['auth_reference'] == 'viewclaim') {
						$count = 1;
						break;
					}
				}
			}

			if ($count == 1) {
				return view('viewClaim')->with(compact('announcement', 'ann', 'region', 'level'));
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


		$ids = Auth::user()->emp_id;
		$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
		$region = Http::get('http://localhost/suprsales_api/Employee/getById.php?id=' . $ids)->json();
		$level = Http::get('http://localhost/suprsales_api/Level/getEmployeeLevelExpRates.php?id=' . $ids)->json();
		$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

		$mydate = $year . "-" . $month . "-" . "01";

		if ($cycle == "null") {
			$start_day = "00";
			$end_day = "00";
		}

		if ($cycle == "h1") {
			$start_day = "01";
			$end_day = "15";
		}
		if ($cycle == "h2") {
			$start_day = "16";
			$end_day = \Carbon\Carbon::parse($mydate)->endOfMonth()->format('d');
			//$end_day = "31";
		}

		$start_date = $year . "-" . $month . "-" . $start_day;
		$end_date = $year . "-" . $month . "-" . $end_day;

		$claim = Http::get('http://localhost/suprsales_api/Claim/getClaim.php?id=' . $ids . '&start_date=' . $start_date . '&end_date=' . $end_date)->json();

		return view('viewClaim', ['start_date' => $start_date], ['end_date' => $end_date])->with(compact('announcement', 'ann', 'region', 'level', 'claim'));
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

	public function editcust(Request $request, $id, $start_date, $end_date)
	{
		$id = $request->route('viewclaim');
		$start_date = $request->route('start_date');
		$end_date = $request->route('end_date');

		$user = Http::get('http://localhost/suprsales_api/Claim/getClaim.php?id=' . $id . '&start_date=' . $start_date . '&end_date=' . $end_date)->json();


		$userData['data'] = $user;

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
		$ids = Auth::user()->emp_id;

		$user = Http::get('http://localhost/suprsales_api/Level/getEmployeeLevelExpRates.php?id=' . $ids)->json();
		if (isset($user)) {
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
			$MISC_COMMENTS = $request->get('MISC_COMMENTS');
			$id = $request->route('viewclaim');

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
					'EMPLOYEE_ID' => $ids
				]
			]);


			if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
				return redirect('/viewclaim')->with('message', 'Claim Updated Successfully');
			} else {
				return redirect('/viewclaim')->with('error', 'Claim Not Updated');
			}
		} else {
			return redirect('/viewclaim')->with('warning', 'Claims Limits Not Defined. Please Contact Administrator');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id)
	{
		$id = $request->route('viewclaim');
		//dd($id);

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);

		$response = $client->request('DELETE', '/suprsales_api/Claim/deleteClaim.php?id=' . $id);

		if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
			return redirect('/viewclaim')->with('message', 'Claim Record Deleted Successfully!');
		} else {
			return redirect('/viewclaim')->with('error', 'Claim Record Not Deleted');
		}
	}
}
