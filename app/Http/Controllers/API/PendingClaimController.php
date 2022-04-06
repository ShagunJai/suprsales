<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class PendingClaimController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    if (isset(Auth::user()->id)) {
      $ids = Auth::user()->emp_id;
      $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/getAnnouncementByRegion.php?id=' . $ids)->json();

      $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();
      $pending = Http::get('http://localhost/suprsales_api/Claim/getClaim.php?id=12322&start_date=2021-01-01&end_date=2021-01-15')->json();


      return view('approval', ['start_date' => '2021-01-01'], ['end_date' => '2021-01-15'])->with(compact('announcement', 'ann', 'pending'));
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

    $claim = $request->get('claim');
    $emp = $request->get('emp');
    $status = $request->get('status');
    $start_date = $request->get('start_date');
    $end_date = $request->get('end_date');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);

    $response = $client->request('POST', '/suprsales_api/Claim/approveClaim.php', [
      'json' => [
        'CLAIM_ID' => $claim,
        'APPROVAL_STATUS' => $status
      ]
    ]);



    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('approveclaim/' . $emp . '/' . $start_date . '/' . $end_date);
    } else {
      return redirect('approveclaim/' . $emp . '/' . $start_date . '/' . $end_date);
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

  public function editcust(Request $request, $id, $start_date, $end_date)
  {
    if (isset(Auth::user()->id)) {
      $id = $request->route('approveclaim');
      $start_date = $request->route('start_date');
      $end_date = $request->route('end_date');

      $pending = Http::get('http://localhost/suprsales_api/Claim/getClaim.php?id=' . $id . '&start_date=' . $start_date . '&end_date=' . $end_date)->json();
      $announcement = Http::get('http://localhost/suprsales_api/Announcement/create_announcement/')->json();
      $ids = Auth::user()->emp_id;
      $ann = Http::get('http://localhost/suprsales_api/Auth_Reference/?id=' . $ids)->json();


      return view('approval', ['start_date' => $start_date], ['end_date' => $end_date])->with(compact('announcement', 'ann', 'pending'));
    } else {
      return redirect('userlogin');
    }
  }
  public function update(Request $request, $id)
  {
    //
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
