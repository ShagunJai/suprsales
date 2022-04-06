<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $region = Http::get('http://localhost/suprsales_api/Region/')->json();
		$zone = Http::get('http://localhost/suprsales_api/Zone/')->json();
		
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 
		 $count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'area'){
				$count = 1;	
				break;
			}
        }
    }
		
		if($count == 1){
			return view('area')->with(compact('announcement','ann','zone','region'));
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
        $regions = $request->get('region');
		$zones = $request->get('zone');
		
		$region = Http::get('http://localhost/suprsales_api/Region/')->json();
		$zone = Http::get('http://localhost/suprsales_api/Zone/')->json();
		
		$ids = Auth::user()->emp_id;
		$ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		$announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		$admins = Http::get('http://localhost/suprsales_api/Area/?zone_id='.$zones.'&region_id='.$regions)->json();
        
		return view('area')->with(compact('announcement','ann','admins','region','zone'));
	
    }
	
	public function createarea(Request $request){
		  
		  $area_name = $request->get('area_name');
		$region_name = $request->get('region_name');
		
		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Area/api-create.php', [
			'json' => [
				'AREA_NAME' => $area_name,
				'REGION_ID' => $region_name
			]
		]);
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/area')->with('message','Area Created Successfully');
	   }
	   else{
		   return redirect('/area')->with('error','Area Not Created');
	   }
		
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
      $AREA_NAME = $request->get('AREA_NAME');
      $FLAG = $request->get('FLAG');
	  $id = $request->route('area'); 

      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://localhost',
      ]);
       
      $response = $client->request('PUT', '/suprsales_api/Area/api-update.php?id='.$id, [
        'json' => [
          'AREA_NAME' => $AREA_NAME,
          'FLAG' => $FLAG
        ]
      ]);
      if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/area')->with('message','Area Updated Successfully');
	   }
	   else{
		   return redirect('/area')->with('error','Area Not Updated');
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
