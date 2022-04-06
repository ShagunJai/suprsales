<?php

namespace App\Http\Controllers\API;
use App\Http\Traits\AuthorizationTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\Authorization;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;


class AuthsController extends Controller
{
   use AuthorizationTrait;
   
    public function store(Request $request)
    {
        $auth_name = $request->get('auth_name');
		$description = $request->get('description');
		$screen_id = $request->get('screen_id');
		$module_id = $request->get('module_id');


		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Authorization/api-create.php', [
			'json' => [
				'AUTH_NAME' => $auth_name,
				'DESCRIPTION' => $description,
				'SCREEN_ID' => $screen_id,
				'MODULE_ID' => $module_id
			]
		]);
		
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/auths')->with('message','Authorization Created Successfully');
	   }
	   else{
		   return redirect('/auths')->with('error','Authorization Not Created');
	   }
		
    
		//return redirect('/auths'); 
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
        $auth_name = $request->get('auth_name');
        $description = $request->get('description');
        $flag = $request->get('flag');
        $id = $request->route('auth'); 
  
        $client = new Client([
          // Base URI is used with relative requests
          'base_uri' => 'http://localhost',
        ]);
         
        $response = $client->request('PUT', '/suprsales_api/Authorization/api-update.php?id='.$id, [
          'json' => [
            'AUTH_NAME' => $auth_name,
            'DESCRIPTION' => $description,
            'FLAG' => $flag
          ]
        ]);
        
        if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/auths')->with('message','Authorization Updated Successfully');
	   }
	   else{
		   return redirect('/auths')->with('error','Authorization Not Updated');
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
