<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Models\Announcement;
use Auth;

class TypeAnnounceController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$admins = Http::get('http://localhost/suprsales_api/Announcement/')->json();

		if (isset(Auth::user()->id)) {
			$ids = Auth::user()->emp_id;
			$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

			$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();

			$count = 0;
			if (isset($ann)) {
				foreach ($ann as $val) {
					if ($val['auth_reference'] == 'announcetype') {
						$count = 1;
						break;
					}
				}
			}

			if ($count == 1) {
				return view('typeAnn')->with(compact('announcement', 'admins', 'ann'));
			} else {
				return redirect('error');
			}
		} else {
			return redirect('userlogin');
		}

		//return response()->view('typeAnn', $data, 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{


		$announcement_type = $request->get('announcement_type');

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);

		$response = $client->request('POST', '/suprsales_api/Announcement/api-create.php', [
			'json' => [
				'ANNOUNCEMENT_TYPE' => $announcement_type
			]
		]);

		if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
			return redirect('/announcetype')->with('message', 'Announcement Type Inserted Successfully');
		} else {
			return redirect('/announcetype')->with('error', 'Announcement Type Not Created');
		}
	}


	public function show($id)
	{
		//
	}


	public function update(Request $request, $id)
	{
		$announcement_type = $request->get('announcement_type');
		$flag = $request->get('flag');
		$id = $request->route('announcetype');

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);

		$response = $client->request('PUT', '/suprsales_api/Announcement/api-update.php?id=' . $id, [
			'json' => [
				'ANNOUNCEMENT_TYPE' => $announcement_type,
				'FLAG' => $flag,
			]
		]);
		if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
			return redirect('/announcetype')->with('message', 'Announcement Type Updated Successfully');
		} else {
			return redirect('/announcetype')->with('error', 'Announcement Type Not Updated');
		}
	}


	public function destroy($id)
	{
		//
	}
}
