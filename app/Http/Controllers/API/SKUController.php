<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class SKUController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //if the user has not logged in. Auth::user() is used to get the currently authenticated user.
    if (isset(Auth::user()->id)) {
      $ids = Auth::user()->emp_id;
      //It gives the announcement and store the announcement inside $announcement define by the id
      $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

       //It shows authenticated uses references and store it in $ann
      $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
      //The compact() function is used to convert given variable to array in which the key of the array will be the name of the variable and the value of the array will be the value of the variable
      return view('sku')->with(compact('announcement', 'ann'));
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

//    it is for the update the edited data
  public function update(Request $request, $id)
  {
    $FACTOR = $request->get('FACTOR');
    $GROUP_ID = $request->get('GROUP_ID');
    $FLAG = $request->get('FLAG');
    $id = $request->route('sku');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);
//    it put the edited dat to the database through API
    $response = $client->request('PUT', '/suprsales_api/Stock/updateSku.php?id=' . $id, [
      'json' => [
        'FACTOR' => $FACTOR,
        'FLAG' => $FLAG
      ]
    ]);

    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('material/' . $GROUP_ID)->with('message', 'SKU Updated Successfully');
    } else {
      return redirect('material/' . $GROUP_ID)->with('error', 'SKU Not Updated');
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
