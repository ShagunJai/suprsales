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
//   It collect the details after createAuthorization and all the details get the users
  public function store(Request $request)
  {

    //$auth_name collect auth_name from users
    $auth_name = $request->get('auth_name');
    //$description collect description from users
    $description = $request->get('description');
    //$screen_id collect screen_id from users
    $screen_id = $request->get('screen_id');
    //$module_id collect module_id from users
    $module_id = $request->get('module_id');


    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);
    // 'POST used to send data to a server to create/update a resource
   //To create/update the requested data to the api-create inside Authorization inside suprsales_api in json format
    $response = $client->request('POST', '/suprsales_api/Authorization/api-create.php', [
      'json' => [
    //It create the api as AUTH_NAME get from auth_name
        'AUTH_NAME' => $auth_name,
    //It create the api as DESCRIPTION get from description
        'DESCRIPTION' => $description,
    //It create the api as SCREEN_ID get from screen_id
        'SCREEN_ID' => $screen_id,
    //It create the api as MODULE_ID get from module_id
        'MODULE_ID' => $module_id
      ]
    ]); 

    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('/auths')->with('message', 'Authorization Created Successfully');
    } else {
      return redirect('/auths')->with('error', 'Authorization Not Created');
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
   // It Update the details after EditAuthorization and all the details get the users
  public function update(Request $request, $id)
  {
    //$auth_name collect auth_name from users
    $auth_name = $request->get('auth_name');
    //$description collect description from users
    $description = $request->get('description');
    //$flag collect flag from users
    $flag = $request->get('flag');
    //  in $id put the data by route 'auth'
    $id = $request->route('auth');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);
//Put the requested data to the api-create inside Authorization inside suprsales_api in Json format
    $response = $client->request('PUT', '/suprsales_api/Authorization/api-update.php?id=' . $id, [
      'json' => [
        'AUTH_NAME' => $auth_name,
        'DESCRIPTION' => $description,
        'FLAG' => $flag
      ]
    ]);

    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('/auths')->with('message', 'Authorization Updated Successfully');
    } else {
      return redirect('/auths')->with('error', 'Authorization Not Updated');
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
