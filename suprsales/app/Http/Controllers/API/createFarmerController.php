<?php

namespace App\Http\Controllers\API;

use App\Imports\UsersImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use GuzzleHttp\Client;
use Auth;

class createFarmerController extends Controller
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
		
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'createfarmer'){
				$count = 1;	
				break;
			}
        }
	}
		
		if($count == 1){
			return view('createFarmer')->with(compact('announcement','ann','region','state'));
		}
		else{
			return redirect('error');
		}
		}
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
    public function store(Request $request)
    {
       
		$FARMER_NAME = $request->get('FARMER_NAME');
		$FARMER_FATHER_NAME = $request->get('FARMER_FATHER_NAME');
		$FARMER_DOB = $request->get('FARMER_DOB');
		$FARMER_MOB = $request->get('FARMER_MOB');
		$FARMER_VILLAGE = $request->get('FARMER_VILLAGE');
		$FARMER_TEHSIL = $request->get('FARMER_TEHSIL');
		$FARMER_PINCODE = $request->get('FARMER_PINCODE');
		$MAJOR_CROP_1 = $request->get('MAJOR_CROP_1');
		$MAJOR_CROP_2 = $request->get('MAJOR_CROP_2');
		$MAJOR_CROP_3 = $request->get('MAJOR_CROP_3');
		$LAND_HOLDING = $request->get('LAND_HOLDING');
		$FARMER_AADHAR_ID = $request->get('FARMER_AADHAR_ID');
		$FARMER_BANK_ACC_NO = $request->get('FARMER_BANK_ACC_NO');
		$REGION_ID = $request->get('REGION_ID');
		$AREA_ID = $request->get('AREA_ID');
		$id = Auth::user()->emp_id;
		
		
		list($month, $day, $year) = explode('/', $FARMER_DOB);
		
		$farmer_dob = $year.'-'.$month.'-'.$day;
		
		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		
			
		$response = $client->request('POST', '/suprsales_api/Customer/create-one-farmer.php', [
		'json' => [
		
			
				'FARMER_NAME' => $FARMER_NAME,
				'FARMER_FATHER_NAME' => $FARMER_FATHER_NAME,
				'FARMER_DOB' => $farmer_dob,
				'FARMER_MOB' => $FARMER_MOB,
				'FARMER_VILLAGE' => $FARMER_VILLAGE,
				'FARMER_TEHSIL' => $FARMER_TEHSIL,
				'FARMER_PINCODE' => $FARMER_PINCODE,
				'MAJOR_CROP_1' => $MAJOR_CROP_1,
				'MAJOR_CROP_2' => $MAJOR_CROP_2,
				'MAJOR_CROP_3' => $MAJOR_CROP_3,
				'LAND_HOLDING' => $LAND_HOLDING,
				'FARMER_AADHAR_ID' => $FARMER_AADHAR_ID,
				'FARMER_BANK_ACC_NO' => $FARMER_BANK_ACC_NO,
				'REGION_ID' => $REGION_ID,
				'AREA_ID' => $AREA_ID,
				'UPDATED_BY' => $id
				]
		
		]);
		
		
		 if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/createfarmer')->with('message','Farmers Created Successfully');
	   }
	   else{
		   return redirect('/createfarmer')->with('error','Farmer Not Created');
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
      $id = $request->route('createfarmer');
	   
      $district = Http::get('http://localhost/suprsales_api/Area/getArea.php?id='.$id)->json();
		
     
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
    public function update(Request $request, $id)
    {
         $file = $request->file('excel');
		$ids = Auth::user()->emp_id;
    if($file){
        $row = 1;
        $array = [];
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				
                if($row > 1){
					//dd($row);
					Http::post('http://localhost/suprsales_api/Customer/create-one-farmer.php', [
					'FARMER_NAME' => $data[0],
                        'FARMER_FATHER_NAME' => $data[1],
						'FARMER_DOB' => $data[2],
						'FARMER_MOB' => $data[3],
						'FARMER_VILLAGE' => $data[4],
						'FARMER_TEHSIL' => $data[5],
						'FARMER_PINCODE' => $data[6],
						'MAJOR_CROP_1' => $data[7],
						'MAJOR_CROP_2' => $data[8],
						'MAJOR_CROP_3' => $data[9],
						'LAND_HOLDING' => $data[10],
						'FARMER_AADHAR_ID' => $data[11],
						'FARMER_BANK_ACC_NO' => $data[12],
						'REGION_ID' => $data[13],
						'AREA_ID' => $data[15],
						'UPDATED_BY' => $ids
            ]);
                    
                    array_push($array);
                }
                $row++;
				
            }
        }
		return redirect('/createfarmer')->with('message','Farmer Created Successfully');
    }
	else{
        $request->session()->flash('error', 'Please choose a file to submit.');
		return redirect('/createfarmer');
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
        return response()->download('storage/farmer.xlsx');
    }
}
