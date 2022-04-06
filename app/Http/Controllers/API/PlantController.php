<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class PlantController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
     //It contain PLANT_ID","PLANT_DESCRIPTION","PLANT_ADDRESS","REGION_NAME","EMPLOYEE_NAME",EMPLOYEE_EMAIL,EMPLOYEE_MOB,FLAG
    $admins = Http::get('http://localhost/suprsales_api/Plant/')->json();
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
     if 'auth_reference' of $val specified id equals to 'plantview'
     then take $count=1 */
      if (isset($ann)) {
        foreach ($ann as $val) {
          if ($val['auth_reference'] == 'plantview') {
            $count = 1;
            break;
          }
        }
      }
     //The compact() function is used to convert given variable to array in which the key of the array will be the name of the variable and the value of the array will be the value of the variable
     // it will make the array of announcement', 'ann', 'admins' and store.
      if ($count == 1) {
        return view('plant')->with(compact('announcement', 'admins', 'ann'));
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

    //return response()->view('plant', $data, 200);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
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
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
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
//   This is use for  update the plant activate or deactivate status
  public function update(Request $request, $id)
  {
    $PLANT_ID = $request->route('plantview');
    $FLAG = $request->get('flag');


    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);

    $response = $client->request('PUT', '/suprsales_api/Plant/updatePlant.php', [
      'json' => [
        'PLANT_ID' => $PLANT_ID,
        'FLAG' => $FLAG
      ]
    ]);

    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('/plantview')->with('message', 'Plant Updated Successfully');
    } else {
      return redirect('/plantview')->with('error', 'Plant Not Updated');
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
