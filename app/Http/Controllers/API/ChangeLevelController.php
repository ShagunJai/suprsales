<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Auth;

class ChangeLevelController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    /* $level contain EMPLOYEE_ID,EMPLOYEE_NAME,VEHICLE_OWNERSHIP,VEHICLE_TYPE,LEVEL_RANK_ID,LEVEL_NAME,DA_RATES_LOCAL,DA_RATES_OUTST,
      EXP_PER_KM_RATE,EXP_BUS_TRAIN,EXP_MISC,EXP_PLANE,EXP_TAXI_AUTO,EXP_VEH_REPAIR,EXP_HOTEL,EXP_STATIONARY,EXP_MOBILE_INTERNET,CHANGED_STATUS,EXP_FUEL,MAX_ALLOWED_KM
     get from the API*/
    $level = Http::get('http://localhost/suprsales_api/Level/getEmpLevelExpRates.php')->json();
        // $levels conatin LEVEL_RANK_ID,LEVEL_NAME,LEVEL_DESC get from API
        $levels = Http::get('http://localhost/suprsales_api/Level/getLevel.php')->json();
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
          if ($val['auth_reference'] == 'changelevel') {
            $count = 1;
            break;
          }
        }
      }
            //The compact() function is used to convert given variable to array in
            // which the key of the array will be the name of the variable and the value of the array will be the value of the variable.
    if ($count == 1) {
        return view('changeLevel')->with(compact('level', 'levels', 'announcement', 'ann'));
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
//   It shows the value from the API in the change level which is updated the the data shows by the id
  public function show(Request $request, $id)
  {
    //in $id put the data by route 'changelevel'
    $id = $request->route('changelevel');
    $levelexp = Http::get('http://localhost/suprsales_api/Level/getLevelExpRates.php?id=' . $id)->json();


    $userData['data'] = $levelexp;

    echo json_encode($userData);
    exit;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
//   It is for update the data to the database thrpough api
  public function update(Request $request, $id)
  {
      //in $LEVEL_RANK_ID put the data by get 'LEVEL_RANK_ID'
    $LEVEL_RANK_ID = $request->get('LEVEL_RANK_ID');
     //in $DA_RATES_LOCAL put the data by get 'DA_RATES_LOCAL'
    $DA_RATES_LOCAL = $request->get('DA_RATES_LOCAL');
     //in $DA_RATES_OUTST put the data by get 'DA_RATES_OUTST'
    $DA_RATES_OUTST = $request->get('DA_RATES_OUTST');
     //in $EXP_PER_KM_RATE put the data by get 'EXP_PER_KM_RATE'
    $EXP_PER_KM_RATE = $request->get('EXP_PER_KM_RATE');
     //in $exp_bus_train put the data by get 'exp_bus_train'
    $exp_bus_train = $request->get('exp_bus_train');
     //in $EXP_PLANE put the data by get 'EXP_PLANE'
    $EXP_PLANE = $request->get('EXP_PLANE');
     //in $EXP_TAXI_AUTO put the data by get 'EXP_TAXI_AUTO'
    $EXP_TAXI_AUTO = $request->get('EXP_TAXI_AUTO');
     //in $EXP_VEH_REPAIR put the data by get 'EXP_VEH_REPAIR'
    $EXP_VEH_REPAIR = $request->get('EXP_VEH_REPAIR');
     //in $EXP_HOTEL put the data by get 'EXP_HOTEL'
    $EXP_HOTEL = $request->get('EXP_HOTEL');
     //in $EXP_STATIONARY put the data by get 'EXP_STATIONARY'
    $EXP_STATIONARY = $request->get('EXP_STATIONARY');
     //in $EXP_MOBILE_INTERNET put the data by get 'EXP_MOBILE_INTERNET'
    $EXP_MOBILE_INTERNET = $request->get('EXP_MOBILE_INTERNET');
     //in $EXP_MISC put the data by get 'EXP_MISC'
    $EXP_MISC = $request->get('EXP_MISC');
     //in $EXP_FUEL put the data by get 'EXP_FUEL'
    $EXP_FUEL = $request->get('EXP_FUEL');
     //in $MAX_ALLOWED_KM put the data by get 'MAX_ALLOWED_KM'
    $MAX_ALLOWED_KM = $request->get('MAX_ALLOWED_KM');

    $id = $request->route('changelevel');

    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => 'http://localhost',
    ]);
// It is for update the given data to the database through the API
    $response = $client->request('PUT', '/suprsales_api/Level/updateEmpLevelExpRates.php?id=' . $id, [
      'json' => [
        'LEVEL_RANK_ID' => $LEVEL_RANK_ID,
        'DA_RATES_LOCAL' => $DA_RATES_LOCAL,
        'DA_RATES_OUTST' => $DA_RATES_OUTST,
        'EXP_PER_KM_RATE' => $EXP_PER_KM_RATE,
        'EXP_BUS_TRAIN' => $exp_bus_train,
        'EXP_PLANE' => $EXP_PLANE,
        'EXP_TAXI_AUTO' => $EXP_TAXI_AUTO,
        'EXP_VEH_REPAIR' => $EXP_VEH_REPAIR,
        'EXP_HOTEL' => $EXP_HOTEL,
        'EXP_STATIONARY' => $EXP_STATIONARY,
        'EXP_MOBILE_INTERNET' => $EXP_MOBILE_INTERNET,
        'EXP_MISC' => $EXP_MISC,
        'MAX_ALLOWED_KM' => $MAX_ALLOWED_KM,
        'EXP_FUEL' => $EXP_FUEL
      ]
    ]);
    if ($response->getStatusCode() >= 200 && $response->getStatusCode() <= 300) {
      return redirect('/changelevel')->with('message', 'Employee Level Updated Successfully');
    } else {
      return redirect('/changelevel')->with('error', 'Level Not Updated');
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
