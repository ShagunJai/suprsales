<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class AssignPlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $emp = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
		$plant = Http::get('http://localhost/suprsales_api/Region/')->json();
        $details = Http::get('http://localhost/suprsales_api/Employee/getEmpRegionMapping.php')->json();
       
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'assignplant'){
				$count = 1;	
				break;
			}
        }
      }
		
		if($count == 1){
			return view('assignPlant')->with(compact('emp','plant','details','announcement','ann'));
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
		
         $employees_id = $request->get('employees_id');
		$regional_id = $request->get('regional_id');
		
		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Employee/assignRegion.php', [
			'json' => [
				'EMP_ID' => $employees_id,
				'REGION_ID' => $regional_id
			]
		]);
		
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/assignplant')->with('message','Region Assigned Successfully');
	   }
	   else{
		   return redirect('/assignplant')->with('error','Region Not Assigned');
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
         
        $emply_id = $request->get('emply_id');
        $id = $request->route('assignplant'); 
  
        $client = new Client([
          // Base URI is used with relative requests
          'base_uri' => 'http://localhost',
        ]);
         
        $response = $client->request('PUT', '/suprsales_api/Employee/updateEmpRegionMapping.php?id='.$id, [
          'json' => [
            'REGION_ID' => $emply_id
          ]
        ]);
        
        if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/assignplant')->with('message','Assigned Region Updated Successfully');
	   }
	   else{
		   return redirect('/assignplant')->with('error','Assigned Region Not Updated');
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
