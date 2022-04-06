<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class LevelSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Http::get('http://localhost/suprsales_api/Level/getLevel.php')->json();
		$levelexp = Http::get('http://localhost/suprsales_api/Level/getLevelExpRates.php')->json();
		$global = Http::get('http://localhost/suprsales_api/Level/getGlobalSetting.php')->json();
		
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'levelsettings'){
				$count = 1;	
				break;
			}
        }
	}
		
		if($count == 1){
			return view('levelSettings')->with(compact('levels','levelexp','announcement','ann','global'));
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
        
		$level_id = $request->get('level_id');
		$level_name = $request->get('level_name');
		$level_description = $request->get('level_description');

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Level/createLevel.php', [
			'json' => [
				'LEVEL_RANK_ID' => $level_id,
				'LEVEL_NAME' => $level_name,
				'LEVEL_DESC' => $level_description
			]
		]);
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/levelsettings')->with('message','Level Created Successfully');
	   }
	   else{
		   return redirect('/levelsettings')->with('error','Level Not Created');
	   }
    }

    public function globalsettings(Request $request)
    {
        
		$MAX_CLAIM_DAYS_LIMIT = $request->get('MAX_CLAIM_DAYS_LIMIT');
	
		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Level/globalSetting.php', [
			'json' => [
				'MAX_CLAIM_DAYS_LIMIT' => $MAX_CLAIM_DAYS_LIMIT
			]
		]);
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/levelsettings')->with('message','Max Days Created Successfully');
	   }
	   else{
		   return redirect('/levelsettings')->with('error','Max Days Not Created');
	   }
    }
	
    public function show(Request $request,$id)
    {
       $id = $request->route('levelsetting');
	   
      $levelexp = Http::get('http://localhost/suprsales_api/Level/getLevelExpRates.php?id='.$id)->json();
		
     
     $userData['data'] = $levelexp;

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
      
	  $DA_RATES_LOCAL = $request->get('DA_RATES_LOCAL');
	  $DA_RATES_OUTST = $request->get('DA_RATES_OUTST');
	 $EXP_PER_KM_RATE = $request->get('EXP_PER_KM_RATE');
     $exp_bus_train = $request->get('exp_bus_train');
	 $EXP_PLANE = $request->get('EXP_PLANE');
	 $EXP_TAXI_AUTO = $request->get('EXP_TAXI_AUTO');
	 $EXP_VEH_REPAIR = $request->get('EXP_VEH_REPAIR');
	 $EXP_HOTEL = $request->get('EXP_HOTEL');
	 $EXP_STATIONARY = $request->get('EXP_STATIONARY');
	 $EXP_MOBILE_INTERNET = $request->get('EXP_MOBILE_INTERNET');
	 $EXP_MISC = $request->get('EXP_MISC');
	 $EXP_FUEL = $request->get('EXP_FUEL');
	 $MAX_ALLOWED_KM = $request->get('MAX_ALLOWED_KM');
	  $id = $request->route('levelsetting'); 

      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://localhost',
      ]);
       
      $response = $client->request('PUT', '/suprsales_api/Level/createLevelExpRates.php?id='.$id, [
        'json' => [
		  'DA_RATES_LOCAL' => $DA_RATES_LOCAL,
		  'DA_RATES_OUTST' => $DA_RATES_OUTST,
		  'EXP_PER_KM_RATE' => $EXP_PER_KM_RATE,
		  'EXP_BUS_TRAIN' => $exp_bus_train,
		  'EXP_PLANE' => $EXP_PLANE,
		  'EXP_TAXI_AUTO' => $EXP_TAXI_AUTO,
		  'EXP_VEH_REPAIR' => $EXP_VEH_REPAIR,
		  'EXP_HOTEL' => $EXP_HOTEL,
		  'EXP_STATIONARY' => $EXP_STATIONARY,
		  'EXP_MOBILE_INTERNET' => $EXP_MOBILE_INTERNET,
		  'EXP_MISC' => $EXP_MISC,
		  'MAX_ALLOWED_KM' => $MAX_ALLOWED_KM,
		  'EXP_FUEL' => $EXP_FUEL
        ]
      ]);
      if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/levelsettings')->with('message','Level Updated Successfully');
	   }
	   else{
		   return redirect('/levelsettings')->with('error','Level Not Updated');
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
