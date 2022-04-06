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
   *
   *
   */

 // This is for Home btn
 //to get the data from api and store the value inside $emp,$role,$details
  public function index()
  {
       // $emp contains all Employee ID with name and get from suprsales_api
    $emp = Http::get('http://localhost/suprsales_api/UserMapping/getEmpWithNoRole.php')->json();
    // $role contains the employees with their Authorization roles
    $role = Http::get('http://localhost/suprsales_api/Role/')->json();
    //   $details contain Employee id,name with their assign role
    $details = Http::get('http://localhost/suprsales_api/UserMapping/')->json();
   // It shows the announcement in the top announcement btn
       //if the user has not logged in. Auth::user() is used to get the currently authenticated user.

    if (isset(Auth::user()->id)) {
      $ids = Auth::user()->emp_id;
      $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

      //It shows authenticated uses references and store it in $ann
      $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();

      $count = 0;
       //isset $ann use for the reference should have some data
      if (isset($ann)) {
        foreach ($ann as $val) {
          if ($val['auth_reference'] == 'roless') {
            $count = 1;
            break;
          }
        }
      }
  //The compact() function is used to convert given variable to array in which the key of the array
  //will be the name of the variable and the value of the array will be the value of the variable.

      if ($count == 1) {
        return view('assignRole')->with(compact('emp', 'role', 'details', 'announcement', 'ann'));
      }
     // it will return 404 eror if the user is not authenticate

       else {
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

//    It store the data from users and send the data to the users

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
    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('/roless')->with('message', 'Role Assigned Successfully');
    } else {
      return redirect('/roless')->with('error', 'Role Not Assigned');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

//    retrive specific data
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

   //for update the role after edit
  public function update(Request $request, $id)
  {
    $role_id = $request->get('role_id');
    $flag = $request->get('flag');
    $id = $request->route('roless');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);

    $response = $client->request('PUT', '/suprsales_api/UserMapping/api-update.php?id=' . $id, [
      'json' => [
        'ROLE_ID' => $role_id,
        'FLAG' => $flag
      ]
    ]);
    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('/roless')->with('message', 'Assigned Role Updated Successfully');
    } else {
      return redirect('/roless')->with('error', 'Assigned Role Not Updated');
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
