<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class MaterialGroupController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
   //$mat contain GROUP_ID","GROUP_NAME","CATEGORY_ID","CATEGORY","SKU",FLAG
    //$mat used in the materialBlade.php
    $mat = Http::get('http://localhost/suprsales_api/Material_Group/getMaterialGroup.php/')->json();

    //it gives the emp_id with authenticated user ID
    if (isset(Auth::user()->id)) {
     //if the user has not logged in. Auth::user() is used to get the currently authenticated user.
      $ids = Auth::user()->emp_id;
      //It gives the announcement and store the announcement inside $announcement define by the id
      $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();
     //It shows authenticated uses references and store it in $ann
      $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();

      $count = 0;
      /*If $ann is not null
     then for each $ann value is set in $val
     if 'auth_reference' of $val specified id equals to 'material'
     then take $count=1 */
      if (isset($ann)) {
        foreach ($ann as $val) {
          if ($val['auth_reference'] == 'material') {
            $count = 1;
            break;
          }
        }
      }

     //The compact() function is used to convert given variable to array in which the key of the array will be the name of the variable and the value of the array will be the value of the variable
     // it will make the array of announcement', 'ann', 'mat' and store.
      if ($count == 1) {
        return view('material')->with(compact('announcement', 'ann', 'mat'));
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
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request, $id)
  {
  //if the user has not logged in. Auth::user() is used to get the currently authenticated user.
    if (isset(Auth::user()->id)) {

    //  in $id put the data by route 'material'
      $id = $request->route('material');
      $ids = Auth::user()->emp_id;

     //It shows authenticated uses references and store it in $ann
      $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
      $count = 0;
      /*If $ann is not null
       then for each $ann value is set in $val
       if 'auth_reference' of $val specified id equals to 'material'
       then take $count=1 */
      if (isset($ann)) {
        foreach ($ann as $val) {
          if ($val['auth_reference'] == 'material') {
            $count = 1;
            break;
          }
        }
      }
//   if count==1 then it shows announcement ann
      if ($count == 1) {


        $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

     //It shows authenticated uses references and store it in $ann
        $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
        // $sk contain all the SKU detalis get from from APi and define in MaterialGroupController.php  --}}
        $sk = Http::get('http://localhost/suprsales_api/Stock/getSku.php?id=' . $id)->json();
        //  it returns the array announcement', 'ann', 'sk'
        return view('sku')->with(compact('announcement', 'ann', 'sk'));
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
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   //it is for the update but the update btn in not in the ui
  public function update(Request $request, $id)
  {
    $GROUP_ID = $request->get('GROUP_ID');
    $GROUP_NAME = $request->get('GROUP_NAME');
    $FLAG = $request->get('FLAG');
    $id = $request->route('material');


    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);

      //it put the edited dat to the database through API
    $response = $client->request('PUT', '/suprsales_api/Material_Group/updateMaterialGroup.php?id=' . $id, [
      'json' => [
        'GROUP_ID' => $GROUP_ID,
        'GROUP_NAME' => $GROUP_NAME,
        'FLAG' => $FLAG
      ]
    ]);



    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('/material')->with('message', 'Material Group Updated Successfully');
    } else {
      return redirect('/material')->with('error', 'Material Group Not Updated');
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
