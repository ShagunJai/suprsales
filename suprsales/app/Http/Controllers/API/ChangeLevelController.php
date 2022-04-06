<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class ChangeLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = Http::get('http://localhost/suprsales_api/Level/getEmpLevelExpRates.php')->json();
		$levels = Http::get('http://localhost/suprsales_api/Level/getLevel.php')->json();
		
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'changelevel'){
				$count = 1;	
				break;
			}
        }
      }
		
		if($count == 1){
			return view('changeLevel')->with(compact('level','levels','announcement','ann'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
	  
	  $id = $request->route('changelevel'); 
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
      $LEVEL_RANK_ID = $request->get('LEVEL_RANK_ID');
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
	  $id = $request->route('changelevel'); 

      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://localhost',
      ]);
       
      $response = $client->request('PUT', '/suprsales_api/Level/updateEmpLevelExpRates.php?id='.$id, [
        'json' => [
          'LEVEL_RANK_ID' => $LEVEL_RANK_ID,
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
		return redirect('/changelevel')->with('message','Employee Level Updated Successfully');
	   }
	   else{
		   return redirect('/changelevel')->with('error','Level Not Updated');
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
