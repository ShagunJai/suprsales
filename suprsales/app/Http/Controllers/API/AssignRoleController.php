<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;
class AssignRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = Http::get('http://localhost/suprsales_api/UserMapping/getEmpWithNoRole.php')->json();
		$role = Http::get('http://localhost/suprsales_api/Role/')->json();
        $details = Http::get('http://localhost/suprsales_api/UserMapping/')->json();
        
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'roless'){
				$count = 1;	
				break;
			}
        }
      }
		
		if($count == 1){
			return view('assignRole')->with(compact('emp','role','details','announcement','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
        //return response()->view('cust', $data, 200);
		}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		
		$emp_name = $request->get('emp_name');
		
		$role_name = $request->get('role_name');

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/UserMapping/api-create.php', [
			'json' => [
				'EMP_ID' => $emp_name,
				'ROLE_ID' => $role_name
			]
		]);
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/roless')->with('message','Role Assigned Successfully');
	   }
	   else{
		   return redirect('/roless')->with('error','Role Not Assigned');
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
      $role_id = $request->get('role_id');
      $flag = $request->get('flag');
	  $id = $request->route('roless'); 

      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://localhost',
      ]);
       
      $response = $client->request('PUT', '/suprsales_api/UserMapping/api-update.php?id='.$id, [
        'json' => [
          'ROLE_ID' => $role_id,
          'FLAG' => $flag
        ]
      ]);
      if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/roless')->with('message','Assigned Role Updated Successfully');
	   }
	   else{
		   return redirect('/roless')->with('error','Assigned Role Not Updated');
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
