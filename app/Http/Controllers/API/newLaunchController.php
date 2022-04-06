<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use GuzzleHttp\Client;
use Auth;
use Hash;


class newLaunchController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

        $region = Http::get('http://localhost/suprsales_api/Region/')->json();
        $state = Http::get('http://localhost/suprsales_api/State/')->json();
		 if (isset(Auth::user()->id)) {
            //it gives the emp_id with authenticated user ID
			$ids = Auth::user()->emp_id;

			$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
             //It shows authenticated uses references and store it in $ann
			$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();

			$count = 0;
           
			if (isset($ann)) {
				foreach ($ann as $val) {
					if ($val['auth_reference'] == 'newproductlaunch') {
						$count = 1;
						break;
					}
				}
			}
            //The compact() function is used to convert given variable to array in which the key of the array will be the name of the variable and the value of the array will be the value of the variable.
			if ($count == 1) {
				return view('newProductLaunch')->with(compact('announcement', 'ann','region','state'));
			}
            // it will return 404 eror if the user is not authenticate
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

		$Region = $request->get('regionname');
		$Youtube_Link = $request->get('youTubeLink');
		$About_Header = $request->get('youTubeAbout');
		

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);

    //   It is use to update the given data insuide api in json format
		$response = $client->request('POST', '/suprsales_api/YouTube/createYoutubeDetail.php', [
			'json' => [


				'YOUTUBE_LINK' => $Youtube_Link,
				'HEADER' => $About_Header,
				'REGION_ID' => $Region,
				
			]

		]);

		
			return redirect('/dashboard')->with('message', ' Video Save Successfully');
		
	}


}