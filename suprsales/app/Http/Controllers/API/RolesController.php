<?php

namespace App\Http\Controllers\API;
use App\Http\Traits\AuthTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use View;

class RolesController extends Controller
{
    use AuthTrait;
	
	
    

    public function store(Request $request)
    {
		
		
		$role_name = $request->get('role_name');
		$role_description = $request->get('role_description');
		$auth_id = $request->get('auth_id');

		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
		 
		$response = $client->request('POST', '/suprsales_api/Role/api-create.php', [
			'json' => [
				'ROLE_NAME' => $role_name,
				'ROLE_DESCRIPTION' => $role_description,
				'AUTH_ID' => $auth_id
			]
		]);
		if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/roles')->with('message','Role Inserted Successfully');
	   }
	   else{
		   return redirect('/roles')->with('error','Role Not Added');
	   }
		
	}
	
	public function show()
    {
          
    }
	
    /**public function open()
    {
       $client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://localhost',
		]);
			$data['admins'] = $client->request('GET', '/suprsales_api/Authorization/');
			return response()->view('role', $data, 200);
    } */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $role_name = $request->get('role_name');
	  $role_description = $request->get('role_description');
	  $auth_id = $request->get('auth_id');
      $flag = $request->get('flag');
	  $id = $request->route('role'); 

      $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://localhost',
      ]);
       
      $response = $client->request('PUT', '/suprsales_api/Role/api-update.php?id='.$id, [
        'json' => [
          'ROLE_NAME' => $role_name,
		  'ROLE_DESCRIPTION' => $role_description,
		  'AUTH_ID' => $auth_id,
          'FLAG' => $flag
        ]
      ]);
      if($response->getStatusCode()>=200 && $response->getStatusCode()<= 300) {
		return redirect('/roles')->with('message','Role Updated Successfully');
	   }
	   else{
		   return redirect('/roles')->with('error','Role Not Updated');
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
    }
}
