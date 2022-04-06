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
    //$emp contains all EMP_ID and EMP_NAME
    $emp = Http::get('http://localhost/suprsales_api/Employee/getEmp.php')->json();
    // $plant contain Region_ID Region_Name ,Zone_ID and FLAG
    $plant = Http::get('http://localhost/suprsales_api/Region/')->json();
    // $details contain all EMP_ID with respect their name as EMP_NAME with REGION_ID and Region_Name used in the assignPlant.Blade.php
    $details = Http::get('http://localhost/suprsales_api/Employee/getEmpRegionMapping.php')->json();
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
       if 'auth_reference' of $val specified id equals to 'assignplant'
       then take $count=1 */
      $count = 0;
      if (isset($ann)) {
        foreach ($ann as $val) {
          if ($val['auth_reference'] == 'assignplant') {
            $count = 1;
            break;
          }
        }
      }
        //The compact() function is used to convert given variable to array in
        // which the key of the array will be the name of the variable and the value of the array will be the value of the variable.

      if ($count == 1) {
        return view('assignPlant')->with(compact('emp', 'plant', 'details', 'announcement', 'ann'));
      }
      // it will return 404 eror if the user is not authenticate
      else {
        return redirect('error');
      }
    }
       // otherwise it will return to the userlogin page
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
   //$employees_id collect employees_id from employees
    $employees_id = $request->get('employees_id');
    //$regional_id collect regional_id from employees
    $regional_id = $request->get('regional_id');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);

    $response = $client->request('POST', '/suprsales_api/Employee/assignRegion.php', [
      'json' => [
    //It create the api as EMP_ID get from employees_id
        'EMP_ID' => $employees_id,
    //It create the api as REGION_ID get from regional_id
        'REGION_ID' => $regional_id
      ]
    ]);

    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('/assignplant')->with('message', 'Region Assigned Successfully');
    } else {
      return redirect('/assignplant')->with('error', 'Region Not Assigned');
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
   // It Update the details after Assign_Region and all the details gets from users
  public function update(Request $request, $id)
  {
    //in $emply_id put the data by route 'emply_id'
    $emply_id = $request->get('emply_id');
    //  in $id put the data by route 'assignplant'
    $id = $request->route('assignplant');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);
//Put the requested data to the updateEmpRegionMapping.php inside Employee inside suprsales_api in Json format
    $response = $client->request('PUT', '/suprsales_api/Employee/updateEmpRegionMapping.php?id=' . $id, [
      'json' => [
        'REGION_ID' => $emply_id
      ]
    ]);

    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('/assignplant')->with('message', 'Assigned Region Updated Successfully');
    } else {
      return redirect('/assignplant')->with('error', 'Assigned Region Not Updated');
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
