<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class OpenTicketController extends Controller
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
					if ($val['auth_reference'] == 'openticket') {
						$count = 1;
						break;
					}
				}
			}

			if ($count == 1) {
				return view('openTicket')->with(compact('announcement', 'ann'));
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
		$days = $request->get('days');


		list($part1, $part2) = explode(' - ', $days);
		list($month1, $day1, $year1) = explode('/', $part1);
		list($month2, $day2, $year2) = explode('/', $part2);

		$start_date = $year1 . '-' . $month1 . '-' . $day1;
		$end_date = $year2 . '-' . $month2 . '-' . $day2;

		$ids = Auth::user()->emp_id;
		$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
		$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();


		$tickets = Http::get('http://localhost/suprsales_api/Ticket/openTicket.php?id=' . $ids . '&start_date=' . $start_date . '&end_date=' . $end_date)->json();


		return view('openTicket', ['start_date' => $start_date], ['end_date' => $end_date])->with(compact('announcement', 'ann', 'tickets'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id)
	{
		if (isset(Auth::user()->id)) {
			$id = $request->route('openticket');
			$ids = Auth::user()->emp_id;
			$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

			$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
			$admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();

			$tic = Http::get('http://localhost/suprsales_api/Ticket/viewTicketDesc.php?id=' . $id)->json();
			$comp = Http::get('http://localhost/suprsales_api/Ticket/getComponent.php')->json();

			return view('responseTicket')->with(compact('announcement', 'ann', 'tic', 'admins', 'comp'));
		} else {
			return redirect('userlogin');
		}
	}

	public function shows(Request $request, $id, $start_date, $end_date)
	{
		if (isset(Auth::user()->id)) {
			$id = $request->route('openticket');
			$start_date = $request->route('start_date');
			$end_date = $request->route('end_date');
			$ids = Auth::user()->emp_id;

			$tickets = Http::get('http://localhost/suprsales_api/Ticket/openTicket.php?id=' . $ids . '&start_date=' . $start_date . '&end_date=' . $end_date)->json();

			$count = 0;

			if (isset($tickets)) {
				foreach ($tickets as $value) {
					if ($value['TICKET_ID'] == $id) {
						$count = 1;
						break;
					}
				}
			}

			if ($count == 1) {
				$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

				$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
				$admins = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();

				$tic = Http::get('http://localhost/suprsales_api/Ticket/viewTicketDesc.php?id=' . $id)->json();
				$comp = Http::get('http://localhost/suprsales_api/Ticket/getComponent.php')->json();

				return view('responseTicket', ['start_date' => $start_date], ['end_date' => $end_date])->with(compact('announcement', 'ann', 'tic', 'admins', 'comp'));
			} else {
				return redirect('error');
			}
		} else {
			return redirect('userlogin');
		}
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
