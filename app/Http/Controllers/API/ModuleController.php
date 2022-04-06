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
    //$admins contain "module_ID","module_NAME","module_DESCRIPTION","module_LINK","FLAG","UPDATED_AT","CREATED_AT
    $admins = Http::get('http://localhost/suprsales_api/module/create_module/')->json();
     // It shows the announcement in the top announcement btn
     //if the user has not logged in. Auth::user() is used to get the currently authenticated user.
    if (isset(Auth::user()->id)) {
     //it gives the emp_id with authenticated user ID
      $ids = Auth::user()->emp_id;
      $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
      //It shows authenticated uses references and store it in $ann
      $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
      /*If $ann is not null
       then for each $ann value is set in $val
       if 'auth_reference' of $val specified id equals to 'mods'
       then take $count=1 */
      $count = 0;
      if (isset($ann)) {
        foreach ($ann as $val) {
          if ($val['auth_reference'] == 'mods') {
            $count = 1;
            break;
          }
        }
      }
       //The compact() function is used to convert given variable to array in
        // which the key of the array will be the name of the variable and the value of the array will be the value of the variable.
      if ($count == 1) {
        return view('module')->with(compact('announcement', 'admins', 'ann'));
      }
      // it will return 404 eror if the user is not authenticate
      else {
        return redirect('error');
      }
     } // otherwise it will return to the userlogin page
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
    //$module_name collect module_name from employees
    $module_name = $request->get('module_name');
    //$module_description collect module_description from employees
    $module_description = $request->get('module_description');
    //$module_path collect module_path from employees
    $module_path = $request->get('module_path');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);

    $response = $client->request('POST', '/suprsales_api/module/create_module/api-create.php', [
      'json' => [
       //It create the api as MODULE_NAME get from MODULE_name
        'MODULE_NAME' => $module_name,
        //It create the api as MODULE_DESCRIPTION get from MODULE_description
        'MODULE_DES' => $module_description,
       //It create the api as MODULE_LINK get from MODULE_path
        'MODULE_PATH' => $module_path
      ]
    ]);
    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('/mods')->with('message', 'Module Addded Successfully');
    } else {
      return redirect('/mods')->with('error', 'Module Not Added');
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
    //in $module_name put the data by get 'module_name'
    $module_name = $request->get('module_name');
    //in $module_description put the data by get 'module_description'
    $module_description = $request->get('module_description');
    ////in $flag put the data by get 'flag'
    $flag = $request->get('flag');
    //in $id put the data by route 'mod'
    $id = $request->route('mod');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);
// /Put the requested data to the api-update.php inside create_module inside suprsales_api in Json format
    $response = $client->request('PUT', '/suprsales_api/module/create_module/api-update.php?id=' . $id, [
      'json' => [
        'MODULE_NAME' => $module_name,
        'MODULE_DESCRIPTION' => $module_description,
        'FLAG' => $flag
      ]
    ]);
    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('/mods')->with('message', 'Module Updated Successfully');
    } else {
      return redirect('/mods')->with('error', 'Module Not Updated');
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
