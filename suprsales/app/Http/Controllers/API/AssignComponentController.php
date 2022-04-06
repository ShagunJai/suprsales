<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class AssignComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $emp = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		$comp = Http::get('http://localhost/suprsales_api/Ticket/getComponent.php')->json();
        $details = Http::get('http://localhost/suprsales_api/Ticket/getAssignComponent.php')->json();
        
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'assigncomponent'){
				$count = 1;	
				break;
			}
        }
      }
		
		if($count == 1){
			return view('assignComponent')->with(compact('emp','comp','details','announcement','ann'));
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
		$proc_name = $request->get('proc_name');
		
		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Ticket/assignComponent.php', [
			'json' => [
				'COMPONENT_ID' => $comp_name,
				'PROCESSOR_ID' => $proc_name
			]
		]);
		
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/assigncomponent')->with('message','Component Assigned Successfully');
	   }
	   else{
		   return redirect('/assigncomponent')->with('error','Component Not Assigned');
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
         
        $proc_id = $request->get('proc_id');
        $id = $request->route('assigncomponent'); 
  
        $client = new Client([
          // Base URI is used with relative requests
          'base_uri' => 'http://localhost',
        ]);
         
        $response = $client->request('PUT', '/suprsales_api/Ticket/updateAssignComponent.php?id='.$id, [
          'json' => [
            'PROCESSOR_ID' => $proc_id
          ]
        ]);
        
        if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/assigncomponent')->with('message','Assigned Processor Updated Successfully');
	   }
	   else{
		   return redirect('/assigncomponent')->with('error','Assigned Processor Not Updated');
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
