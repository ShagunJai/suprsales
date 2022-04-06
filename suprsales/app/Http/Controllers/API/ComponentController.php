<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Http::get('http://localhost/suprsales_api/Ticket/getComponent.php')->json();
        $emp = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		
		if(isset(Auth::user()->id)){
		$ids = Auth::user()->emp_id;
		 $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		 
		 $count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'component'){
				$count = 1;	
				break;
			}
        }
    }
		
		if($count == 1){
			return view('component')->with(compact('announcement','admins','ann','emp'));
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
         $comp_name = $request->get('comp_name');
		$comp_description = $request->get('comp_description');
		$emp_name = $request->get('emp_name');
		


		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Ticket/createComponent.php', [
			'json' => [
				'COMPONENT_NAME' => $comp_name,
				'COMPONENT_DESCRIPTION' => $comp_description,
				'COMPONENT_OWNER' => $emp_name
			]
		]);
		
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/component')->with('message','Component Created Successfully');
	   }
	   else{
		   return redirect('/component')->with('error','Component Not Created');
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
        $comp_name = $request->get('comp_name');
        $comp_description = $request->get('comp_description');
		$comp_owner = $request->get('comp_owner');
        $flag = $request->get('flag');
        $id = $request->route('component'); 
  
        $client = new Client([
          // Base URI is used with relative requests
          'base_uri' => 'http://localhost',
        ]);
         
        $response = $client->request('PUT', '/suprsales_api/Ticket/updateComponent.php?id='.$id, [
          'json' => [
            'COMPONENT_NAME' => $comp_name,
            'COMPONENT_DESCRIPTION' => $comp_description,
			'COMPONENT_OWNER' => $comp_owner,
            'FLAG' => $flag
          ]
        ]);
        
        if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/component')->with('message','Component Updated Successfully');
	   }
	   else{
		   return redirect('/component')->with('error','Component Not Updated');
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
