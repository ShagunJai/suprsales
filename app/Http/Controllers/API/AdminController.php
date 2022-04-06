<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;



class AdminController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
//index function used for "Home" btn

  public function index()
  {
    //return view('typeAnn', $data);
    //$data['admins'] = $this->fillView();
    //$data1= Config::get('site_vars.supportEmail');
    //$details contains all employees details like
    //"EMP_NAME","EMP_ID","EMP_EMAIL","EMP_IMAGE","EMP_MOBILE_NO","EMP_TYPE"."FLAG"
    $details = Http::get('http://localhost/suprsales_api/Admin/')->json();
      //it gives the emp_id with authenticated user ID
    if (isset(Auth::user()->id)) {
      $ids = Auth::user()->emp_id;
      //It gives the announcement and store the announcement inside $announcement define by the id
      $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
       //It shows authenticated uses references and store it in $ann
      $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
      //isset $ann use for the reference should have some data
      $count = 0;
     /*If $ann is not null
     then for each $ann value is set in $val
     if 'auth_reference' of $val specified id equals to 'adminn'
     then take $count=1 */
      if (isset($ann)) {
        foreach ($ann as $val) {
          if ($val['auth_reference'] == 'adminn') {
            $count = 1;
            break;
          }
        }
      }
       //The compact() function is used to convert given variable to array in which the key of the array will be the name of the variable and the value of the array will be the value of the variable
       // it will make the array of announcement', 'ann', 'details' and store.
      if ($count == 1) {
        return view('admin')->with(compact('announcement', 'details', 'ann'));
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


  /**public function filter(Request $request)
    {
        $EMP_NAME = $request->EMP_NAME;
		if(!empty($EMP_NAME)){
		$user = Admin::where('EMP_NAME', $EMP_NAME)->orderby('EMP_NAME')->get();
		}
		return view( 'admin' );


	   //return response()->view('admin');
    }*/

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

   //Store() is to chek the value and get the data from user admin.blade.php
  public function store(Request $request)
  {
    //$emp collect emp from users
    $emp = $request->get('emp');
    //$flag collect flag value from the users from blade file
    $flag = $request->get('flag');

    $client = new Client([
      //Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);

    $response = $client->request('POST', '/suprsales_api/Employee/api-update.php', [
      'json' => [
      //It create the api as EMP_ID get from emp
        'EMP_ID' => $emp,
      //It create the api as FLAG get from flag
        'FLAG' => $flag
      ]
    ]);
    //dd($response);
    //echo $response->getBody();
    return redirect('/adminn');
  }

  // Activate use to show the status of employees Active or deactive
  public function activate(Request $request)
  {
      //$emp collect emp from users
    $emp = $request->get('emp');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);
    // /Put the requested data to the api-update.php inside Employee inside suprsales_api in Json format after that api update the data for Uodate
    $response = $client->request('PUT', '/suprsales_api/Employee/api-update.php', [
      'json' => [
        'EMP_ID' => $emp
      ]
    ]);
    //dd($response);
    return redirect('/adminn');
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

//   It update the employee Active or Deactive value inside Action dropdown
  public function update(Request $request, $id)
  {
    $id = $request->route('id');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);
   //For Update
    $response = $client->request('PUT', '/suprsales_api/Employee/api-update.php', [
      'json' => [
        'EMP_ID' => $id
      ]
    ]);

    return redirect('/adminn');
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
