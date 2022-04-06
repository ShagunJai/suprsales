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


class CreateEmployeeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

        // $level contains all level details and get from suprsales_api
		$level = Http::get('http://localhost/suprsales_api/Level/getLevel.php')->json();
         // $emp contains all Employee with their IDs and get from suprsales_api
		$emp = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
        // $plant contains all Plants details with their IDs,region email and get from suprsales_api
		$plant = Http::get('http://localhost/suprsales_api/Plant/')->json();
        // It contain Area ID, Area Name region id and get from suprsales_api
		$area = Http::get('http://localhost/suprsales_api/Area/allArea.php')->json();
        // It contain Region ID, Region and get from suprsales_api
		$region = Http::get('http://localhost/suprsales_api/Region/')->json();

        // It shows the announcement in the top announcement btn
          //if the user has not logged in. Auth::user() is used to get the currently authenticated user.
		 if (isset(Auth::user()->id)) {
            //it gives the emp_id with authenticated user ID
			$ids = Auth::user()->emp_id;

			$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
             //It shows authenticated uses references and store it in $ann
			$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();

			$count = 0;
           /*If $ann is not null
       then for each $ann value is set in $val
       if 'auth_reference' of $val specified id equals to 'empss'
       then take $count=1 */
			if (isset($ann)) {
				foreach ($ann as $val) {
					if ($val['auth_reference'] == 'createemployee') {
						$count = 1;
						break;
					}
				}
			}
            //The compact() function is used to convert given variable to array in which the key of the array will be the name of the variable and the value of the array will be the value of the variable.
			if ($count == 1) {
				return view('createEmp')->with(compact('announcement', 'ann', 'level', 'emp', 'plant', 'area', 'region'));
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
	// For manually upload It get the data from user and store the data to the respective veriable
     public function store(Request $request)
	{
		$EMP_NAME = $request->get('EMP_NAME');
		$EMP_EMAIL = $request->get('EMP_EMAIL');
		$EMP_MOBILE_NO = $request->get('EMP_MOBILE_NO');
		$EMP_DESIGNATION = $request->get('EMP_DESIGNATION');
		$EMP_CODE = $request->get('EMP_CODE');
		$REPORTING_MANAGER_ID = $request->get('REPORTING_MANAGER_ID');
		$EMP_CONTRACT_TYPE = $request->get('EMP_CONTRACT_TYPE');
		$AREA_ID = $request->get('AREA_ID');
		$LEVEL_ID = $request->get('LEVEL_ID');
		$PLANT_ID = $request->get('PLANT_ID');
		$APPROVER_ID = $request->get('APPROVER_ID');
		$VEHICLE_OWNERSHIP = $request->get('VEHICLE_OWNERSHIP');
		$VEHICLE_TYPE = $request->get('VEHICLE_TYPE');
		$IS_ADMIN = $request->get('IS_ADMIN');
		$EMP_TYPE = $request->get('EMP_TYPE');
		$REGION_ID = $request->get('REGION_ID');
		$PASSWORD = $request->get('PASSWORD');
		$pass = Hash::make($PASSWORD);
		$EDITED_BY = Auth::user()->emp_id;
		//dd($REGION_ID);

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);

//     For manually upload the form data store and upload the employee data to suprsales_api / Employee / create - one - employee . php
		$response = $client->request('POST', '/suprsales_api/Employee/create-one-employee.php', [
			'json' => [


				'EMP_NAME' => $EMP_NAME,
				'EMP_EMAIL' => $EMP_EMAIL,
				'EMP_MOBILE_NO' => $EMP_MOBILE_NO,
				'EMP_DESIGNATION' => $EMP_DESIGNATION,
				'EMP_CODE' => $EMP_CODE,
				'REPORTING_MANAGER_ID' => $REPORTING_MANAGER_ID,
				'EMP_CONTRACT_TYPE' => $EMP_CONTRACT_TYPE,
				'AREA_ID' => $AREA_ID,
				'LEVEL_ID' => $LEVEL_ID,
				'PLANT_ID' => $PLANT_ID,
				'LOCATION_ID' => 0,
				'APPROVER_ID' => $APPROVER_ID,
				'VEHICLE_OWNERSHIP' => $VEHICLE_OWNERSHIP,
				'VEHICLE_TYPE' => $VEHICLE_TYPE,
				'IS_ADMIN' => $IS_ADMIN,
				'EMP_TYPE' => $EMP_TYPE,
				'PASSWORD' => $pass,
				'REGION_ID' => $REGION_ID,
				'EDITED_BY' => $EDITED_BY
			]

		]);

// After successfully crete the employee ot shows the message success or not
		if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
			return redirect('/createemployee')->with('message', 'Employee Created Successfully');
		} else {
			return redirect('/createemployee')->with('error', 'Employee Not Created');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */

    // list your route arguments after your other dependencies:
	public function show(Request $request, $id)
	{
		$id = $request->route('createemployee');

		$district = Http::get('http://localhost/suprsales_api/Area/getArea.php?id=' . $id)->json();
		$plt = Http::get('http://localhost/suprsales_api/Plant/getPlantByRegionId.php?id=' . $id)->json();


		$userData['data'] = $district;
		$userData['dat'] = $plt;

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
    //it is for upload the employee details by uploading CSV format
	public function update(Request $request, $id)
	{
		$file = $request->file('excel');
		$ids = Auth::user()->emp_id;
		if ($file) {
			$row = 1;
			$array = [];
			if (($handle = fopen($file, "r")) !== FALSE) {
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

					if ($row > 1) {
						//dd($row);
						Http::post('http://localhost/suprsales_api/Employee/create-one-employee.php', [
							'EMP_CODE' => $data[0],
							'EMP_NAME' => $data[1],
							'EMP_EMAIL' => $data[2],
							'EMP_MOBILE_NO' => $data[3],
							'EMP_DESIGNATION' => $data[4],
							'REPORTING_MANAGER_ID' => $data[5],
							'EMP_CONTRACT_TYPE' => $data[6],
							'AREA_ID' => $data[7],
							'LEVEL_ID' => $data[9],
							'PLANT_ID' => $data[10],
							'LOCATION_ID' => $data[11],
							'APPROVER_ID' => $data[12],
							'VEHICLE_OWNERSHIP' => $data[13],
							'VEHICLE_TYPE' => $data[14],
							'IS_ADMIN' => $data[15],
							'EMP_TYPE' => $data[16],
							'PASSWORD' =>  Hash::make($data[17]),
							'REGION_ID' => $data[18],
							'EDITED_BY' => $ids
						]);

						array_push($array);
					}
					$row++;
				}
			}

     // gives the message employee create successful or not
			return redirect('/createemployee')->with('message', 'Employee Created Successfully');
		} else {
    // it gives the message click the submit without choose the file
			$request->session()->flash('error', 'Please choose a file to submit.');
			return redirect('/createemployee');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
   // It is to get the csv file from the store and download the file
	public function destroy(Request $request, $id)
	{
		return response()->download('storage/employee_format.xlsx');
	}
}
