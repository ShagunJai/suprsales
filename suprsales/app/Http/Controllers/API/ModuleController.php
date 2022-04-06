<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $admins = Http::get('http://localhost/suprsales_api/module/create_module/')->json();
         
		 if(isset(Auth::user()->id)){
		 $ids = Auth::user()->emp_id;
		  $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id='.$ids)->json();
		
		 $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id='.$ids)->json();
		
		$count = 0;
		if(isset($ann)){
		foreach ($ann as $val) {
			if($val['auth_reference'] == 'mods'){
				$count = 1;	
				break;
			}
        }
    }
		
		if($count == 1){
			return view('module')->with(compact('announcement','admins','ann'));
		}
		else{
			return redirect('error');
		}
		}
		 else {
			return redirect('userlogin');
		}
		
		//return response()->view('module', $data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module_name = $request->get('module_name');
		$module_description = $request->get('module_description');
		$module_path = $request->get('module_path');

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/module/create_module/api-create.php', [
			'json' => [
				'MODULE_NAME' => $module_name,
				'MODULE_DES' => $module_description,
				'MODULE_PATH' => $module_path
			]
		]);
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/mods')->with('message','Module Addded Successfully');
	   }
	   else{
		   return redirect('/mods')->with('error','Module Not Added');
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
        $module_name = $request->get('module_name');
		$module_description = $request->get('module_description');
        $flag = $request->get('flag');
        $id = $request->route('mod'); 
  
        $client = new Client([
          // Base URI is used with relative requests
          'base_uri' => 'http://localhost',
        ]);
         
        $response = $client->request('PUT', '/suprsales_api/module/create_module/api-update.php?id='.$id, [
          'json' => [
            'MODULE_NAME' => $module_name,
			'MODULE_DESCRIPTION' => $module_description,
            'FLAG' => $flag
          ]
        ]);
        if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/mods')->with('message','Module Updated Successfully');
	   }
	   else{
		   return redirect('/mods')->with('error','Module Not Updated');
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
