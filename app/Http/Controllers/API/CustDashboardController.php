<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class CustDashboardController extends Controller
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
			$user = Http::get('http://localhost/suprsales_api/Employee/getById.php?id=' . $ids)->json();
            
			$currentSales = Http::get('http://localhost/suprsales_api/Dashboard/currentMonthSales.php?id=' . $ids)->json();
        // It is for 16 days order cycle
			if (\Carbon\Carbon::now()->format('d') >= '16') {
				$cycle = "h2";
			} else {
				$cycle = "h1";
			}

			if ($cycle == "h1") {
				$start_day = "01";
				$end_day = "15";
			}
			if ($cycle == "h2") {
				$start_day = "16";
				$end_day = "31";
			}
            // It gives the month and years
			$month = \Carbon\Carbon::now()->format('m');
			$year = \Carbon\Carbon::now()->format('Y');

			$start_date = $year . "-" . $month . "-" . $start_day;
			$end_date = $year . "-" . $month . "-" . $end_day;

			$currentClaim = Http::get('http://localhost/suprsales_api/Dashboard/claimByDateRange.php?id=' . $ids . '&start_date=' . $start_date . '&end_date=' . $end_date)->json();
			$currentTicket = Http::get('http://localhost/suprsales_api/Dashboard/currentMonthTicket.php?id=' . $ids)->json();
			$quat_sales = Http::get('http://localhost/suprsales_api/Dashboard/quaterlySalesChart.php?id=' . $ids)->json();
			$mon_sales = Http::get('http://localhost/suprsales_api/Dashboard/monthlySalesChart.php?id=' . $ids)->json();
			$top_dist = Http::get('http://localhost/suprsales_api/Dashboard/topDistributor.php?id=' . $ids)->json();
			$top_prod = Http::get('http://localhost/suprsales_api/Dashboard/topProduct.php?id=' . $ids)->json();
			$top_plant = Http::get('http://localhost/suprsales_api/Dashboard/topPlants.php?id=' . $ids)->json();
			$mon_tic = Http::get('http://localhost/suprsales_api/Dashboard/monthlyTicketChart.php?id=' . $ids)->json();
			$Task = Http::get('http://localhost/suprsales_api/Dashboard/currentYearTaskStatus.php?id=' . $ids)->json();
			$task_det = Http::get('http://localhost/suprsales_api/Dashboard/allTaskActivityStatusByEmp.php?id=' . $ids)->json();

			$count = 0;
			if (isset($ann)) {
				foreach ($ann as $val) {
					if ($val['auth_reference'] == 'custdashboard') {
						$count = 1;
						break;
					}
				}
			}


			if ($count == 1) {
				return view('custDashboard')->with(compact('announcement', 'ann', 'user', 'currentSales', 'currentClaim', 'currentTicket', 'quat_sales', 'mon_sales', 'top_dist', 'top_prod', 'top_plant', 'mon_tic', 'Task', 'task_det'));
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
