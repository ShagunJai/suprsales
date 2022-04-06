<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class ScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Http::get('http://localhost/suprsales_api/Screen/create_screen/')->json();
        
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 
		 $count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'screens'){
				$count = 1;	
				break;
			}
        }
    }
		
		if($count == 1){
			return view('screen')->with(compact('announcement','admins','ann'));
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
        $screen_name = $request->get('screen_name');
		$screen_description = $request->get('screen_description');
		$screen_path = $request->get('screen_path');

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Screen/create_screen/api-create.php', [
			'json' => [
				'SCREEN_NAME' => $screen_name,
				'SCREEN_DESCRIPTION' => $screen_description,
				'SCREEN_LINK' => $screen_path
			]
		]);
		
       if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/screens')->with('message','Screen Inserted Successfully');
	   }
	   else{
		   return redirect('/screens')->with('error','Screen Not Addded');
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
        $screen_name = $request->get('screen_name');
		$screen_description = $request->get('screen_description');
        $flag = $request->get('flag');
        $id = $request->route('screen'); 
  
        $client = new Client([
          // Base URI is used with relative requests
          'base_uri' => 'http://localhost',
        ]);
         
        $response = $client->request('PUT', '/suprsales_api/Screen/create_screen/api-update.php?id='.$id, [
          'json' => [
            'SCREEN_NAME' => $screen_name,
			'SCREEN_DESCRIPTION' => $screen_description,
            'FLAG' => $flag
          ]
        ]);
        
        if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/screens')->with('message','Screen Updated Successfully');
	   }
	   else{
		   return redirect('/screens')->with('error','Screen Not Updated');
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
