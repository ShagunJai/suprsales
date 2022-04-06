<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;
use Carbon;

class CreateClaimController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$user = Http::get('http://localhost/suprsales_api/Level/getEmpLevelExpRates.php')->json();
		$claim_day = Http::get('http://localhost/suprsales_api/Level/getGlobalSetting.php')->json();



		if (isset(Auth::user()->id)) {
			$emp_id = Auth::user()->emp_id;
			$user = Http::get('http://localhost/suprsales_api/Level/getEmployeeLevelExpRates.php?id=' . $emp_id)->json();


			$emp_details = Http::get('http://localhost/suprsales_api/Employee/getById.php?id=' . $emp_id)->json();


			$exp = Http::get('http://localhost/suprsales_api/Level/getEmployeeLevelExpRates.php?id=' . $emp_id)->json();

			$ids = Auth::user()->emp_id;
			$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

			$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();

			$count = 0;
			if (isset($ann)) {
				foreach ($ann as $val) {
					if ($val['auth_reference'] == 'createclaim') {
						$count = 1;
						break;
					}
				}
			}

			if ($count == 1) {
				return view('createClaim')->with(compact('announcement', 'ann', 'user', 'claim_day', 'exp', 'emp_details'));
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
		$ids = Auth::user()->emp_id;

		$user = Http::get('http://localhost/suprsales_api/Level/getEmployeeLevelExpRates.php?id=' . $ids)->json();

		if (isset($user)) {
			$claim_date = $request->get('claim_date');


			$claim_DAY = \Carbon\Carbon::parse($claim_date)->format('d');

			if ($claim_DAY >= 01 && $claim_DAY <= 15) {
				$claim_cycle = "H1";
			} else {
				$claim_cycle = "H2"; 
			}

			$claim_MON = \Carbon\Carbon::parse($claim_date)->format('F');
			$claim_YEAR = \Carbon\Carbon::parse($claim_date)->format('Y');

			$claim_check = Http::get('http://localhost/suprsales_api/Claim/getClaimCycle.php?id=' . $ids)->json();

			$submitted = 0;

			if (isset($claim_check)) {
				foreach ($claim_check as $valu) {
					if ($claim_cycle ==  $valu['CYCLE'] && $claim_MON ==  $valu['MONTH'] && $claim_YEAR ==  $valu['YEAR']) {
						$submitted = $valu['SUBMITTED'] - $valu['ZERO'];
					}
				}
			}

			if ($submitted <= 13) {


				$claim_day = Http::get('http://localhost/suprsales_api/Level/getGlobalSetting.php')->json();

				if (isset($claim_day)) {
					foreach ($claim_day as $value) {
						$max_day = $value['MAX_CLAIM_DAYS_LIMIT'];
					}
				}

				$end = \Carbon\Carbon::now()->subDays($max_day)->format('d/m/Y');
				list($da2, $mon2, $yea2) = explode('/', $end);
				$start_date = $yea2 . '-' . $mon2 . '-' . $da2;

				$today = \Carbon\Carbon::now()->format('d/m/Y');

				list($da1, $mon1, $yea1) = explode('/', $today);
				$end_date = $yea1 . '-' . $mon1 . '-' . $da1;




				$claim = Http::get('http://localhost/suprsales_api/Claim/getClaim.php?id=' . $ids . '&start_date=' . $start_date . '&end_date=' . $end_date)->json();



				list($month1, $day1, $year1) = explode('/', $claim_date);
				$CLAIM_DATE = $year1 . '-' . $month1 . '-' . $day1;

				$count = 0;
				if (isset($claim)) {
					foreach ($claim as $val) {

						if ($claim_date == \Carbon\Carbon::parse($val['CLAIM_DATE'])->format('m/d/Y')) {
							$count = 1;

							break;
						}
					}
				}


				if ($count == 0) {

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
						$max_km = $value['LEFT_MAX_ALLOWED_KM'];
					}
					//dd($da);
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
						'LEFT_MAX_ALLOWED_KM' => 'lte:' . $max_km,
						'START_END' => 'lte:' . $max_km,
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
						'LEFT_MAX_ALLOWED_KM.lte' => 'Kilometers should be less than or equal to ' . $max_km,
						'START_END.lte' => 'Kilometers should be less than or equal to ' . $max_km,
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
					$START_KM = $request->get('START_KM');
					$END_KM = $request->get('END_KM');

					$MISC_COMMENTS = $request->get('MISC_COMMENTS');
					$TOTAL_CLAIMED_AMOUNT = $DA_RATES_LOCAL + $DA_RATES_OUTST + $EXP_FUEL + $EXP_BUS_TRAIN + $EXP_PLANE + $EXP_TAXI_AUTO + $EXP_VEH_REPAIR + $EXP_HOTEL + $EXP_STATIONARY + $EXP_MOBILE_INTERNET + $EXP_MISC;
					if ($TOTAL_CLAIMED_AMOUNT > 0) {

						$id = Auth::user()->emp_id;



						$client = new Client([
							// Base URI is used with relative requests
							'base_uri' => 'http://localhost',
						]);

						$response = $client->request('POST', '/suprsales_api/Claim/createClaim.php?id=' . $id, [
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
								'START_KM' => $START_KM,
								'END_KM' => $END_KM,
								'CLAIM_DATE' => $CLAIM_DATE,
								'MISC_COMMENTS' => $MISC_COMMENTS,
								'TOTAL_CLAIMED_AMOUNT' => $TOTAL_CLAIMED_AMOUNT
							]
						]);

						if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
							return redirect('/createclaim')->with('message', 'Claim Created Successfully');
						} else {
							return redirect('/createclaim')->with('error', 'Claim Not Created');
						}
					} else {
						return redirect('/createclaim')->with('error', 'Total Claimed Amount should be greater than zero!');
					}
				} else {
					return redirect('/createclaim')->with('error', 'Claim Already Created for ' . $claim_date);
				}
			} else {
				return redirect('/createclaim')->with('error', 'Claim not created. Maximum 13 claims can be raised in a submission cycle.');
			}
		} else {
			return redirect('/createclaim')->with('warning', 'Claims Limits Not Defined. Please Contact Administrator');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id)
	{
		$id = $request->route('createclaim');

		$user = Http::get('http://localhost/suprsales_api/Level/getEmployeeLevelExpRates.php?id=' . $id)->json();


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
		$id = $request->route('createclaim');

		$claim_date = $request->get('mark_claim_date');
		$MISC_COMMENTS = $request->get('MISCL_COMMENTS');

		$emp_id = Auth::user()->emp_id;


		$claim_DAY = \Carbon\Carbon::parse($claim_date)->format('d');

		if ($claim_DAY >= 01 && $claim_DAY <= 15) {
			$claim_cycle = "H1";
		} else {
			$claim_cycle = "H2";
		}

		$claim_MON = \Carbon\Carbon::parse($claim_date)->format('F');
		$claim_YEAR = \Carbon\Carbon::parse($claim_date)->format('Y');

		$claim_check = Http::get('http://localhost/suprsales_api/Claim/getClaimCycle.php?id=' . $emp_id)->json();

		$zero = 0;

		if (isset($claim_check)) {
			foreach ($claim_check as $valu) {
				if ($claim_cycle ==  $valu['CYCLE'] && $claim_MON ==  $valu['MONTH'] && $claim_YEAR ==  $valu['YEAR']) {
					$zero = $valu['ZERO'];
				}
			}
		}

		if ($zero <= 2) {


			list($month1, $day1, $year1) = explode('/', $claim_date);
			$CLAIM_DATE = $year1 . '-' . $month1 . '-' . $day1;

			$client = new Client([
				// Base URI is used with relative requests
				'base_uri' => 'http://localhost',
			]);

			$response = $client->request('PUT', '/suprsales_api/Claim/markNoClaim.php?id=' . $emp_id, [
				'json' => [
					'CLAIM_DATE' => $CLAIM_DATE,
					'MISC_COMMENTS' => $MISC_COMMENTS,
					'APPROVAL_STATUS' => $id
				]
			]);

			if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
				return redirect('/createclaim')->with('message', 'Zero Claim Created Successfully');
			} else {
				return redirect('/createclaim')->with('error', 'Claim Not Created');
			}
		} else {
			return redirect('/createclaim')->with('error', 'Claim not created. Maximum 2 zero claims can be raised in a submission cycle.');
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
