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
        $region = Http::get('http://localhost/suprsales_api/Region/')->json();
		 $state = Http::get('http://localhost/suprsales_api/State/')->json();
		
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'createretailer'){
				$count = 1;	
				break;
			}
        }
	}
		
		if($count == 1){
			return view('createRetailer')->with(compact('announcement','ann','region','state'));
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
		
		list($month, $day, $year) = explode('/', $RETAILER_DOB);
		
		$retailer_dob = $year.'-'.$month.'-'.$day;

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
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
		
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/createretailer')->with('message','Retailer Created Successfully');
	   }
	   else{
		   return redirect('/createretailer')->with('error','Retailer Not Created');
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
       $id = $request->route('createretailer');
	   
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
		return redirect('/createretailer')->with('message','Retailer Created Successfully');
    }
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
    public function destroy(Request $request, $id)
    {
        return response()->download('storage/retailer.xlsx');
    }
}
