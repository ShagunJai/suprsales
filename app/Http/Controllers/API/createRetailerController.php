<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class createRetailerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */ 
	public function index()
	{
         // it contain all the region with zone_id and region_id inside the veriable $region

		$region = Http::get('http://localhost/suprsales_api/Region/')->json();
        // it contain state_id and state_name inside the $state veriable
		$state = Http::get('http://localhost/suprsales_api/State/')->json();
          // It shows the announcement in the top announcement btn
          //if the user has not logged in. Auth::user() is used to get the currently authenticated user.

		if (isset(Auth::user()->id)) {
           //it gives the emp_id with authenticated user ID
			$ids = Auth::user()->emp_id;
			$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
            //It shows authenticated uses references and store it in $ann
			$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
            //isset $ann use for the reference should have some data as the createRetailer
			$count = 0;
          /*If $ann is not null
             then for each $ann value is set in $val
              if 'auth_reference' of $val specified id equals to 'createretailer'
               then take $count=1 */
			if (isset($ann)) {
				foreach ($ann as $val) {
					if ($val['auth_reference'] == 'createretailer') {
						$count = 1;
						break;
					}
				}
			}
             //The compact() function is used to convert given variable to array in which the key of the array will be the name of the variable and the value of the array will be the value of the variable
            // it will make the array of announcement', 'ann', 'region', 'state' and store.
			if ($count == 1) {
				return view('createRetailer')->with(compact('announcement', 'ann', 'region', 'state'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  IT store the given users value inside a veriable
	public function store(Request $request)
	{
		$RETAILER_NAME = $request->get('RETAILER_NAME');
		$RETAILER_PAN = $request->get('RETAILER_PAN');
		$RETAILER_DOB = $request->get('RETAILER_DOB');
		$RETAILER_MOB = $request->get('RETAILER_MOB');
		$RETAILER_PINCODE = $request->get('RETAILER_PINCODE');
		$RETAILER_GSTIN = $request->get('RETAILER_GSTIN');
		$RETAILER_ADDRESS1 = $request->get('RETAILER_ADDRESS1');
		$RETAILER_ADDRESS2 = $request->get('RETAILER_ADDRESS2');
		$RETAILER_ADDRESS3 = $request->get('RETAILER_ADDRESS3');
		$RETAILER_AADHAR_ID = $request->get('RETAILER_AADHAR_ID');
		$RETAILER_BANK_ACC_NO = $request->get('RETAILER_BANK_ACC_NO');
		$REGION_ID = $request->get('REGION_ID');
		$AREA_ID = $request->get('AREA_ID');
		$id = Auth::user()->emp_id;
     //  This gives the date month and year format and store inside
		list($month, $day, $year) = explode('/', $RETAILER_DOB);

		$retailer_dob = $year . '-' . $month . '-' . $day;

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
    //   It is use to update the given data insuide api in json format
		$response = $client->request('POST', '/suprsales_api/Customer/create-one-retailer.php', [
			'json' => [
				'RETAILER_NAME' => $RETAILER_NAME,
				'RETAILER_PAN' => $RETAILER_PAN,
				'RETAILER_DOB' => $retailer_dob,
				'RETAILER_MOB' => $RETAILER_MOB,
				'RETAILER_PINCODE' => $RETAILER_PINCODE,
				'RETAILER_GSTIN' => $RETAILER_GSTIN,
				'RETAILER_ADDRESS1' => $RETAILER_ADDRESS1,
				'RETAILER_ADDRESS2' => $RETAILER_ADDRESS2,
				'RETAILER_ADDRESS3' => $RETAILER_ADDRESS3,
				'RETAILER_AADHAR_ID' => $RETAILER_AADHAR_ID,
				'RETAILER_BANK_ACC_NO' => $RETAILER_BANK_ACC_NO,
				'RETAILER_LONG' => 0,
				'RETAILER_LAT' => 0,
				'REGION_ID' => $REGION_ID,
				'AREA_ID' => $AREA_ID,
				'UPDATED_BY' => $id
			]
		]);
        //    Get the status code for the response. It will return the status code.
        //   It gives response if the retailer are created successfully or not
		if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
			return redirect('/createretailer')->with('message', 'Retailer Created Successfully');
		} else {
			return redirect('/createretailer')->with('error', 'Retailer Not Created');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
   // Here show function is used to show the area get from the api it will given by the ids
	public function show(Request $request, $id)
	{

        //it give the request from the ids
        $id = $request->route('createretailer');
        // by the help of the ids it will show the are
		$district = Http::get('http://localhost/suprsales_api/Area/getArea.php?id=' . $id)->json();


		$userData['data'] = $district;

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
    //  update function  is used for update the retailer data and creating the new retailer
	public function update(Request $request, $id)
	{
        //   It is use for handeling one or more than one retailer creating
		$file = $request->file('excel');
		$ids = Auth::user()->emp_id;
		if ($file) {
			$row = 1;
			$array = [];
			if (($handle = fopen($file, "r")) !== FALSE) {
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                     //  every one created retailer contain the given data inside the api
					if ($row > 1) {
						//dd($row);
						Http::post('http://localhost/suprsales_api/Customer/create-one-retailer.php', [
							'RETAILER_NAME' => $data[0],
							'RETAILER_DOB' => $data[1],
							'RETAILER_MOB' => $data[2],
							'RETAILER_PAN' => $data[3],
							'RETAILER_GSTIN' => $data[4],
							'RETAILER_PINCODE' => $data[5],
							'RETAILER_ADDRESS1' => $data[6],
							'RETAILER_ADDRESS2' => $data[7],
							'RETAILER_ADDRESS3' => $data[8],
							'RETAILER_LONG' => 0,
							'RETAILER_LAT' => 0,
							'RETAILER_AADHAR_ID' => $data[9],
							'RETAILER_BANK_ACC_NO' => $data[10],
							'REGION_ID' => $data[11],
							'AREA_ID' => $data[13],
							'UPDATED_BY' => $ids
						]);

						array_push($array);
						//dd($row);
					}
					//$request->session()->flash('status', 'Users     '.implode($array,", ").' created successfully!');
					$row++;
				}
			}
             // every successful creation this message will show
			return redirect('/createretailer')->with('message', 'Retailer Created Successfully');
        }    // every Unsuccessful creation this message will show and redirect createretailer
        else {
			$request->session()->flash('error', 'Please choose a file to submit.');
			return redirect('/createretailer');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
  // It gives the csv file to the users for download and the storage for the file is storage / retailer . xlsx from which this file came
	public function destroy(Request $request, $id)
	{
		return response()->download('storage/retailer.xlsx');
	}
}
