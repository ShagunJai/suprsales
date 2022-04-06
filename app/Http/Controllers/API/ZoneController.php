<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class ZoneController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $details = Http::get('http://localhost/suprsales_api/Zone/')->json();
    $region = Http::get('http://localhost/suprsales_api/Region/')->json();

    if (isset(Auth::user()->id)) {
      $ids = Auth::user()->emp_id;
      $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

      $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();

      $count = 0;
      if (isset($ann)) {
        foreach ($ann as $val) {
          if ($val['auth_reference'] == 'zone') {
            $count = 1;
            break;
          }
        }
      }

      if ($count == 1) {
        return view('zone')->with(compact('details', 'announcement', 'ann', 'region'));
      } else {
        return redirect('error');
      }
    } else {
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
    $zone_name = $request->get('zone_name');
    $region_name = $request->get('region_name');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);

    $response = $client->request('POST', '/suprsales_api/Zone/api-create.php', [
      'json' => [
        'ZONE_NAME' => $zone_name,
        'REGION_ID' => $region_name
      ]
    ]);
    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('/zone')->with('message', 'Zone Created Successfully');
    } else {
      return redirect('/zone')->with('error', 'Zone Not Created');
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
    $region_id = $request->get('region_id');
    $flag = $request->get('flag');
    $id = $request->route('zone');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);

    $response = $client->request('PUT', '/suprsales_api/Zone/api-update.php?id=' . $id, [
      'json' => [
        'REGION_ID' => $region_id,
        'FLAG' => $flag
      ]
    ]);
    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('/zone')->with('message', 'Zone Updated Successfully');
    } else {
      return redirect('/zone')->with('error', 'Zone Not Updated');
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
